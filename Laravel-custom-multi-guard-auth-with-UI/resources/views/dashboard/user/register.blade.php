@extends('layouts.user.main')
@section('main-app')
<body>
    <div class="container row justify-content-center">
<div class= "mt-5 px-20  col-4 ">
    <div>
        <h1>
            User Registration
        </h1>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div> 
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div> 
    @endif
<form action="{{route('user.create')}}" method="Post">
    @csrf
<div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">

            <span class="text-danger">@error('name'){{$message}}@enderror</span>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>

          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
          </div>
          <div class="mb-3">
            <label for="cpassword" class="form-label">confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>

          </div>
          <button type="submit" class="btn btn-success">Submit</button>
          Already Registered <a class="text-success" href="{{route('user.login')}}">Login Here</a>
        </form>
</div>
</div>
@endsection
    