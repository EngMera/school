@extends('layouts.master')
@section('css')
  
@section('title')
    {{ trans('grades.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('main_trans.Grades_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('main_trans.Grades') }}</a></li>
                <li class="breadcrumb-item active">{{ trans('main_trans.Grades_list') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">   
        <div class="col-xl-12 mb-30">   
            <div class="card card-statistics h-100"> 
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif  
                    <button type="button" class="button x-small mb-3" data-toggle="modal" data-target="#exampleModal">
                        {{ trans('grades.add_Grade') }}
                    </button>
                <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ trans('grades.Name') }}</th>
                            <th>{{ trans('grades.Notes') }}</th>
                            <th>{{ trans('grades.Progresses') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; ?>
                        @foreach ($grades as $grade)
                        <?php $i++ ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $grade->Name }}</td>
                                <td>{{ $grade->Notes}} </td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $grade->id }}" title="{{ trans('grades.Edit') }} ">
                                    <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $grade->id }}" title="{{ trans('grades.Delete') }} ">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            
                           <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $grade->id }}"  tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                {{ trans('grades.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ url('grades/'.$grade->id) }}" method="POST">
                                                @csrf
                                                {{ method_field('patch') }}
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                                            :</label>
                                                        <input id="Name" type="text" name="Name" class="form-control" value="{{ $grade->getTranslation('Name', 'ar') }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control" name="Name_en" value="{{ $grade->getTranslation('Name', 'en') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">{{ trans('grades.Notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                                        rows="3">{{ $grade->Notes }}</textarea>
                                                </div>
                                                <br><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                            <button type="submit" class="btn btn-success">{{ trans('grades.Edit') }}</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                           <!-- edit_modal_Grade -->

                           <!-- delete_modal_Grade -->
                           <div class="modal fade" id="delete{{ $grade->id }}"  tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                           {{ trans('grades.delete_Grade') }}
                                       </h5>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body">
                                       <!-- delete_form -->
                                       <form action="{{ url('grades/'.$grade->id.'/delete') }}" method="Get">
                                           {{ method_field('Delete') }}
                                           @csrf
                                           <div>
                                            {{ trans('grades.warning_Grade') }}
                                            <input id="Name" type="text" name="Name" class="form-control mt-2" disabled value="{{ $grade->Name }}">

                                           </div>
                                           
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                           data-dismiss="modal">{{ trans('grades.Close') }}</button>
                                       <button type="submit" class="btn btn-danger">{{ trans('grades.Delete') }}</button>
                                   </div>
                                   </form>

                               </div>
                           </div>
                       </div>
                      <!-- delete_modal_Grade -->
                        @endforeach
                        
                    </tbody>
                </table>
                </div>
                </div>
            </div>   
        </div>

        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('grades.add_Grade') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ url('grades')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Name" class="mr-sm-2">{{ trans('grades.stage_name_ar') }}
                                        :</label>
                                    <input id="Name" type="text" name="Name" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="Name_en" class="mr-sm-2">{{ trans('grades.stage_name_en') }}
                                        :</label>
                                    <input type="text" class="form-control" name="Name_en">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('grades.Notes') }}
                                    :</label>
                                <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('grades.Close') }}</button>
                        <button type="submit" class="btn btn-success">{{ trans('grades.submit') }}</button>
                    </div>
                    </form>

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
