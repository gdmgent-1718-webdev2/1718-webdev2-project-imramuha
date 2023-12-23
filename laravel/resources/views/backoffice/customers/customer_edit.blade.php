@extends('layouts.app') @section('content')
<div class="jumbotron shadow-lg bg-darklight">
    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Edit a User <a href="{{route('customers.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>

    <form method="post" action="{{ route('customers.update', ['id' => $customer->id]) }}" data-parsley-validate class="form-horizontal form-label-left pb-5">

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
           
            <div class="form-row">
               
                <div class="col-4">
                    <label>First name</label>
                    <input type="text" value="{{ old( 'first_name', $customer->first_name) }}" name="first_name" class="form-control">
                    @if ($errors->has('first_name'))
                    <span class="help-block">{{ $errors->first('first_name') }} <br /></span>
                    @endif
                </div>

                <div class="col-4">
                    <label>Last name</label>
                    <input type="text" value="{{ old( 'last_name', $customer->last_name) }}" name="last_name" class="form-control">
                    @if ($errors->has('last_name'))
                    <span class="help-block">{{ $errors->first('last_name') }} <br /></span>
                    @endif
                </div>

                <div class="col-4">
                    <label>User</label>
                    <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2" name="user_id">
                        <option value="" selected disabled>Previous: {{ old( 'user_id', $customer->user->username) }} - {{ old( 'user_id', $customer->user->email) }}</option>
                        @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->username }} - {{ $user->email }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('user_id'))
                    <span class="help-block">{{ $errors->first('user_id') }} <br /></span> <br />
                    @endif
                </div>
            </div>

            <div class="form-row">    
                <div class="col-3">
                    <label>Street</label>
                    <input type="text" value="{{ old( 'street', $customer->street) }}" name="street" class="form-control">
                    @if ($errors->has('street'))
                    <span class="help-block">{{ $errors->first('street') }} <br /></span>
                    @endif
                </div>

                <div class="col-3">
                    <label>Number</label>
                    <input type="text" value="{{ old( 'nr', $customer->nr) }}" name="nr" class="form-control">
                    @if ($errors->has('nr'))
                    <span class="help-block">{{ $errors->first('nr') }}   <br /></span> <br />
                    @endif
                </div>

                 <div class="col-3">
                    <label>Zip</label>
                    <input type="text" value="{{ old( 'postal_code', $customer->postal_code) }}" name="postal_code" class="form-control">
                    @if ($errors->has('postal_code'))
                    <span class="help-block">{{ $errors->first('postal_code') }}   <br /></span> <br />
                    @endif
                </div>

                 <div class="col-3">
                    <label>City</label>
                    <input type="text" value="{{ old( 'province', $customer->province) }}" name="province" class="form-control">
                    @if ($errors->has('province'))
                    <span class="help-block">{{ $errors->first('province') }}   <br /></span> <br />
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group mt-5 mb-5">
            <div class="pull-left" >
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input name="_method" type="hidden" value="PUT">
                <button type="submit" class="btn btn-success btn-dark mt-4 mb-3">Save Customer Changes</button>
            </div>
        </div>
    </form>
</div>
@stop