<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\Category;
use App\Models\Subcategory;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FishController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fishes = Fish::with('subcategory', 'user')->withTrashed()->get();

        $category = Category::withTrashed()->first();

        return view('backoffice.fishes.fish_show', compact('fishes', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get()->all();
        $subcategories = Subcategory::get()->all();

        return view('backoffice.fishes.fish_create', compact('categories', 'subcategories'));
    }

    public function subcategories(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'subcategories' => Subcategory::where('category_id', $id)->get()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //
         $this->validate($request, [
            'name' => 'required|unique:fishes',
            'size' => 'required',
            'detail' => 'required',
            'birthdate' => 'required|before:tomorrow',
            'sex' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required',
        ]);


    
        $fish = Fish::create([
            'name' => $request->input('name'),
            'size' => $request->input('size'),
            'detail' => $request->input('detail'),
            'birthdate' => $request->input('birthdate'),
            'sex' => $request->input('sex'),
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('fishes.index')->with('success', "The Fish <strong>$fish->name</strong> has successfully been added to the database.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $fish = Fish::findOrFail($id);
            $params = [
                'fish' => $fish,
            ];
            return view('backoffice.fishes.fish_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $fish = Fish::findOrFail($id);
            $categories = Category::get()->all();
            $subcategories = Subcategory::get()->all();
            $params = [
                'fish' => $fish,
            ];
            return view('backoffice.fishes.fish_edit', compact('categories', 'subcategories'))->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $this->validate($request, [
                'name' => 'required|unique:fishes,name,'.$id,
                'size' => 'required',
                'detail' => 'required',
                'birthdate' => 'required|before:tomorrow',
                'sex' => 'required',
                'subcategory_id' => 'required',
                'category_id' => 'required',
            ]);

            $fish = Fish::findOrFail($id);
            $fish->name = $request->input('name');
            $fish->size = $request->input('size');
            $fish->detail = $request->input('detail');
            $fish->birthdate = $request->input('birthdate');
            $fish->sex = $request->input('sex');
            $fish->subcategory_id = $request->input('subcategory_id');
            $fish->category_id = $request->input('category_id');
            $fish->save();

            return redirect()->route('fishes.index')->with('success', "The Fish with name:<strong>$fish->name</strong> has successfully been updated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $fish = Fish::findOrFail($id);
            $fish->forceDelete();
            return redirect()->route('fishes.index')->with('success', "The Fish by the name of<strong>$fish->name</strong> has successfully been deleted.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

        /**
     * Soft Delete a specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        try
        {
            $fish = Fish::findOrFail($id);
            $fish->delete();
            return redirect()->route('fishes.index')->with('success', "The Fish <strong>$fish->name</strong> has successfully been deactivated.");
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

        /**
     * Restore a soft deleted item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softUndelete($id)
    {
        try
           {
               $fish = Fish::withTrashed()->findOrFail($id);
               $fish->restore();
               return redirect()->route('fishes.index')->with('success', "The Fish <strong>$fish->name</strong> has successfully been reactivated.");
           }
           catch (ModelNotFoundException $ex) 
           {
               if ($ex instanceof ModelNotFoundException)
               {
                   return response()->view('errors.'.'404');
               }
           }
       
    }
}
