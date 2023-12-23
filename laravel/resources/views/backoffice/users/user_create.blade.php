@extends('layouts.app')

@section('content')
<div class="jumbotron  bg-darklight">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Add a user<a href="{{route('users.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('users.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                   
                    <div class="form-row">

                          <div class="col">
                            <strong>Username</strong>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="col">
                            <strong>Email</strong>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="col">
                            <strong>Password</strong>
                            <input type="text" name="password" class="form-control">
                        </div>



                        <div class="col-4">
                            <strong>Role</strong>
                            <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2" name="role_id">
                                <option value="" selected disabled>Choose the role...</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">
                                {{ $role->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
</div>

                        <div class="ln_solid mt-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        </div>

                        <div class="form-group">
                            <div class="pull-left mt-2">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-primary btn-dark mt-4 mb-3">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
