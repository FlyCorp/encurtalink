@extends('layouts.auth')

@section('content')
<!--begin::Body-->
<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
    <!--begin::Wrapper-->
    <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
        <!--begin::Content-->
        <div class="w-md-400px">
            <!--begin::Form-->
            <form method="POST" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_password_reset_form" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Redefinir senha</h1>
                    <!--end::Title-->
                    <!--begin::Link-->
                    <div class="text-gray-500 fw-semibold fs-6">Informe seu email para redefinir sua senha.</div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->

                <!--begin::Input group=-->
                <div class="fv-row mb-8 fv-plugins-icon-container">
                        <!--begin::Email-->
                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <!--end::Email-->

                        @error('email')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-validator="notEmpty">
                                {{$errors->first('email')}}
                            </div>
                        </div>
                        @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="fv-row mb-8 fv-plugins-icon-container">
                        <!--begin::Password-->
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <!--end::Password-->

                        @error('password')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-validator="notEmpty">
                                {{$errors->first('password')}}
                            </div>
                        </div>
                        @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="fv-row mb-8 fv-plugins-icon-container">
                        <!--begin::Password-->
                        <input id="password-confirm" type="password" placeholder="Password confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <!--end::Password-->

                        @error('password_confirmation')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-validator="notEmpty">
                                {{$errors->first('password_confirmation')}}
                            </div>
                        </div>
                        @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Salvar</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Aguarde...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                    <a href="{{route('login')}}" class="btn btn-light">Cancelar</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Body-->
@endsection
