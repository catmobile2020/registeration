@extends('admin.layouts.master')

@section('title','Events')

@section('content')
    <div class="main-content">
        <!-- Breadcrumb -->
        <ol class="breadcrumb breadcrumb-2">
            <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
            <li class="active"><strong>Field Create</strong></li>
        </ol>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <ul class="panel-tool-options">
                            <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                            <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                            <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{isset($form->id) ? route('admin.forms.update',$form->id) : route('admin.forms.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($form->id)
                                @method('PUT')
                            @endisset
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Label Name</label>
                                    <input type="text" name="label_name" class="form-control" id="name" placeholder="Label Name" value="{{$form->label_name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address">*Required</label>
                                    <select class="form-control" name="active">
                                        <option value="1" {{$field_form->is_required ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$field_form->is_required ? '' : 'selected'}}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address">*Type</label>
                                    <select class="form-control" name="active">
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{$field_form->field_id ? 'selected' : ''}}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date">Placeholder</label>
                                    <input type="text" name="place_holder" class="form-control" placeholder="Placeholder" id="date" value="{{$form->place_holder}}">
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-4">
                                <a href="{{route('admin.forms.index')}}" class="btn btn-white">Cancel</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
