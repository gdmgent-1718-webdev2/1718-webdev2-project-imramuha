<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
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
        $categories = Category::withTrashed()->get();
        $categoriesTrashed = Category::onlyTrashed()->get();

        return view('backoffice.categories.category_show', compact('categories', 'categoriesTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!auth()->user()->hasRole('admin')){
            return view('auth.moderator.acces');
        } else {
            return view('backoffice.categories.category_create');
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
            'name' => 'required|unique:categories',

        ]);
    
        $category = Category::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('categories.index')->with('success', "The Category <strong>$category->name</strong> has successfully been created.");
    }

    public function getSubcategories(Category $category)
    {
        return $category->subcategories()->select('id', 'name')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try{
            $category = Category::findOrFail($id);
            $params = [
                'category' => $category,
            ];
            return view('backoffice.categories.category_delete')->with($params);
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
        if(!auth()->user()->hasRole('admin')){
            return view('auth.moderator.acces');
        } else {
            try
            {
                $category = Category::findOrFail($id);
                $params = [
                    'category' => $category,
                ];
                return view('backoffice.categories.category_edit')->with($params);
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
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try
        {
            $this->validate($request, [
                'name' => 'required|unique:categories,name,'.$id,
            ]);

            $category = Category::findOrFail($id);
            $category->name = $request->input('name');
            $category->save();

            return redirect()->route('categories.index')->with('success', "The Category <strong>$category->name</strong> has successfully been updated.");
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
        if(!auth()->user()->hasRole('admin')){
            return view('auth.moderator.acces');
        } else {
            try
            {
                $category = Category::findOrFail($id);
                $category->forceDelete();
                return redirect()->route('categories.index')->with('success', "The Category <strong>$category->name</strong> has successfully been deleted.");
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

    /**
     * Soft Delete a specified item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softDelete($id)
    {
        if(!auth()->user()->hasRole('admin')){
                return view('auth.moderator.acces');
            } else {
            try
            {
                $category = Category::findOrFail($id);
                $category->delete();
                return redirect()->route('categories.index')->with('success', "The Category <strong>$category->name</strong> has successfully been deactivated.");
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

    /**
     * Restore a soft deleted item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softUndelete($id)
    {
        if(!auth()->user()->hasRole('admin')){
            return view('auth.moderator.acces');
        } else {
           try
           {
               $category = Category::withTrashed()->findOrFail($id);
               $category->restore();
               return redirect()->route('categories.index')->with('success', "The Category <strong>$category->name</strong> has successfully been deactivated.");
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
}
