@extends('admin.layouts.master')

@section('title','Form Fields')

@section('content')
    <div class="main-content">
        <h1 class="page-title">Form Fields</h1>
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>Form Fields</strong></li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">

                    <div class="panel-heading clearfix">
                        <a class="btn btn-primary pull-left" href="{{route('admin.forms.fields-create', $form->id)}}">Add new field</a>

                        <ul class="panel-tool-options">
                            <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                            <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                            <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        @if (session()->has('message'))
                            <div class="alert alert-info">
                               <h4>{{session()->get('message')}}</h4>
                            </div>
                        @endif
                            <div class="alert alert-success text-center sr-only" id="statusResult">

                            </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Label</th>
                                    <th>Placeholder</th>
                                    <th>Type</th>
                                    <th>Min value</th>
                                    <th>Max value</th>
                                    <th>Required</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $row)
                                    <tr class="gradeX">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$row->label_name}}</td>
                                        <td>{{$row->place_holder}}</td>
                                        <td>{{$row->field->name}}</td>
                                        <td>{{$row->min_value ? $row->min_value : '0'}}</td>
                                        <td>{{$row->max_value ? $row->max_value : '191'}}</td>
                                        <td>{{$row->is_required ? 'Yes' : 'No'}}</td>



                                        <td class="size-80">
                                            <div class="dropdown">
                                                <a href="" data-toggle="dropdown" class="more-link"><i class="icon-dot-3 ellipsis-icon"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="{{route('admin.fieldForms.edit',$row->id)}}">Edit</a></li>
                                                    @if (auth()->user()->type == 0)
                                                        <li><a href="{{route('admin.fieldForms.destroy',$row->id)}}">Delete</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                {!! $rows->links() !!}
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Label</th>
                                    <th>Placeholder</th>
                                    <th>Type</th>
                                    <th>Min value</th>
                                    <th>Max value</th>
                                    <th>Required</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
