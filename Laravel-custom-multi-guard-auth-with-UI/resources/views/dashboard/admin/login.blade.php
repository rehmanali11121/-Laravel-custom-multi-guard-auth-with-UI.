<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>login</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container row justify-content-center">
        <div class= "mt-5 px-20  col-4 ">
            <div>
                <h1>
                    Admin Login
                </h1>
            </div>
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div> 
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div> 
                @endif
                    <form action="{{route('admin.dologin')}}" method="Post">
                            @csrf
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
                            <button type="submit" class="btn btn-success">Submit</button>
                    </form>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>