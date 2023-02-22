
@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        قائمة الاختبارات
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        قائمة الاختبارات
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>المادة الدراسية</th>
                                <th>اسم الاختبار</th>
                                <th>دخول / درجة الاختبار</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($quizzes as $quizze)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$quizze->subject->name}}</td>
                                    <td>{{$quizze->name}}</td>
                                    <td>
                                        @if($quizze->degree->count() > 0 && $quizze->id == $quizze->degree[0]->quizz_id)
                                            {{$quizze->degree[0]->score}}
                                        @else
                                            <a href="{{url('Student/dashboard/exams/show/'.$quizze->id)}}"
                                                class="btn btn-outline-success btn-sm" role="button"
                                                aria-pressed="true" onclick="alertAbuse()">
                                                <i class="fa fa-pencil-square-o" ></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
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
            function alertAbuse() {
                alert("برجاء عدم إعادة تحميل الصفحة بعد دخول الاختبار - في حال تم تنفيذ ذلك سيتم الغاء الاختبار بشكل اوتوماتيك ");
            }
        </script>

@endsection
