@extends('theme')
@section('title') Giriş Yap @endsection
@section('govde')



    <section class="login-page">
        <div class="container">
            <div class="login-title">
                Giriş Yap
            </div>
            <div class="login-sub-info">
                Hesabın yok mu? <a href="#">Hemen hesap oluştur.</a>
            </div>

            <div class="login-form">
                <form action="" method="post">
                    @csrf

                    <label for="email">E-Posta*</label>
                    <input type="email" class="form-control mb-3" name="email" required>

                    <label for="password">Şifre*</label>
                    <input type="password" class="form-control mb-3" name="password" required>
                    <a class="d-block mb-3" href="">Şifreni mi unuttun?</a>

                    <button type="submit" class="btn btn-success">Giriş Yap</button>
                </form>
            </div>


        </div>
    </section>

@endsection
