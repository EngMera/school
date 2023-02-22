@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        الملف الشخصي
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        الملف الشخصي
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <section >
                    <div class="row">
                        <div class="col-lg-4">
                            <div class=" mb-4">
                                <div class="card-body text-center">
                                    <img src="{{URL::asset('assets/images/teacher.png')}}"
                                        alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 style="font-family: Cairo" class="my-3">{{$information->name}}</h5>
                                    <p class="text-muted mb-1">{{$information->email}}</p>
                                    <p class="text-muted mb-4">معلم</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class=" mb-4">
                                <div class="card-body">
                                    <form action="{{url('Teacher/dashboard/profile/'.$information->id)}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">اسم المستخدم باللغة العربية</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <input type="text" name="Name_ar"
                                                        value="{{ $information->getTranslation('name', 'ar') }}"
                                                        class="form-control">
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">اسم المستخدم باللغة الانجليزية</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <input type="text" name="Name_en"
                                                        value="{{ $information->getTranslation('name', 'en') }}"
                                                        class="form-control">
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">كلمة المرور</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">
                                                    <input type="password" id="password" class="form-control" name="password">
                                                </p><br><br>
                                                <input type="checkbox" class="form-check-input" onclick="myFunction()"
                                                    id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">اظهار كلمة المرور</label>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="btn btn-success">تعديل البيانات</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
