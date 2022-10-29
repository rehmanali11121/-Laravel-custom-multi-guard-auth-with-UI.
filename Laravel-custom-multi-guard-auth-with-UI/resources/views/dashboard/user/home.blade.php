@extends('layouts.user.main')
@section('main-app')  
<body>
    <div class="container row justify-content-center">
<div class= "mt-5 px-20  col-4 ">
    <div>
        <h1>
            User Dashboard
        </h1>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div> 
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div> 
    @endif
    <div>
        <h5>
            {{Auth::guard('web')->user()->name}}
            {{Auth::guard('web')->user()->email}}
            {{Auth::guard('web')->user()->created_at}}
        </h5>
    </div>

<a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
<form action="{{route('user.logout')}}" id="logout-form" method="POST">
    @csrf
</form>
</div>
</div>
@endsection
    