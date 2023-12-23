@extends('layouts.app') @section('content')
<div class="jumbotron shadow-lg bg-darklight">
    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Edit Subcategory <a href="{{route('subcategories.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>

    <form method="post" action="{{ route('subcategories.update', ['id' => $subcategory->id]) }}" data-parsley-validate class="form-horizontal form-label-left pb-5">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
           
            <div class="form-row">
               
                <div class="col-4">
                    <label>Name of the subcategory</label>
                    <input type="text" value="{{ old( 'name', $subcategory->name) }}" id="name" name="name" class="form-control">
                    @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}  <br /></span> 
                    @endif
                </div>
        
             
                <div class="col-4">
                    <label>Category</label>
                    <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2" name="category_id">
                        <option value="" selected disabled>Previous: {{ old( 'category_id', $subcategory->categories->name) }}</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <span class="help-block">{{ $errors->first('category_id') }}</span> 
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group mt-5 mb-5">
            <div class="pull-left" >
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input name="_method" type="hidden" value="PUT">
                <button type="submit" class="btn btn-success btn-dark mt-4 mb-3">Save Subcategory Changes</button>
            </div>
        </div>
    </form>
</div>
@stop