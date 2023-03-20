@extends('layouts.admin')



@push('script')
@endpush

@section('content')
    @include('urls.partials.topbar')

    <div class="d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="row g5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-12">
                    <!--begin::Tables widget 14-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Editar link</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3">
                            <!--begin:Form-->
                            @if($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            <form method='post' action='{{ url()->current() }}' autocomplete="off">
                                @csrf
                                <!--begin::Input group-->
                                <div
                                    class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Link</span>
                                    </label>
                                    <!--end::Label-->
                                    <div class="input-group mb-5">
                                        <span class="input-group-text" name="code_link_base"
                                            id="basic-addon3">{{ env('APP_URL') }}/</span>
                                        <input type="text" class="form-control" name="code" id="basic-url"
                                            aria-describedby="basic-addon3" value="{{old('code',$shortUrl->code)}}">
                                        <input type="hidden" name="code_original">
                                    </div>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div
                                    class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Destino</span>
                                    </label>
                                    <!--end::Label-->
                                    <input type="text" class="form-control form-control-solid" placeholder=""
                                        name="link" value="{{old('link',$shortUrl->link)}}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div
                                    class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Descrição</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea class="form-control form-control-solid" rows="3" name="description"
                                        placeholder="Informe uma breve descrição">{{old('description',$shortUrl->description)}}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div
                                    class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Script header</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea class="form-control form-control-solid" rows="3" name="script_header">{{old('script_header',$shortUrl->script_header)}}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div
                                    class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                        <span class="required">Script body</span>
                                    </label>
                                    <!--end::Label-->
                                    <textarea class="form-control form-control-solid" rows="3" name="script_body">{{old('script_body',$shortUrl->script_body)}}</textarea>
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="card-footer d-flex justify-content-end py-6">
                                    <button type="reset" id="kt_modal_new_update_cancel"
                                        class="btn btn-light me-3">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Salvar</span>
                                        <span class="indicator-progress">Aguarde... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end:Form-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Tables widget 14-->
                </div>
            </div>
        </div>
    </div>
@endsection
