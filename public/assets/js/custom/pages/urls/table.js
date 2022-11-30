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
            {targets:  0, orderable: true,  width: '120px'},
            {targets:  1, orderable: true},
            {targets:  2, orderable: false},
            {targets:  3, orderable: false},
            {targets:  4, orderable: false},
        ],
        columns:
        [

            {data: 'id'},
            {data: 'description'},
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
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                <!--end::Svg Icon-->
                                </a>
                            </span>
                        </div>
                        <!--end::Input group-->
                `;
            }},
            {data: 'link'},
            {
                data: function(data, type, row, meta){
                    return `<div class="d-flex justify-content-end flex-shrink-0">
                                <a title="Ir para o endereço" href="${data.link}" target="_blank" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" data-link="${data.link}">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-2x">
                                        <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Home/Earth.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="9"/>
                                                <path d="M11.7357634,20.9961946 C6.88740052,20.8563914 3,16.8821712 3,12 C3,11.9168367 3.00112797,11.8339369 3.00336944,11.751315 C3.66233009,11.8143341 4.85636818,11.9573854 4.91262842,12.4204038 C4.9904938,13.0609191 4.91262842,13.8615942 5.45804656,14.101772 C6.00346469,14.3419498 6.15931561,13.1409372 6.6267482,13.4612567 C7.09418079,13.7815761 8.34086797,14.0899175 8.34086797,14.6562185 C8.34086797,15.222396 8.10715168,16.1034596 8.34086797,16.2636193 C8.57458427,16.423779 9.5089688,17.54465 9.50920913,17.7048097 C9.50956962,17.8649694 9.83857487,18.6793513 9.74040201,18.9906563 C9.65905192,19.2487394 9.24857641,20.0501554 8.85059781,20.4145589 C9.75315358,20.7620621 10.7235846,20.9657742 11.7357634,20.9960544 L11.7357634,20.9961946 Z M8.28272988,3.80112099 C9.4158415,3.28656421 10.6744554,3 12,3 C15.5114513,3 18.5532143,5.01097452 20.0364482,7.94408274 C20.069657,8.72412177 20.0638332,9.39135321 20.2361262,9.6327358 C21.1131932,10.8600506 18.0995147,11.7043158 18.5573343,13.5605384 C18.7589671,14.3794892 16.5527814,14.1196773 16.0139722,14.886394 C15.4748026,15.6527403 14.1574598,15.137809 13.8520064,14.9904917 C13.546553,14.8431744 12.3766497,15.3341497 12.4789081,14.4995164 C12.5805657,13.664636 13.2922889,13.6156126 14.0555619,13.2719546 C14.8184743,12.928667 15.9189236,11.7871741 15.3781918,11.6380045 C12.8323064,10.9362407 11.963771,8.47852395 11.963771,8.47852395 C11.8110443,8.44901109 11.8493762,6.74109366 11.1883616,6.69207022 C10.5267462,6.64279981 10.170464,6.88841096 9.20435656,6.69207022 C8.23764828,6.49572949 8.44144409,5.85743687 8.2887174,4.48255778 C8.25453994,4.17415686 8.25619136,3.95717082 8.28272988,3.80112099 Z M20.9991771,11.8770357 C20.9997251,11.9179585 21,11.9589471 21,12 C21,16.9406923 17.0188468,20.9515364 12.0895088,20.9995641 C16.970233,20.9503326 20.9337111,16.888438 20.9991771,11.8770357 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                </a>
                                <a title="Editar Endereço" href="tables.html#" data-bs-toggle="modal" data-bs-target="#kt_modal_edit_card" class="btn btn-icon btn-bg-light btn-active-color-warning btn-sm me-1"
                                data-id="${data.id}" data-link="${data.link}" data-description="${data.description}">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a title="Excluir endereço" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-url"
                                data-id="${data.id}" data-description="${data.description}" data-link="${data.link}">
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
                            </div>`;
                }
            },

        ],
        lengthMenu: [10, 25, 50, 50, 50],
        iDisplayLength: 25,
        language:
        {
            url: "/assets/plugins/custom/datatables/pt-BR.json",
        },
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

    $(document).on('show.bs.modal', '#kt_modal_edit_card', function (event) {
        let button = $(event.relatedTarget);
        let modal = $(this);
        //console.log(button.data());

        modal.find('input[name="id"]').val(button.data().id);
        modal.find('input[name="link"]').val(button.data().link);
        modal.find('textarea[name="description"]').val(button.data().description);
    });

    $(document).on('click','.button_copy_link_code', function(event){
        let el = ($(this).parent().parent().find(".copy_input"));
        el.select();
        document.execCommand("copy", false);
    });
});
