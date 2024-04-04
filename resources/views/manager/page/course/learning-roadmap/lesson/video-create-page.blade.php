@extends('manager.layout.app')

@section('kt_app_toolbar')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('manager.dashboard.index') }}" class="text-muted text-hover-primary">Bảng điều
                            kiển</a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('manager.resource-management.list-page') }}"
                            class="text-muted text-hover-primary">Quản
                            lý tài
                            nguyên</a>
                    </li>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-dark">
                        <a class="text-dark">Tạo tài nguyên</a>
                    </li>

                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Toolbar container-->
    </div>
@endsection

@section('kt_app_content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div class="card card-custom gutter-b example example-compact card-validate-form card-sticky">
            <div class="card-header">
                <h3 class="card-title">
                    Tạo tài nguyên
                </h3>
                <div class="card-toolbar">
                    <button type="button" class="btn btn-danger btn-sm cancel-upload">Hủy tải lên</button>
                </div>
            </div>
            <!--begin::Form-->
            <form class="validate-form" id="validate-form"
                data-kt-redirect-url="{{ route('manager.course.learning-roadmap.index-page', ['course_id' => $lesson->chapter->course_id]) }}"
                method="POST"
                action="{{ route('manager.course.learning-roadmap.lesson.upload-video', ['lesson_id' => $lesson->id]) }}">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="mb-15">

                        <div class="progress mt-5">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>

                        <div class="form-group form-ajax-validate row mb-5">
                            <label class="col-lg-3 col-form-label required" for="avatar_path">Hình ảnh đại diện:</label>
                            <div class="col-lg-6">
                                <label class="btn btn-sm btn-success" for="avatar_path">Chọn hình ảnh</label>
                                <input type="file" name="avatar_path" id="avatar_path" hidden
                                    class="form-control ajax-input-css-display upload-image">
                            </div>
                            <span class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 ajax-msg-display-avatar_path form-text text-danger"></div>
                            </span>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 mt-5 image-display">
                                </div>
                            </div>
                        </div>


                        <div class="form-group form-ajax-validate row mb-3">
                            <label class="col-lg-3 col-form-label required" for="video_path">Video của bạn:</label>
                            <div class="col-lg-6">
                                <label for="video_path" class="btn btn-primary btn-sm">Chọn tệp để tải</label>
                            </div>

                            <div class="col-lg-12">
                                <input type="file" name="video_path" id="video_path" hidden
                                    class="form-control ajax-input-css-display upload-video">
                            </div>

                            <span class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 ajax-msg-display-video_path form-text text-danger"></div>
                            </span>

                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9 video-display">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="d-flex justify-content-center mb-5">
                        <button type="submit" form="validate-form" data-kt-indicator="off"
                            class="btn btn-success mr-2 hover-elevate-up mx-2">
                            <span class="indicator-label">Gửi</span>
                            <span class="indicator-progress">
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <a href="{{ route('manager.course.learning-roadmap.index-page', ['course_id' => $lesson->chapter->course_id]) }}"
                            class="back-url btn btn-secondary hover-elevate-up">
                            Quay lại
                        </a>
                    </div>
                </div>


            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/js/form-data-ajax.js') }}"></script>
    <script>
        $(document).ready(() => {
            var ajaxCall;

            $('.progress').hide()

            $('.upload-image').change((event) => {
                var tmppath = URL.createObjectURL(event.target.files[0]);

                for (let index = 0; index < event.target.files.length; index++) {
                    var tmppath = URL.createObjectURL(event.target.files[index])
                    let isPng = event.target.files[0].type === 'image/png';
                    let isJpeg = event.target.files[0].type === 'image/jpeg';

                    if (isPng || isJpeg) {
                        $('.image-display')
                            .html(`<img style="height:200px" src="${tmppath}">`)
                    }
                }
            });

            $('.upload-video').change((event) => {
                var tmppath = URL.createObjectURL(event.target.files[0]);

                for (let index = 0; index < event.target.files.length; index++) {
                    var tmppath = URL.createObjectURL(event.target.files[index])
                    let isMp4 = event.target.files[index].type === 'video/mp4';

                    if (isMp4) {
                        $('.video-display')
                            .html(
                                `<div class="col-lg-4 mt-3 position-relative p-0">` +
                                `<video class="w-100" style="height:200px" src="${tmppath}" controls></video>` +
                                `<div>`
                            )
                    }
                }
            });

            $('.validate-form').submit((event) => {
                event.preventDefault();

                $('.cancel-upload').click(() => {
                    ajaxCall.abort();
                })

                $('button[form="validate-form"]')
                    .attr('data-kt-indicator', 'on')
                    .attr('disabled', 'disabled');

                let formData = new FormData(event.target);

                ajaxCall = $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);

                                $('.progress').show();

                                $('.progress')
                                    .find('.progress-bar')
                                    .css({
                                        'width': percentComplete + '%',
                                    }).text(percentComplete + '%')
                                    .attr('aria-valuenow', percentComplete + '%');

                            }
                        }, false);

                        return xhr;
                    },
                    type: "POST",
                    url: $(event.target).attr('action'),
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    cache: false,
                    processData: false,
                    contentType: false,
                }).done((res) => {

                    Swal.fire({
                        text: "Bạn đã thêm thành công",
                        icon: "success",
                        buttonsStyling: false,
                        showCancelButton: true,
                        confirmButtonText: "Về trang danh sách",
                        cancelButtonText: 'Đóng',
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: 'btn btn-secondary'
                        }
                    }).then((result) => {

                        if (result.isConfirmed) {
                            window.location.href = $(event.target).data('kt-redirect-url')
                        } else {
                            $('button[form="validate-form"]')
                                .attr('data-kt-indicator', 'off')
                                .attr('disabled', false)
                            deleteMessage(event.target)
                        }
                    });

                }).fail((res) => {

                    $('button[form="validate-form"]')
                        .attr('data-kt-indicator', 'off')
                        .attr('disabled', false)

                    if (res.status == 0) {
                        Swal.fire({
                            title: res.statusText,
                            text: 'Đã hủy',
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: 'Đóng',
                            customClass: {
                                confirmButton: 'btn btn-secondary'
                            }
                        })

                        return false
                    }

                    if (res.status == 422) {
                        Swal.fire({
                            title: 'Nhập sai',
                            text: res.responseJSON.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: 'Đóng',
                            customClass: {
                                confirmButton: 'btn btn-secondary'
                            }
                        })

                        failForm(res, event.target)
                        return false
                    }

                    Swal.fire({
                        title: res.statusText,
                        text: res.responseJSON.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: 'Đóng',
                        customClass: {
                            confirmButton: 'btn btn-secondary'
                        }
                    })

                    return false

                }).always(function() {
                    $('.progress').hide()
                    $('.progress')
                        .find('.progress-bar')
                        .css({
                            'width': '0%',
                        })
                        .text('0%')
                        .attr('aria-valuenow', '0%')
                });
            })

        })
    </script>
@endpush
