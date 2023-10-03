<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="{{asset('Front/css/bootstrap.min.css')}}">
    <link rel="stylesheet"  href="{{asset('Front/css/style.css')}}">
</head>
<body>
 <!-- Pills navs -->
 <div class="container" style="margin-top: 100px">
    @include('Admin.includes.errors')
 <form method="POST" action="{{route('admin.dologin')}}">
    @csrf
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form2Example1" class="form-control" placeholder="Email" name="email" />

    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form2Example2" class="form-control" placeholder="Password" name="password"/>

    </div>



    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

    <!-- Register buttons -->
    <div class="text-center">
      <p>Not a member? <a href="#!">Register</a></p>

    </div>
  </form>
 </div>
  <!-- Pills content -->
 <script src="{{asset('Front/js')}}//popper.min.js"></script>
 <!-- bootstrap js -->
 <script src="{{asset('Front/js')}}//bootstrap.min.js"></script>
 </body>
 </html>

