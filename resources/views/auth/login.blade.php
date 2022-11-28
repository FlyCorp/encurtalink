@extends('layouts.auth')

@section('content')
<!--begin::Body-->
<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
    <!--begin::Wrapper-->
    <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
        <!--begin::Content-->
        <div class="w-md-400px">
            <!--begin::Form-->
            <form method="POST" class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{route('home')}}" action="{{ route('login') }}">
                @csrf
                <!--begin::Heading-->
                <div class="text-center mb-11">
                    <!--begin::Title-->
                    <h1 class="text-dark fw-bolder mb-3">Iniciar sessão</h1>
                    <!--end::Title-->
                    <!--begin::Subtitle-->
                    <div class="text-gray-500 fw-semibold fs-6">Forneça suas credenciais de acesso</div>
                    <!--end::Subtitle=-->
                </div>
                <!--begin::Heading-->

                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input id="email" type="text" placeholder="Email" name="email" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror bg-transparent" value="{{old('email')}}"/>
                    <!--end::Email-->

                    @error('email')
                    <div class="fv-plugins-message-container invalid-feedback">
                        <div data-validator="notEmpty">
                            {{$errors->first('email')}}
                        </div>
                    </div>
                    @enderror
                </div>
                <!--end::Input group=-->

                <div class="fv-row mb-3">
                    <!--begin::Password-->
                    <input id="password" type="password" placeholder="Senha" name="password" autocomplete="off" class="form-control @error('password') is-invalid @enderror bg-transparent" />
                    <!--end::Password-->

                    @error('password')
                    <div class="fv-plugins-message-container invalid-feedback">
                        <div data-validator="notEmpty">
                            {{$errors->first('password')}}
                        </div>
                    </div>
                    @enderror
                </div>

                <!--end::Input group=-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <!--begin::Link-->
                    <a href="{{ route('password.request') }}" class="link-primary">Esqueceu a senha ?</a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Submit button-->
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Entrar</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Aguarde...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                </div>
                <!--end::Submit button-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Body-->
@endsection
