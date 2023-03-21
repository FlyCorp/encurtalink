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
                url: `/user/buscar`,
                type: 'GET',
                data: function (data) {
                    data.term = $('#search-term').val()
                },
            },
            columnDefs:
                [
                    { targets: 0, orderable: true, width: '120px' },
                    { targets: 1, orderable: true },
                    { targets: 2, orderable: false },
                    { targets: 3, orderable: false, class: 'text-center' },
                ],
            columns:
                [

                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    {
                        data: function (data, type, row, meta) {
                            //console.log(data)
                            /*return `<div class="d-flex justify-content-end flex-shrink-0">
                                <a title="Editar Usuário" href="tables.html#" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_card" class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-1"
                                data-id="${data.id}" data-name="${data.name}" data-email="${data.email}" data-avatar="${data.avatar}">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a title="Excluir Usuário" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-url"
                                data-id="${data.id}" data-name="${data.name}">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>`;*/
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
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_card"
                                                data-id="${data.id}" data-name="${data.name}" data-email="${data.email}" data-avatar="${data.avatar}" class="menu-link px-3">
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
                                                data-id="${data.id}" data-name="${data.name}">
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
        var initForm = function () {
        }

        // Handle form validation and submittion
        var handleForm = function () {
            // Stepper custom navigation

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'nome': {
                            validators: {
                                notEmpty: {
                                    message: 'O Nome é obrigatório'
                                }
                            }
                        },
                        'email': {
                            validators: {
                                notEmpty: {
                                    message: 'A E-mail é obrigatória'
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
                            setTimeout(function () {
                                // Remove loading indication
                                submitButton.removeAttribute('data-kt-indicator');

                                // Enable button
                                submitButton.disabled = false;

                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    type: "POST",
                                    url: `/user/cadastrar`,
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
                                            case (response.status == 422):
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
        var initForm = function () {

        }

        // Handle form validation and submittion
        var handleForm = function () {
            // Stepper custom navigation

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validator = FormValidation.formValidation(
                form,
                {
                    fields: {
                        'name': {
                            validators: {
                                notEmpty: {
                                    message: 'O Nome é obrigatório'
                                }
                            }
                        },
                        'email': {
                            validators: {
                                notEmpty: {
                                    message: 'A E-mail é obrigatória'
                                }
                            }
                        },
                        /* 'currentpassword': {
                            validators: {
                                notEmpty: {
                                    message: 'A Senha Atual é obrigatória'
                                }
                            }
                        },
                        'newpassword': {
                            validators: {
                                notEmpty: {
                                    message: 'A Nova Senha é obrigatória'
                                }
                            }
                        },
                        'confirmpassword': {
                            validators: {
                                notEmpty: {
                                    message: 'A Confirmação da Senha é obrigatória'
                                },
                                identical: {
                                    compare: function () {
                                        return form.querySelector('[name="newpassword"]').value;
                                    },
                                    message: 'A Nova Senha e a Confirmação da Senha, não são iguais'
                                }
                            }
                        }, */
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
                            setTimeout(function () {
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
                                    url: `user/${formData.get('id')}/editar`,
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
                                            case (response.code == 422):
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
    $(document).on('keyup', `input#search-term`, function (e) {
        table.draw();
    });

    $(document).on('click', `a.delete-url`, function (e) {
        let button = $(this);

        Swal.fire({
            title: `Deseja mesmo remover <u>${button.data().name}</u>?`,
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
                    url: `/user/${button.data().id}/excluir`,
                    data: {
                        "id": button.data().id
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
                            case (response.status == 422):
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

    $(document).on('show.bs.modal', '#kt_modal_edit_card', function (event) {
        let button = $(event.relatedTarget);
        let modal = $(this);


        modal.find('input[name="id"]').val(button.data().id);
        modal.find('input[name="name"]').val(button.data().name);
        modal.find('input[name="email"]').val(button.data().email);

    });


    let handleChangePassword = function (e) {
        var validation;

        // form elements
        var passwordForm = document.getElementById('kt_signin_change_password');

        if (!passwordForm) {
            return;
        }


        validation = FormValidation.formValidation(
            passwordForm,
            {
                fields: {
                    currentpassword: {
                        validators: {
                            notEmpty: {
                                message: 'Current Password is required'
                            }
                        }
                    },

                    newpassword: {
                        validators: {
                            notEmpty: {
                                message: 'New Password is required'
                            }
                        }
                    },

                    confirmpassword: {
                        validators: {
                            notEmpty: {
                                message: 'Confirm Password is required'
                            },
                            identical: {
                                compare: function () {
                                    return passwordForm.querySelector('[name="newpassword"]').value;
                                },
                                message: 'The password and its confirm are not the same'
                            }
                        }
                    },
                },

                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
                }
            }
        );

        passwordForm.querySelector('#kt_password_submit').addEventListener('click', function (e) {
            e.preventDefault();
            console.log('click');

            validation.validate().then(function (status) {
                if (status == 'Valid') {
                    swal.fire({
                        text: "Sent password reset. Please check your email",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    }).then(function () {
                        passwordForm.reset();
                        validation.resetForm(); // Reset formvalidation --- more info: https://formvalidation.io/guide/api/reset-form/
                        toggleChangePassword();
                    });
                } else {
                    swal.fire({
                        text: "Sorry, looks like there are some errors detected, please try again.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn font-weight-bold btn-light-primary"
                        }
                    });
                }
            });
        });
    }

    // Public methods
    return {
        init: function () {
            signInForm = document.getElementById('kt_signin_change_email');
            signInMainEl = document.getElementById('kt_signin_email');
            signInEditEl = document.getElementById('kt_signin_email_edit');
            passwordMainEl = document.getElementById('kt_signin_password');
            passwordEditEl = document.getElementById('kt_signin_password_edit');
            signInChangeEmail = document.getElementById('kt_signin_email_button');
            signInCancelEmail = document.getElementById('kt_signin_cancel');
            passwordChange = document.getElementById('kt_signin_password_button');
            passwordCancel = document.getElementById('kt_password_cancel');

            initSettings();
            handleChangeEmail();
            handleChangePassword();
        }
    }

});
