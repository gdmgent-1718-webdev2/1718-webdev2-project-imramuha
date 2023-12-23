@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header noAcces">UNAUTHORIZED</div>

                <div class="card-body noAcces">
                    You have to be an ADMIN or a MODERATOR to be able to log into the backoffice!
                </div>
                <a class="nav-link" href="{{route('login')}}">GO BACK</a>
            </div>
        </div>
    </div>
</div>
@endsection
