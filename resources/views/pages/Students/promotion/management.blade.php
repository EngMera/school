@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_students')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_students')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">

            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                        تراجع الكل
                    </button>
                    <br><br>


                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                               >
                            <thead>
                            <tr class="">
                                <th class="alert-info">#</th>
                                <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                <th class="alert-danger">المرحلة  السابقة</th>
                                <th class="alert-danger">السنة الدراسية</th>
                                <th class="alert-danger">الصف  السابق</th>
                                <th class="alert-danger">القسم  السابق</th>
                                <th class="alert-success">المرحلة  الحالي</th>
                                <th class="alert-success">السنة  الحالية</th>
                                <th class="alert-success">الصف  الحالي</th>
                                <th class="alert-success">القسم  الحالي</th>
                                <th class="alert-dark">{{trans('Students_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody  style="text-align:center">
                            @foreach($promotions as $promotion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$promotion->student->name}}</td>
                                    <td>{{$promotion->f_grade->Name}}</td>
                                    <td>{{$promotion->academic_year}}</td>
                                    <td>{{$promotion->f_classroom->Class_Name}}</td>
                                    <td>{{$promotion->f_section->Section_Name}}</td>
                                    <td>{{$promotion->t_grade->Name}}</td>
                                    <td>{{$promotion->academic_year_new}}</td>
                                    <td>{{$promotion->t_classroom->Class_Name}}</td>
                                    <td>{{$promotion->t_section->Section_Name}}</td>
                                    <td>

                                        <button type="button" class="btn btn-outline-danger btn-sm" title="ارجاع الطالب" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}"> 
                                            <i class="fa fa-undo" ></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-success btn-sm" title="تخرج الطالب" data-toggle="modal" data-target="#">
                                            <i class="fa fa-graduation-cap" ></i>
                                        </button>
                                    </td>
                                </tr>
                            @include('pages.Students.promotion.Delete_all')
                            @include('pages.Students.promotion.Delete_one')
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
@endsection
