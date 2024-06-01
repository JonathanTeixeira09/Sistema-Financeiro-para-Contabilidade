<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('title')">
    <meta name="author" content="Jonathan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>


</head>
<body>

<header class="py-4 d-flex align-items-stretch border-bottom">

    @include('layouts.navigation')

</header>
<br>
<br>

<div class="container" role="main">
    <div class="row">
        <div class="col-md-12  mx-auto justify-content-center align-items-center flex-column">
            <div class="page-header">
                <br>
                <h2 style="text-align: center;">@yield('title')</h2>
                <hr>
            </div>
            <div class="col-md-8  mx-auto justify-content-center align-items-center flex-column">
                 @include('flash::message')

            </div>
            @yield('conteudo')
        </div>
    </div>
</div>
<div class="container my-5">
    <footer class="text-center text-lg-start bg-dark fixed-bottom">
        @extends('layouts.footer')
    </footer>

</div>

<!-- Scripts JS -->
<!--<script src="{{ asset('js/bootstrap.min.js')}}"></script>-->
<script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{ asset('js/popper.min.2.js')}}"></script>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<!--<script src="{{ asset('js/jquery.form.min.js') }}"></script>-->
<script src="{{ asset('js/jquery.mask.min.js')}}"></script>

</body>
</html>
