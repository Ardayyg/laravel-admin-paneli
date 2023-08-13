@extends('layouts.admin.members')
@section('content')
    
@endsection

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Giriş Yap!</h1>
                                    </div>
                                    <form class="user" action="{{route('admin.login.post')}}" method="POST">
                                        @csrf
                                        @if (session()->has('message'))
                                            <div class="alert alert-{{session()->get('message')['type']}}">{{session()->get('message')['description']}}</div>
                                        @endif
                                        @if ($errors->count())
                                            <div class="alert alert-danger">Hatalı</div>
                                        @endif
                                        <div class="form-group">
                                            <input type="email" name='email' class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="E-Mail Adresi Giriniz...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Şifre">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Beni Hatırla
                                                    </label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" type="submit">Giriş Yap</button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Google İle Giriş
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Facebook İle Giriş
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('admin.forgetpassword')}}">Şifreni mi Unuttun?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('admin.register')}}">Hesap Oluştur</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

  