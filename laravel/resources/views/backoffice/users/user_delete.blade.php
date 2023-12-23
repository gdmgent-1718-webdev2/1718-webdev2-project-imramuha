@extends('layouts.app')

@section('content')
<div class="jumbotron bg-darklight">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Confirm Delete User<a href="{{route('users.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>Are you sure you want to delete a User by the username <strong>{{$user->username}}</strong> and email <strong>{{$user->email}}</strong>?</strong></p>

                    <form method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
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