@extends('errors.layout')

@section('error-main')
    <!--begin::Page bg image-->
    <style>
        body {
            background-image: url({{ asset('assets/media/auth/bg1.jpg') }});
        }

        [data-bs-theme="dark"] body {
            background-image: url({{ asset('assets/media/auth/bg1-dark.jpg') }});
        }
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Signup Welcome Message -->
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
            <!--begin::Wrapper-->
            <div class="card card-flush w-lg-650px py-5">
                <div class="card-body py-15 py-lg-20">
                    <!--begin::Title-->
                    <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Ôí!</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="fw-semibold fs-6 text-gray-500 mb-7">Chúng tôi không tìm thấy trang.</div>
                    <!--end::Text-->
                    <!--begin::Illustration-->
                    <div class="mb-3">
                        <img src="{{ asset('assets/media/auth/404-error.png') }}" class="mw-100 mh-300px theme-light-show"
                            alt="" />
                        <img src="{{ asset('assets/media/auth/404-error-dark.png') }}"
                            class="mw-100 mh-300px theme-dark-show" alt="" />
                    </div>
                    <!--end::Illustration-->
                    <!--begin::Link-->
                    <div class="mb-0">
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Trở lại</a>
                    </div>
                    <!--end::Link-->
                </div>
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Signup Welcome Message-->
@endsection
