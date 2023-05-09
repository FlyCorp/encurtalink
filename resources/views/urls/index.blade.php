@extends('layouts.admin')

@push('css')
@endpush

@push('script')
    <link href="@version('assets/plugins/custom/datatables/datatables.bundle.css')" rel="stylesheet" type="text/css" />
    <script src="@version('assets/plugins/custom/datatables/datatables.bundle.js')"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/mode/javascript/javascript.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.css">
    <script src="@version('assets/js/custom/pages/urls/table.js')" rel="script" type="text/javascript"></script>
@endpush

@section('content')
    @include('urls.partials.topbar')

    <div class="d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="row g5 g-xl-10 mb-5 mb-xl-10">
                <div class="col-xl-12">
                    <!--begin::Tables widget 14-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor"></rect>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" id="search-term"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Pesquisar...">
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">

                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">

                                    <!--begin::Add subscription-->
                                    <a href="{{route('urls.config.index')}}" title="Configurar Link do link" class="btn btn-light btn-active-primary fw-bold" style="margin-right: 3px;">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                                <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--end::Add subscription-->
                                    <!--begin::Add subscription-->
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card"
                                        class="btn btn-primary">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                    height="2" rx="1" transform="rotate(-90 11.364 20.364)"
                                                    fill="currentColor"></rect>
                                                <rect x="4.36396" y="11.364" width="16" height="2"
                                                    rx="1" fill="currentColor"></rect>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Novo link
                                    </a>
                                    <!--end::Add subscription-->


                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none"
                                    data-kt-subscription-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2"
                                            data-kt-subscription-table-select="selected_count"></span>Selected
                                    </div>
                                    <button type="button" class="btn btn-danger"
                                        data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div id="kt_subscriptions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table
                                        class="table datatable-urls align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                        id="kt_subscriptions_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Customer: activate to sort column ascending"
                                                    style="width: 188.219px;">ID</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 188.219px;">Descrição</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Billing: activate to sort column ascending"
                                                    style="width: 201.141px;">Link</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                        aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                        aria-label="Billing: activate to sort column ascending"
                                                        style="width: 201.141px;">Redirecionar</th>
                                                <th class="text-end min-w-70px sorting_disabled" rowspan="1"
                                                    colspan="1" aria-label="Ações" style="width: 145.781px;">Ações
                                                </th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="text-gray-600 fw-semibold">

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>

                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Tables widget 14-->
                </div>
            </div>
        </div>
    </div>
    @include('urls.partials.modal-create-url')
    @include('urls.partials.modal-edit-url')

    @include('urls.partials.modal-configuration-link')
@endsection
