"use strict";

$(function () {

    /*
    |--------------------------------------------------------------------------
    | DataTable
    |--------------------------------------------------------------------------
    */
    let table = $('.datatable-user')
        .DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: {
                url: `/nps-links/buscar`,
                type: 'GET',
                data: function (data) {
                    data.term = $('#search-term').val()
                },
            },
            columnDefs:
                [
                    { targets: 0, orderable: true, width: '120px' },
                    { targets: 1, orderable: true },
                    { targets: 2, orderable: true },
                    { targets: 3, orderable: false},
                    { targets: 4, orderable: false},
                    { targets: 5, orderable: false, class: 'text-center' },
                ],
            columns:
                [

                    { data: 'id' },
                    { data: 'campaign_name' },
                    { data: 'client_name' },
                    { data: 'config_gateway' },
                    { data: 'config_process_in' },
                    {
                        data: function (data, type, row, meta) {
                            return `<span>
                                        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Settings" data-kt-initialized="1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                            <span class="svg-icon svg-icon-2 m-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z" fill="currentColor"></path>
                                                    <path opacity="0.3" d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-250px py-4" data-kt-menu="true" style="">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_view_nps"
                                                class="menu-link px-3"
                                                data-id="${data.id}"
                                                data-campaign_name="${data.campaign_name}"
                                                data-client_name="${data.client_name}"
                                                data-client_document="${data.client_document}"
                                                data-client_representant="${data.client_representant}"
                                                data-client_uf="${data.client_uf}"
                                                data-client_city="${data.client_city}"
                                                data-order_company="${data.order_company}"
                                                data-order_number="${data.order_number}"
                                                data-order_value="${data.order_value}"
                                                data-order_date="${data.order_date}"
                                                data-config_process_in="${data.config_process_in}"
                                                data-config_greater="${data.config_greater}"
                                                data-config_gateway="${data.config_gateway}"
                                                data-config_number="${data.config_number}"
                                                data-vote="${data.vote}"
                                                data-voted_at="${data.voted_at}"
                                                data-reason_channel="${data.reason_channel}"
                                                data-reason_description="${data.reason_description}"
                                                data-nps_link="${data.nps_link}">
                                                <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                                                <span class="svg-icon svg-icon-3 me-3">
                                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect y="6" width="16" height="3" rx="1.5" fill="currentColor"/>
                                                        <rect opacity="0.3" y="12" width="8" height="3" rx="1.5" fill="currentColor"/>
                                                        <rect opacity="0.3" width="12" height="3" rx="1.5" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Visualizar parâmetros</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <div class="separator my-5"></div>
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="${data.nps_link}" target="_new" class="menu-link px-3">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                                                <span class="svg-icon svg-icon-3 me-3">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.2166 8.50002L10.5166 7.80007C10.1166 7.40007 10.1166 6.80005 10.5166 6.40005L13.4166 3.50002C15.5166 1.40002 18.9166 1.50005 20.8166 3.90005C22.5166 5.90005 22.2166 8.90007 20.3166 10.8001L17.5166 13.6C17.1166 14 16.5166 14 16.1166 13.6L15.4166 12.9C15.0166 12.5 15.0166 11.9 15.4166 11.5L18.3166 8.6C19.2166 7.7 19.1166 6.30002 18.0166 5.50002C17.2166 4.90002 16.0166 5.10007 15.3166 5.80007L12.4166 8.69997C12.2166 8.89997 11.6166 8.90002 11.2166 8.50002ZM11.2166 15.6L8.51659 18.3001C7.81659 19.0001 6.71658 19.2 5.81658 18.6C4.81658 17.9 4.71659 16.4 5.51659 15.5L8.31658 12.7C8.71658 12.3 8.71658 11.7001 8.31658 11.3001L7.6166 10.6C7.2166 10.2 6.6166 10.2 6.2166 10.6L3.6166 13.2C1.7166 15.1 1.4166 18.1 3.1166 20.1C5.0166 22.4 8.51659 22.5 10.5166 20.5L13.3166 17.7C13.7166 17.3 13.7166 16.7001 13.3166 16.3001L12.6166 15.6C12.3166 15.2 11.6166 15.2 11.2166 15.6Z" fill="currentColor"/>
                                                        <path opacity="0.3" d="M5.0166 9L2.81659 8.40002C2.31659 8.30002 2.0166 7.79995 2.1166 7.19995L2.31659 5.90002C2.41659 5.20002 3.21659 4.89995 3.81659 5.19995L6.0166 6.40002C6.4166 6.60002 6.6166 7.09998 6.5166 7.59998L6.31659 8.30005C6.11659 8.80005 5.5166 9.1 5.0166 9ZM8.41659 5.69995H8.6166C9.1166 5.69995 9.5166 5.30005 9.5166 4.80005L9.6166 3.09998C9.6166 2.49998 9.2166 2 8.5166 2H7.81659C7.21659 2 6.71659 2.59995 6.91659 3.19995L7.31659 4.90002C7.41659 5.40002 7.91659 5.69995 8.41659 5.69995ZM14.6166 18.2L15.1166 21.3C15.2166 21.8 15.7166 22.2 16.2166 22L17.6166 21.6C18.1166 21.4 18.4166 20.8 18.1166 20.3L16.7166 17.5C16.5166 17.1 16.1166 16.9 15.7166 17L15.2166 17.1C14.8166 17.3 14.5166 17.7 14.6166 18.2ZM18.4166 16.3L19.8166 17.2C20.2166 17.5 20.8166 17.3 21.0166 16.8L21.3166 15.9C21.5166 15.4 21.1166 14.8 20.5166 14.8H18.8166C18.0166 14.8 17.7166 15.9 18.4166 16.3Z" fill="currentColor"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->&nbsp;Acessar link NPS</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </span>`;
                        }
                    },

                ],
            lengthMenu: [10, 25, 50, 100],
            iDisplayLength: 25,
            language:
            {
                url: "/assets/plugins/custom/datatables/pt-BR.json",
            },
            drawCallback: function () {
                KTMenu.createInstances();
            }
        });


    /*
    |--------------------------------------------------------------------------
    | Modal edit link
    |--------------------------------------------------------------------------
    */
    var KTModalEditCard = function () {
        var submitButton;
        var cancelButton;
        var validator;
        var form;
        var modal;
        var modalEl;


        return {
            // Public functions
            init: function () {
                // Elements
                modalEl = document.querySelector('#kt_modal_view_nps');

                if (!modalEl) {
                    return;
                }
            }
        };
    }();

    KTModalEditCard.init();

    /*
    |--------------------------------------------------------------------------
    | Field events
    |--------------------------------------------------------------------------
    */
    $(document).on('keyup', `input#search-term`, function (e) {
        table.draw();
    });

    $(document).on('show.bs.modal', '#kt_modal_view_nps', function (event) {
        let button = $(event.relatedTarget);
        let modal = $(this);console.log(button.data())

        modal.find('input[name="id"]').val(button.data().id);
        modal.find('input[name="campaign_name"]').val(button.data().campaign_name);
        modal.find('input[name="client_name"]').val(button.data().client_name);
        modal.find('input[name="client_document"]').val(button.data().client_document);
        modal.find('input[name="client_representant"]').val(button.data().client_representant);
        modal.find('input[name="client_uf"]').val(button.data().client_uf);
        modal.find('input[name="client_city"]').val(button.data().client_city);
        modal.find('input[name="order_company"]').val(button.data().order_company);
        modal.find('input[name="order_number"]').val(button.data().order_number);
        modal.find('input[name="order_value"]').val(button.data().order_value);
        modal.find('input[name="order_date"]').val(button.data().order_date);
        modal.find('input[name="config_process_in"]').val(button.data().config_process_in);
        modal.find('input[name="config_greater"]').val(button.data().config_greater);
        modal.find('input[name="config_gateway"]').val(button.data().config_gateway);
        modal.find('input[name="config_number"]').val(button.data().config_number);
        modal.find('input[name="vote"]').val(button.data().vote);
        modal.find('input[name="voted_at"]').val(button.data().voted_at);
        modal.find('input[name="reason_channel"]').val(button.data().reason_channel);
        modal.find('textarea[name="reason_description"]').val(button.data().reason_description);
        modal.find('input[name="nps_link"]').val(button.data().nps_link);

    });


    // Public methods
    return {
        init: function () {

        }
    }

});
