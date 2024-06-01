<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Jonathan Teixeira">
    <link rel="icon" href="{{ URL::to('img/logo.ico') }}">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/bootstrapcore.min.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/signin.css') }}">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.form.min.js') }}"></script>

</head>

<body class="text-center">

    {{-- @yield('content') --}}

    <main class="form-signin">

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            @endforeach
        @endif


        <form name="formLogin" method="POST" {{-- action="{{route('login.index')}}" --}}>
            @csrf
            <img class="mb-4" src="img/logo1.png" alt="logo" width="280" height="100">

            <div class="alert alert-danger d-none messageBox" role="alert">

            </div>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" placeholder="Digite um email" value="{{ old('email') }}" requerid>
                <label for="floatingInput">Email</label>

                <div class="invalid-feedback">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="form-floating">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Senha" requerid>
                <label for="floatingPassword">Senha</label>

                <div class="invalid-feedback">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar dados
                </label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Acessar</button><br>



            <p class="mt-5 mb-3 text-muted">&copy; 2023 - Sistema de Controle Financeiro</p>
        </form>
    </main>

    <script>
        $(function() {
            $('form[name="formLogin"]').submit(function(event) {
                event.preventDefault();

                $.ajax({
                    url: "{{ route('login.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {

                        if (response.success === true) {
                            window.location.href = "{{ route('/') }}";
                        } else {
                            $('.messageBox').removeClass('d-none').html(response.message);
                        }
                        console.log(response);
                    }
                });
            });
        });
    </script>

</body>

</html>
