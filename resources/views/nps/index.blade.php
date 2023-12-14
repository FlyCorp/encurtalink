@extends('layouts.admin')

@push('css')
@endpush

@push('script')
    <link href="@version('assets/plugins/custom/datatables/datatables.bundle.css')" rel="stylesheet" type="text/css" />
    <script src="@version('assets/plugins/custom/datatables/datatables.bundle.js')"></script>
    <script src="@version('assets/js/custom/pages/nps/table.js')" rel="script" type="text/javascript"></script>
@endpush

@section('content')
    @include('nps.partials.topbar')

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
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <div id="kt_subscriptions_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table
                                        class="table datatable-user align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                        id="kt_subscriptions_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Customer: activate to sort column ascending"
                                                    style="width: 100px;">ID</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Status: activate to sort column ascending"
                                                    style="width: 188.219px;">CAMPANHA</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Billing: activate to sort column ascending"
                                                    style="width: 201.141px;">CLIENTE</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Billing: activate to sort column ascending"
                                                    style="width: 201.141px;">GATEWAY</th>
                                                <th class="min-w-125px sorting" tabindex="0"
                                                    aria-controls="kt_subscriptions_table" rowspan="1" colspan="1"
                                                    aria-label="Billing: activate to sort column ascending"
                                                    style="width: 201.141px;">AGENDAMENTO</th>
                                                <th class="text-end min-w-70px sorting_disabled" rowspan="1"
                                                    colspan="1" aria-label="Ações" style="width: 145.781px;">Ações</th>
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

    @include('nps.partials.modal-view-nps')
@endsection
