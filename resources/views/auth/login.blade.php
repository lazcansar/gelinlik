@extends('theme')
@section('title') Giriş Yap @endsection
@section('govde')



    <section class="login-page">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="login-title">
                Giriş Yap
            </div>
            <div class="login-sub-info">
                Hesabın yok mu? <a href="{{ route('register-page') }}">Hemen hesap oluştur.</a>
            </div>

            <div class="login-form">
                <form action="{{ route('login-insert') }}" method="POST">
                    @csrf

                    <label for="email">E-Posta*</label>
                    <input type="email" class="form-control mb-3" name="email" required>

                    <label for="password">Şifre*</label>
                    <input type="password" class="form-control mb-3" name="password" required>
                    <a class="d-block mb-3" href="">Şifreni mi unuttun?</a>

                    <button type="submit" class="d-block btn btn-success">Giriş Yap</button>
                </form>
            </div>


        </div>
    </section>

@endsection
