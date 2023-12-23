@extends('layouts.app')

@section('content')
<div class="jumbotron  bg-darklight">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Confirm Delete Customer<a href="{{route('customers.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Are you sure you want to delete a Customer by the name <strong>{{$customer->first_name}} {{$customer->last_name}}?</strong></p>

                    <form method="POST" action="{{ route('customers.destroy', ['id' => $customer->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">Yes I'm sure. Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop