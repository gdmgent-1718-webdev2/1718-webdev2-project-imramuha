@extends('layouts.app')

@section('content')
<div class="alContent jumbotron shadow-lg bg-darklight">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Create a category <a href="{{route('categories.index')}}" class="btn btn-info btn-xs pull-right  btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('categories.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label" for="name">Name of the category
                            </label>
                            <div >
                                <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12" required>
                            </div>
                        </div>

                        <div class="ln_solid">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                        @endif
                        </div>

                        <div class="form-group">
                            <div class="pull-left mt-5">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-primary btn-dark mt-4 mb-3">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop