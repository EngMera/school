@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('classroom.Classroom') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('classroom.Classroom_list') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans('classroom.Classroom')}}</a></li>
                <li class="breadcrumb-item active">{{ trans('classroom.Classroom_list') }}</li>
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
                    <div class="row">
                        <div class="col">
                            <button type="button" class="button x-small mb-3" data-toggle="modal" data-target="#exampleModal">
                                {{ trans('classroom.add_class') }}
                            </button>
                            <button type="button" class="button x-small" id="btn_delete_all">
                                {{ trans('classroom.delete_checkbox') }}
                            </button>
                        </div>
                        <div class="col">
                            <form action="{{ url('classrooms/filter') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    
                                    <select class="form-control form-control-lg"  name="Grade_id" required
                                            onchange="this.form.submit()">
                                        <option value="" selected disabled>{{ trans('classroom.Search_By_Grade') }}</option>
                                        @foreach ($Grades as $Grade)
                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
        
                            </form>
                        </div>
                        
    

                    </div>


                <div class="table-responsive">
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                            <th>#</th>
                            <th>{{ trans('classroom.Name_class') }}</th>
                            <th>{{ trans('classroom.Name_Grade') }}</th>
                            <th>{{ trans('classroom.Processes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @if (isset($details))

                            <?php $List_Classes = $details; ?>
                        @else
                            <?php $List_Classes = $classrooms; ?>
                        @endif
                        

                        @foreach ($List_Classes as $classroom)
                            <tr>
                                <?php $i++; ?>
                                <td><input type="checkbox"  value="{{ $classroom->id }}" class="box1" ></td>
                                <td>{{ $i }}</td>
                                <td>{{ $classroom->Class_Name }}</td>
                                <td>{{ $classroom->Grades->Name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $classroom->id }}"
                                        title="{{ trans('classroom.Edit') }}"><i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $classroom->id }}"
                                        title="{{ trans('classroom.Delete') }}"><i
                                            class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                               id="exampleModalLabel">
                                               {{ trans('classroom.edit_class') }}
                                           </h5>
                                           <button type="button" class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                           </button>
                                       </div>
                                       <div class="modal-body">
                                           <!-- edit_form -->
                                           <form action="{{ url('classrooms/'.$classroom->id.'/update') }}" method="post">
                                               {{ method_field('patch') }}
                                               @csrf
                                               <div class="row">
                                                   <div class="col">
                                                       <label for="Name"
                                                              class="mr-sm-2">{{ trans('classroom.Name_class') }}
                                                           :</label>
                                                       <input id="Name" type="text" name="Name"
                                                              class="form-control"
                                                              value="{{ $classroom->getTranslation('Class_Name', 'ar') }}"
                                                              required>
                                                   </div>
                                                   <div class="col">
                                                       <label for="Name_en"
                                                              class="mr-sm-2">{{ trans('classroom.Name_class_en') }}
                                                           :</label>
                                                       <input type="text" class="form-control"
                                                              value="{{ $classroom->getTranslation('Class_Name', 'en') }}"
                                                              name="Name_en" required>
                                                   </div>
                                               </div><br>
                                               <div class="form-group">
                                                   <label
                                                       for="exampleFormControlTextarea1">{{ trans('classroom.Name_Grade') }}
                                                       :</label>
                                                   <select class="form-control form-control-lg"
                                                           id="exampleFormControlSelect1" name="Grade_id">
                                                       <option value="{{ $classroom->Grades->id }}">
                                                           {{ $classroom->Grades->Name }}
                                                       </option>
                                                       @foreach ($Grades as $Grade)
                                                           <option value="{{ $Grade->id }}">
                                                               {{ $Grade->Name }}
                                                           </option>
                                                       @endforeach
                                                   </select>

                                               </div>
                                               <br><br>

                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary"
                                                           data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                                                   <button type="submit"
                                                           class="btn btn-success">{{ trans('classroom.submit') }}</button>
                                               </div>
                                           </form>

                                       </div>
                                   </div>
                               </div>
                           </div>

                           <!-- delete_modal_Grade -->
                           <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                          id="exampleModalLabel">
                                          {{ trans('classroom.delete_class') }}
                                      </h5>
                                      <button type="button" class="close" data-dismiss="modal"
                                              aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <!-- delete_form -->
                                      <form action="{{ url('classrooms/'.$classroom->id.'/delete') }}" method="Get">
                                          {{ method_field('Delete') }}
                                          @csrf
                                          <div class="container">
                                              {{ trans('classroom.Warning_class') }}

                                                  <input id="Name" type="text" name="Name"
                                                         class="form-control mt-2"
                                                         value="{{ $classroom->getTranslation('Class_Name', 'ar') }}"
                                                         required disabled>
                                          </div><br>

                                          </div>
                                          <br><br>

                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary"
                                                      data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                                              <button type="submit"
                                                      class="btn btn-danger">{{ trans('classroom.Delete') }}</button>
                                          </div>
                                      </form>

                                  </div>
                              </div>
                          </div>
                      </div>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('classroom.add_class') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class=" row mb-30" action="{{ url('classrooms') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="repeater">
                                    <div data-repeater-list="List_Classes">
                                        <div data-repeater-item>
                                            <div class="row">

                                                <div class="col">
                                                    <label for="Name"
                                                        class="mr-sm-2">{{ trans('classroom.Name_class') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="Name" />
                                                </div>


                                                <div class="col">
                                                    <label for="Name"
                                                        class="mr-sm-2">{{ trans('classroom.Name_class_en') }}
                                                        :</label>
                                                    <input class="form-control" type="text" name="Name_class_en" />
                                                </div>


                                                <div class="col">
                                                    <label for="Name_en"
                                                        class="mr-sm-2">{{ trans('classroom.Name_Grade') }}
                                                        :</label>

                                                    <div class="box">
                                                        <select class="fancyselect" name="Grade_id">
                                                            @foreach ($Grades as $Grade)
                                                                <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                </div>

                                                <div class="col">
                                                    <label for="Name_en"
                                                        class="mr-sm-2">{{ trans('classroom.Processes') }}
                                                        :</label>
                                                    <input class="btn btn-danger btn-block" data-repeater-delete
                                                        type="button" value="{{ trans('classroom.delete_row') }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-20">
                                        <div class="col-12">
                                            <input class="button" data-repeater-create type="button" value="{{ trans('classroom.add_row') }}"/>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                                        <button type="submit"
                                            class="btn btn-success">{{ trans('classroom.submit') }}</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>

        <!-- حذف مجموعة صفوف -->
        <div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            {{ trans('classroom.delete_class') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="classrooms/deleteAll" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            {{ trans('classroom.Warning_class') }}
                            <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                            <button type="submit" class="btn btn-danger">{{ trans('classroom.Delete') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

</div> 
<!-- row closed -->
@endsection
@section('js')
    <script >


        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = new Array();
                $("#datatable input[type=checkbox]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_all').modal('show')
                    $('input[id="delete_all_id"]').val(selected);
                }
            });
        });

    </script>
@endsection
