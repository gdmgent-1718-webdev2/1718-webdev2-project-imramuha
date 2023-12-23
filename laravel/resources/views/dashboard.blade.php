@extends('layouts.app')

@section('content')
<div class="alContent jumbotron shadow-lg bg-darklight pt-4">
    <div class="row justify-content-center  mt-0">
        <div class="card w-100 mt-0">
            <div class="card-body">
                <b>Welcome back, {{ Auth::user()->username }}!</b>
                <br><br>
                This is AquaLobby's backoffice.
                <br>
                For the administration of our frontend, access to functionalities may vary based on your role. Some
                users may have access to all functionalities, while others may have limited access.
                <br>
                In the top right corner, you'll find the option to <b>Logout</b>..
            </div>
        </div>
        <div class="card w-100 mt-4">
            <div class="card-body">
                <b>Announcement: 01</b>
                <br><br>
                In case of emergency broadcasts, important information will appear here.
            </div>
        </div>
    </div>
</div>
@endsection