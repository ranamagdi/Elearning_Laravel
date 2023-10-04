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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="{{route('admin.home')}}">Home</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{route('admin.cat')}}">Categories</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{route('admin.trainer')}}">Trainers</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{route('admin.course')}}">Courses</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{route('admin.student')}}">Students</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{route('admin.logout')}}">Logout</a>
              </li>




            </ul>

          </div>
        </div>
      </nav>

