@extends('theme')
@section('title') Kayıt Ol @endsection
@section('govde')


    @if(session('register'))
        <div class="container mt-5">
            <div class="alert alert-success">{{ session('register') }}</div>
        </div>
    @endif
    @if(session('access'))
        <div class="container mt-5">
            <div class="alert alert-success">{{ session('access') }}</div>
        </div>
    @endif
    @error('email')
        <div class="container mt-5">
            <div class="alert alert-success rounded-0">{{ $message }}</div>
        </div>
    @enderror

    <section class="login-page">
        <div class="container">
            <div class="login-title">
                Kayıt Ol
            </div>
            <div class="login-sub-info">
                Hesabın var mı? <a href="{{ route('login-page') }}">Giriş Yap.</a>
            </div>

            <div class="login-form">

                <form action="{{ route('register-insert') }}" method="post">
                    @csrf

                    <label for="ad">Ad*</label>
                    <input type="text" class="form-control mb-3" name="name" required>

                    <label for="soyad">Soyad*</label>
                    <input type="text" class="form-control mb-3" name="surname" required>

                    <label for="email">E-Posta*</label>
                    <input type="email" class="form-control mb-3" name="email" required>

                    <label for="password">Şifre*</label>
                    <input type="password" class="form-control mb-3" name="password" required>
                    <input class="d-inline-block" type="checkbox" id="onay" name="onay"> <label for="onay" class="d-inline-block">Onaylıyorum <a href="">Şartlar</a> ve <a href="">Gizlilik</a> </label>

                    <button type="submit" class="d-block btn btn-success mt-3">Kayıt Ol</button>
                </form>
            </div>


        </div>
    </section>


@endsection
