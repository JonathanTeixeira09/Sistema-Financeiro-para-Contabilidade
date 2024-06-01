@extends('layouts.auth')


@section('content')

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

@endsection
