"use strict";


$(function () {

    /*
    |--------------------------------------------------------------------------
    | DataTable
    |--------------------------------------------------------------------------
    */
    let table = $('.datatable-urls')
    .DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: {
            url: `/urls/buscar`,
            type: 'GET',
            data: function (data){
                data.term  = $('#search-term').val()
            },
        },
        columnDefs:
        [
            {targets:  0, orderable: true,  width: '5%'},
            {targets:  1, orderable: true},
            {targets:  2, orderable: false},
            /*{targets:  3, orderable: false},*/
            {targets:  3, orderable: false, class: 'text-end'},
        ],
        columns:
        [

            {data: 'id'},
            {data: function(data, type, row, meta){
                return `<div class="d-flex flex-column">
                <a href="overview.html#" class="text-gray-900 text-hover-primary fs-6 fw-bold">${data.description}</a>
                <span class="text-gray-400 fw-bold">${data.link}</span>
              </div>`;
                }
            },
            {data:  function(data, type, row, meta){
                /* return `
                        <input type="text" class="copy_input" value="${data.link_code}">
                        <a title="Copiar Link" type="button" value="${data.link_code}" class="button_copy_link_code btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-2">
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                        <!--end::Svg Icon-->
                        </a>`; */
                return `
                        <!--begin::Input group-->
                        <div class="input-group ">
                            <input type="text" readonly style="border-color='none'" value="${data.link_code}" class="copy_input form-control form-control-sm"/>
                            <span class="input-group-text" id="basic-addon2">
                                <a title="Copiar Link" type="button" value="${data.link_code}" class="button_copy_link_code btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-2">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M10.9,2 C11.4522847,2 11.9,2.44771525 11.9,3 C11.9,3.55228475 11.4522847,4 10.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,16 C20,15.4477153 20.4477153,15 21,15 C21.5522847,15 22,15.4477153 22,16 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L10.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M24.0690576,13.8973499 C24.0690576,13.1346331 24.2324969,10.1246259 21.8580869,7.73659596 C20.2600137,6.12944276 17.8683518,5.85068794 15.0081639,5.72356847 L15.0081639,1.83791555 C15.0081639,1.42370199 14.6723775,1.08791555 14.2581639,1.08791555 C14.0718537,1.08791555 13.892213,1.15726043 13.7542266,1.28244533 L7.24606818,7.18681951 C6.93929045,7.46513642 6.9162184,7.93944934 7.1945353,8.24622707 C7.20914339,8.26232899 7.22444472,8.27778811 7.24039592,8.29256062 L13.7485543,14.3198102 C14.0524605,14.6012598 14.5269852,14.5830551 14.8084348,14.2791489 C14.9368329,14.140506 15.0081639,13.9585047 15.0081639,13.7695393 L15.0081639,9.90761477 C16.8241562,9.95755456 18.1177196,10.0730665 19.2929978,10.4469645 C20.9778605,10.9829796 22.2816185,12.4994368 23.2042718,14.996336 L23.2043032,14.9963244 C23.313119,15.2908036 23.5938372,15.4863432 23.9077781,15.4863432 L24.0735976,15.4863432 C24.0735976,15.0278051 24.0690576,14.3014082 24.0690576,13.8973499 Z" fill="#000000" fill-rule="nonzero" transform="translate(15.536799, 8.287129) scale(-1, 1) translate(-15.536799, -8.287129) "/>
                                            </g>
                                        </svg>
                                    </span>
                                <!--end::Svg Icon-->
                                </a>
                            </span>
                        </div>
                        <!--end::Input group-->
                `;
            }},
            /*{data: 'link'},*/
            {
                data: function(data, type, row, meta){
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
                            <a href="${data.link}" target="_blank" class="menu-link px-3">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs030.svg-->
                            <span class="svg-icon svg-icon-3 me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9"/>
                                        <path d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z" fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Acessar link</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="urls/${data.id}/editar" class="menu-link px-3"
                            data-id="${data.id}" data-link="${data.link}" data-code="${data.code}" data-description="${data.description}" data-script_header="<!--${data.script_header}-->" data-script_body="<!--${data.script_body}-->">
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
                            <span class="svg-icon svg-icon-3 me-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Editar link</a>
                        </div>
                        <!--end::Menu item-->
                        <div class="separator my-5"></div>
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3 delete-url" 
                            data-id="${data.id}" data-description="${data.description}" data-link="${data.link}">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen051.svg-->
                            <span class="svg-icon svg-icon-3 me-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Excluir link</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </span>`;
                }
            },

        ],
        lengthMenu: [10, 25, 50, 50, 50],
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
    | Modal new link
    |--------------------------------------------------------------------------
    */
    var KTModalNewCard = function () {
        var submitButton;
        var cancelButton;
        var validator;
        var form;
        var modal;
        var modalEl;

        // Init form inputs
        var initForm = function() {
        }

        // Handle form validation and submittion
        var handleForm = function() {
            // Stepper custom navigation

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'link': {
                            validators: {
                                notEmpty: {
                                    message: 'O link é obrigatório'
                                }
                            }
                        },
                        'description': {
                            validators: {
                                notEmpty: {
                                    message: 'A descrição é obrigatória'
                                }
                            }
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );

            // Action buttons
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();

                var formData = new FormData(document.querySelector('#kt_modal_new_card_form'));

                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {

                        if (status == 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');

                            // Disable button to avoid multiple click
                            submitButton.disabled = true;

                            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            setTimeout(function() {
                                // Remove loading indication
                                submitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;

                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: `/urls/cadastrar`,
                                    data: formData,
                                    cache: false,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {

                                        //User feedback
                                        Swal.fire({
                                            text: "O link foi inserido com sucesso!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });

                                        //reload table
                                        table.draw();
                                        //hide modal
                                        modal.hide();
                                    },
                                    error: function (response, status, message) {
                                        switch (true) {
                                            case (response.status==422):
                                                    $.each(response.responseJSON.errors, function (index, element) {
                                                        toastr.warning(element[0]);
                                                    });
                                                break;

                                            default:
                                                    toastr.error("Opss...ocorreu um erro. Contacte o suporte!");
                                                break;
                                        }
                                    },
                                    timeout: 5000
                                });

                            }, 2000);
                        } else {

                            Swal.fire({
                                text: "Desculpe, parece que alguns erros foram detectados, tente novamente.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                }
            });

            cancelButton.addEventListener('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    text: "Tem certeza que deseja cancelar?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, cancelar!",
                    cancelButtonText: "Não",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        form.reset(); // Reset form
                        modal.hide(); // Hide modal
                    } else if (result.dismiss === 'cancel') {
                        //none
                    }
                });
            });
        }

        return {
            // Public functions
            init: function () {
                // Elements
                modalEl = document.querySelector('#kt_modal_new_card');

                if (!modalEl) {
                    return;
                }

                modal = new bootstrap.Modal(modalEl);

                form = document.querySelector('#kt_modal_new_card_form');
                submitButton = document.getElementById('kt_modal_new_card_submit');
                cancelButton = document.getElementById('kt_modal_new_card_cancel');

                initForm();
                handleForm();
            }
        };
    }();

    KTModalNewCard.init();

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

        // Init form inputs
        var initForm = function() {

        }

        // Handle form validation and submittion
        var handleForm = function() {
            // Stepper custom navigation

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'link': {
                            validators: {
                                notEmpty: {
                                    message: 'O link é obrigatório'
                                }
                            }
                        },
                        'description': {
                            validators: {
                                notEmpty: {
                                    message: 'A descrição é obrigatória'
                                }
                            }
                        },
                    },

                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: '.fv-row',
                            eleInvalidClass: '',
                            eleValidClass: ''
                        })
                    }
                }
            );

            // Action buttons
            submitButton.addEventListener('click', function (e) {
                // Prevent default button action
                e.preventDefault();

                var formData = new FormData(document.querySelector('#kt_modal_new_update_form'));

                // Validate form before submit
                if (validator) {
                    validator.validate().then(function (status) {

                        if (status == 'Valid') {
                            // Show loading indication
                            submitButton.setAttribute('data-kt-indicator', 'on');

                            // Disable button to avoid multiple click
                            submitButton.disabled = true;

                            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                            setTimeout(function() {
                                // Remove loading indication
                                submitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;
                                //console.log(formData.get('id')); return false;
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: `/urls/${formData.get('id')}/editar`,
                                    data: formData,
                                    cache: false,
                                    processData: false,
                                    contentType: false,
                                    success: function (response) {

                                        //User feedback
                                        Swal.fire({
                                            text: "O link foi editados com sucesso!",
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            }
                                        });

                                        //reload table
                                        table.draw();
                                        //hide modal
                                        modal.hide();
                                    },
                                    error: function (response, status, message) {
                                        switch (true) {
                                            case (response.status==422):
                                                    $.each(response.responseJSON.errors, function (index, element) {
                                                        toastr.warning(element[0]);
                                                    });
                                                break;

                                            default:
                                                    toastr.error("Opss...ocorreu um erro. Contacte o suporte!");
                                                break;
                                        }
                                    },
                                    timeout: 5000
                                });

                            }, 2000);
                        } else {

                            Swal.fire({
                                text: "Desculpe, parece que alguns erros foram detectados, tente novamente.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }
                    });
                }
            });

            cancelButton.addEventListener('click', function (e) {
                e.preventDefault();

                Swal.fire({
                    text: "Tem certeza que deseja cancelar?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, cancelar!",
                    cancelButtonText: "Não",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function (result) {
                    if (result.value) {
                        form.reset(); // Reset form
                        modal.hide(); // Hide modal
                    } else if (result.dismiss === 'cancel') {
                        //none
                    }
                });
            });
        }

        return {
            // Public functions
            init: function () {
                // Elements
                modalEl = document.querySelector('#kt_modal_edit_card');

                if (!modalEl) {
                    return;
                }

                modal = new bootstrap.Modal(modalEl);

                form = document.querySelector('#kt_modal_new_update_form');
                submitButton = document.getElementById('kt_modal_new_update_submit');
                cancelButton = document.getElementById('kt_modal_new_update_cancel');

                initForm();
                handleForm();
            }
        };
    }();

    KTModalEditCard.init();

    /*
    |--------------------------------------------------------------------------
    | Field events
    |--------------------------------------------------------------------------
    */
    $(document).on('keyup', `input#search-term`,function (e) {
        table.draw();
    });

    $(document).on('click', `a.delete-url`,function (e) {
        let button = $(this);
        console.log(button.data());
        Swal.fire({
            title: `Deseja remover o link <u>${button.data().link}</u> referente à <b>${button.data().description}</b>?`,
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Sim",
            cancelButtonText: "Não",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-active-light"
            }
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: `/urls/${button.data().id}/excluir`,
                    data:{
                        "id":button.data().id
                    },
                    success: function (response) {

                        //User feedback
                        Swal.fire({
                            text: "O link foi excluído com sucesso!",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        });

                        //reload table
                        table.draw();
                    },
                    error: function (response, status, message) {
                        switch (true) {
                            case (response.status==422):
                                    $.each(response.responseJSON.errors, function (index, element) {
                                        toastr.warning(element[0]);
                                    });
                                break;

                            default:
                                    toastr.error("Opss...ocorreu um erro. Contacte o suporte!");
                                break;
                        }
                    },
                    timeout: 5000
                });
            } else if (result.dismiss === 'cancel') {
                //none
            }
        });
    });

    $(document).on('hide.bs.modal', '#kt_modal_new_card', function (event) {
        document.querySelector('#kt_modal_new_card_form').reset();
    });

    function sanitizeScript(script){
        
        if(script == '<!--null-->'){
            return '';
        }

        return  script.replace("<!--",'').replace("-->",'');
    }

    /*$(document).on('show.bs.modal', '#kt_modal_edit_card', function (event) {
        let button = $(event.relatedTarget);
        let modal = $(this);
        //console.log(button.data());

        modal.find('input[name="id"]').val(button.data().id);
        modal.find('input[name="code"]').val(button.data().code);
        modal.find('input[name="code_original"]').val(button.data().code);
        modal.find('input[name="link"]').val(button.data().link);
        modal.find('textarea[name="description"]').val(button.data().description);
        modal.find('textarea[name="script_header"]').val(sanitizeScript(String(button.data().script_header)));
        modal.find('textarea[name="script_body"]').val(sanitizeScript(String(button.data().script_body)));

    });*/

    $(document).on('click','.button_copy_link_code', function(event){
        let el = ($(this).parent().parent().find(".copy_input"));
        el.select();
        document.execCommand("copy", false);
    });

    $('input[name="code"]').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z0-9._\b-]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }

        e.preventDefault();
        return false;
    });

});
