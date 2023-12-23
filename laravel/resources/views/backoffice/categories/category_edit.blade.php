@extends('layouts.app')

@section('content')
<div class="jumbotron shadow-lg bg-darklight">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Edit Category <a href="{{route('categories.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" action="{{ route('categories.update', ['id' => $category->id]) }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label" for="name">Name of the category <span class="required"></span>
                            </label>
                            <div >
                                <input type="text" id="name" value="{{ old( 'name', $category->name) }}" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="pull-left  mt-5">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success btn-dark mt-4 mb-3">Save Categories Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop