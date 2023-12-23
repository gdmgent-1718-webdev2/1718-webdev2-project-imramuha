@extends('layouts.app')

@section('content')
<div class="alContent jumbotron shadow-lg bg-darklight">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Link a Costumer to a User <a href="{{route('customers.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('customers.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                   
                    <div class="form-row">

                        <div class="col">
                            <strong>First name</strong>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="col">
                            <strong>Last name</strong>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="col">
                            <strong>Street</strong>
                            <input type="text" name="street" class="form-control">
                        </div>
                        <div class="col">
                            <strong>Number</strong>
                            <input type="text" name="nr" class="form-control">
                        </div>
                        <div class="col">
                            <strong>Zip</strong>
                            <input type="text" name="postal code" class="form-control">
                        </div>
                        <div class="col">
                            <strong>City</strong>
                            <input type="text" name="province" class="form-control">
                        </div>



                        <div class="col-4">
                            <strong>User</strong>
                            <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2" name="user_id">
                                <option value="" selected disabled>Link it to user...</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                {{ $user->username }} - {{ $user->email }}
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
