@extends('layouts.admin.main')
@section('main-app')
<body>
    <div class="container row justify-content-center ">
<div class= "mt-5 px-20  col-4 ">
            <div >
            <h1>
                Admin Dashboard
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
        {{Auth::guard('admin')->user()->name}}
        {{Auth::guard('admin')->user()->email}}
        {{Auth::guard('admin')->user()->created_at}}
    </h5>
</div>
<a href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
<form action="{{route('admin.logout')}}" id="logout-form" method="POST">
    @csrf
</form>
</div>
</div>
   
@endsection