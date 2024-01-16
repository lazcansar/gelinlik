@extends('theme')
@section('title') Kayıt Ol @endsection
@section('govde')

    <section class="login-page">
        <div class="container">
            <div class="login-title">
                Kayıt Ol
            </div>
            <div class="login-sub-info">
                Hesabın var mı? <a href="#">Giriş Yap.</a>
            </div>

            <div class="login-form">
                <form action="" method="post">
                    @csrf

                    <label for="ad">Ad*</label>
                    <input type="text" class="form-control mb-3" name="ad" required>

                    <label for="soyad">Soyad*</label>
                    <input type="text" class="form-control mb-3" name="soyad" required>

                    <label for="email">E-Posta*</label>
                    <input type="email" class="form-control mb-3" name="email" required>

                    <label for="password">Şifre*</label>
                    <input type="password" class="form-control mb-3" name="password" required>
                    <input class="d-inline-block" type="checkbox"> <p class="d-inline-block">Onaylıyorum <a href="">Şartlar</a> ve <a href="">Gizlilik</a> </p>

                    <button type="submit" class="d-block btn btn-success mt-3">Kayıt Ol</button>
                </form>
            </div>


        </div>
    </section>


@endsection
