@extends('layouts.seller.main')
@section('main-app') 
<body>
    <div class="container row justify-content-center">
<div class= "mt-5 px-20  col-4 ">
    <div>
        <h1>
            Seller Dashboard
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
            {{Auth::guard('seller')->user()->name}}
            {{Auth::guard('seller')->user()->email}}
            {{Auth::guard('seller')->user()->created_at}}
        </h5>
    </div>

<a href="{{route('seller.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
<form action="{{route('seller.logout')}}" id="logout-form" method="POST">
    @csrf
</form>
</div>
</div>
@endsection
   