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

                                    {{-- <!--begin::Filter-->
                          <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                              </svg>
                            </span>
                            <!--end::Svg Icon-->Filter
                          </button>
                          <!--begin::Menu 1-->
                          <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" style="">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                              <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5" data-kt-subscription-table-filter="form">
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Month:</label>
                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="month" data-hide-search="true" data-select2-id="select2-data-10-qetb" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                  <option data-select2-id="select2-data-12-0tm0"></option>
                                  <option value="jan">January</option>
                                  <option value="feb">February</option>
                                  <option value="mar">March</option>
                                  <option value="apr">April</option>
                                  <option value="may">May</option>
                                  <option value="jun">June</option>
                                  <option value="jul">July</option>
                                  <option value="aug">August</option>
                                  <option value="sep">September</option>
                                  <option value="oct">October</option>
                                  <option value="nov">November</option>
                                  <option value="dec">December</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-05wv" style="width: 100%;">
                                  <span class="selection">
                                    <span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-nxjz-container" aria-controls="select2-nxjz-container">
                                      <span class="select2-selection__rendered" id="select2-nxjz-container" role="textbox" aria-readonly="true" title="Select option">
                                        <span class="select2-selection__placeholder">Select option</span>
                                      </span>
                                      <span class="select2-selection__arrow" role="presentation">
                                        <b role="presentation"></b>
                                      </span>
                                    </span>
                                  </span>
                                  <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Status:</label>
                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="status" data-hide-search="true" data-select2-id="select2-data-13-ylr4" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                  <option data-select2-id="select2-data-15-okht"></option>
                                  <option value="Active">Active</option>
                                  <option value="Expiring">Expiring</option>
                                  <option value="Suspended">Suspended</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-14-j6sb" style="width: 100%;">
                                  <span class="selection">
                                    <span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-q7f7-container" aria-controls="select2-q7f7-container">
                                      <span class="select2-selection__rendered" id="select2-q7f7-container" role="textbox" aria-readonly="true" title="Select option">
                                        <span class="select2-selection__placeholder">Select option</span>
                                      </span>
                                      <span class="select2-selection__arrow" role="presentation">
                                        <b role="presentation"></b>
                                      </span>
                                    </span>
                                  </span>
                                  <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Billing Method:</label>
                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="billing" data-hide-search="true" data-select2-id="select2-data-16-6k44" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                  <option data-select2-id="select2-data-18-zjii"></option>
                                  <option value="Auto-debit">Auto-debit</option>
                                  <option value="Manual - Credit Card">Manual - Credit Card</option>
                                  <option value="Manual - Cash">Manual - Cash</option>
                                  <option value="Manual - Paypal">Manual - Paypal</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-17-dn77" style="width: 100%;">
                                  <span class="selection">
                                    <span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-dsrs-container" aria-controls="select2-dsrs-container">
                                      <span class="select2-selection__rendered" id="select2-dsrs-container" role="textbox" aria-readonly="true" title="Select option">
                                        <span class="select2-selection__placeholder">Select option</span>
                                      </span>
                                      <span class="select2-selection__arrow" role="presentation">
                                        <b role="presentation"></b>
                                      </span>
                                    </span>
                                  </span>
                                  <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                              </div>
                              <!--end::Input group-->
                              <!--begin::Input group-->
                              <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Product:</label>
                                <select class="form-select form-select-solid fw-bold select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="product" data-hide-search="true" data-select2-id="select2-data-19-qryy" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                  <option data-select2-id="select2-data-21-6x92"></option>
                                  <option value="Basic">Basic</option>
                                  <option value="Basic Bundle">Basic Bundle</option>
                                  <option value="Teams">Teams</option>
                                  <option value="Teams Bundle">Teams Bundle</option>
                                  <option value="Enterprise">Enterprise</option>
                                  <option value=" Enterprise Bundle">Enterprise Bundle</option>
                                </select>
                                <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-20-cfb4" style="width: 100%;">
                                  <span class="selection">
                                    <span class="select2-selection select2-selection--single form-select form-select-solid fw-bold" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-kcfb-container" aria-controls="select2-kcfb-container">
                                      <span class="select2-selection__rendered" id="select2-kcfb-container" role="textbox" aria-readonly="true" title="Select option">
                                        <span class="select2-selection__placeholder">Select option</span>
                                      </span>
                                      <span class="select2-selection__arrow" role="presentation">
                                        <b role="presentation"></b>
                                      </span>
                                    </span>
                                  </span>
                                  <span class="dropdown-wrapper" aria-hidden="true"></span>
                                </span>
                              </div>
                              <!--end::Input group-->
                              <!--begin::Actions-->
                              <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="filter">Apply</button>
                              </div>
                              <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                          </div>
                          <!--end::Menu 1-->
                          <!--end::Filter--> --}}

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
                                                    style="width: 201.141px;">Destino</th>
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
@endsection
