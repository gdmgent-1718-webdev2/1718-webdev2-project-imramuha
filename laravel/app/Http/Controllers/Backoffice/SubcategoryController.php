<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubcategoryController extends Controller
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
        // Active subcategories with categories, including soft-deleted categories
        $subcategories = Subcategory::with('categories')->withTrashed()->get();

        // First category (including soft-deleted)
        $category = Category::withTrashed()->first();

        return view('backoffice.subcategories.subcategory_show', compact('subcategories', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->all();

        return view('backoffice.subcategories.subcategory_create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'name' => 'required|unique:subcategories',
        ]);



        $subcategory = Subcategory::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),

        ]);

        return redirect()->route('subcategories.index')->with('success', "The Subcategory <strong>$subcategory->name</strong> has successfully been created.");
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
        try {
            $subcategory = Subcategory::findOrFail($id);
            $params = [
                'subcategory' => $subcategory,
            ];
            return view('backoffice.subcategories.subcategory_delete')->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
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
        try {
            $subcategory = Subcategory::findOrFail($id);
            $categories = Category::get()->all();
            $params = [
                'subcategory' => $subcategory,
            ];
            return view('backoffice.subcategories.subcategory_edit', compact('categories'))->with($params);
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
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
        try {
            $this->validate($request, [
                'name' => 'required|unique:subcategories,name,' . $id,
                'category_id' => 'required',
            ]);

            $subcategory = Subcategory::findOrFail($id);
            $subcategory->name = $request->input('name');
            $subcategory->category_id = $request->input('category_id');
            $subcategory->save();

            return redirect()->route('subcategories.index')->with('success', "The Subcategory <strong>$subcategory->name</strong> has successfully been updated.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
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
        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->forceDelete();
            return redirect()->route('subcategories.index')->with('success', "The Subcategory <strong>$subcategory->name</strong> has successfully been deleted.");
        } catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException) {
                return response()->view('errors.' . '404');
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
        if (!auth()->user()->hasRole('admin')) {
            return view('auth.moderator.acces');
        } else {
            try {
                $subcategory = Subcategory::findOrFail($id);
                $subcategory->delete();
                return redirect()->route('subcategories.index')->with('success', "The Subcategory <strong>$subcategory->name</strong> has successfully been deactivated.");
            } catch (ModelNotFoundException $ex) {
                if ($ex instanceof ModelNotFoundException) {
                    return response()->view('errors.' . '404');
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
        if (!auth()->user()->hasRole('admin')) {
            return view('auth.moderator.acces');
        } else {
            try {
                $subcategory = Subcategory::withTrashed()->findOrFail($id);
                $subcategory->restore();
                return redirect()->route('subcategories.index')->with('success', "The Subcategory <strong>$subcategory->name</strong> has successfully been deactivated.");
            } catch (ModelNotFoundException $ex) {
                if ($ex instanceof ModelNotFoundException) {
                    return response()->view('errors.' . '404');
                }
            }
        }

    }
}
