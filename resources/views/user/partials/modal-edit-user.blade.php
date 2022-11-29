<div class="modal fade" id="kt_modal_edit_card" tabindex="-1" aria-modal="true" role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_update_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    autocomplete="off">
                    <input type="hidden" name="id">
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Editar Usuário</h1>
                        <!--end::Title-->
                    </div>
                    <!--begin::Input group-->
                    <div
                        class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <div class="col-lg-12 text-center">
                            <!--begin::Image input-->
                            <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
                                style="background-image: url('../assets/media/svg/avatars/blank.svg')">
                                <!--begin::Preview existing avatar-->
                                <div class="image-input-wrapper w-125px h-125px" style="background-image: none;"></div>
                                <!--end::Preview existing avatar-->
                                <!--begin::Label-->
                                <label
                                    class="btn btn-icon btn-circle btn-active-color-success w-25px h-25px bg-body-success shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                    aria-label="Inserir avatar" data-kt-initialized="1" title="Inserir avatar">
                                    {{-- <i class="bi bi-pencil-fill fs-7"></i> --}}
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--begin::Inputs-->
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove" value="1">
                                    <!--end::Inputs-->
                                </label>
                                <!--end::Label-->
                                <!--begin::Cancel-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-danger w-25px h-25px bg-body-danger shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                    aria-label="Cancelar avatar" data-kt-initialized="1" title="Cancelar avatar">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                          <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                        </svg>
                                      </span>
                                </span>
                                <!--end::Cancel-->
                                <!--begin::Remove-->
                                <span
                                    class="btn btn-icon btn-circle btn-active-color-danger w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                    aria-label="Remover avatar" data-kt-initialized="1" title="Remover avatar">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                        </svg>
                                    </span>
                                </span>
                                <!--end::Remove-->
                            </div>
                            <!--end::Image input-->
                            <!--begin::Hint-->
                            <div class="form-text text-danger">Tipos de arquivo permitidos: <b>png, jpg, jpeg</b>.</div>
                            <!--end::Hint-->
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div
                        class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nome</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Nome"
                            name="name">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div
                        class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">E-mail</span>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="E-mail"
                            name="email">
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    {{-- <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Senha
                                        Atual</label>
                                    <input type="password" class="form-control form-control-solid"
                                        name="currentpassword" id="currentpassword" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Nova Senha</label>
                                    <input type="password" class="form-control form-control-solid" name="newpassword"
                                        id="newpassword" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirme a
                                        Senha</label>
                                    <input type="password" class="form-control form-control-solid"
                                        name="confirmpassword" id="confirmpassword" />
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" id="kt_modal_new_update_cancel"
                            class="btn btn-light me-3">Cancelar</button>
                        <button type="submit" id="kt_modal_new_update_submit" class="btn btn-primary">
                            <span class="indicator-label">Enviar</span>
                            <span class="indicator-progress">Aguarde... <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
