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
                        <form action="{{isset($field_form->id) ? route('admin.fieldForms.update',$field_form->id) : route('admin.fieldForms.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($field_form->id)
                                @method('PUT')
                                @php $form = $field_form->form; @endphp
                            @endisset

                            <div class="col-lg-6">
                                <input type="hidden" name="form_id" value="{{ $form->id }}">
                                <div class="form-group">
                                    <label for="name">Label Name</label>
                                    <input type="text" name="label_name" class="form-control" id="name" placeholder="Label Name" value="{{$field_form->label_name}}">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address">*Required</label>
                                    <select class="form-control" name="is_required">
                                        <option value="1" {{$field_form->is_required ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$field_form->is_required ? '' : 'selected'}}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="address">*Type</label>
                                    <select id="type" class="form-control" name="field_id">
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}" @if($field_form->field_id == $type->id) selected @endif}}>
                                            {{ $type->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="placeholder" class="col-lg-6">
                                <div class="form-group">
                                    <label for="date">Placeholder</label>
                                    <input type="text" name="place_holder" class="form-control" placeholder="Placeholder" id="place_holder" value="{{$field_form->place_holder}}">
                                </div>
                            </div>
                            <div id="options" class="col-lg-6">
                                <div class="form-group">
                                    <label for="options">Options</label>
                                    <input type="text" name="options" class="form-control" placeholder="options: [value1, value2, ...]" value="{{$field_form->options}}">
                                </div>
                            </div>
                            <div id="minvalue" class="col-lg-6">
                                <div class="form-group">
                                    <label for="min_value">Min Value</label>
                                    <input type="number" name="min_value" class="form-control" placeholder="Min Value" value="{{$field_form->min_value}}">
                                </div>
                            </div>
                            <div id="maxvalue" class="col-lg-6">
                                <div class="form-group">
                                    <label for="max_value">Max Value</label>
                                    <input type="number" name="max_value" class="form-control" placeholder="Max Value" value="{{$field_form->max_value}}">
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

@section('js')
<script>
    $(function() {
        $('#options').hide();
        $('#placeholder').show();
        $('#minvalue').show();
        $('#maxvalue').show();
        $('#type').change(function(){
            if($('#type').val() == 2) {
                $('#options').show();
                $('#placeholder').hide();
                $('#minvalue').hide();
                $('#maxvalue').hide();
            } else if($('#type').val() == 1 || $('#type').val() == 5){
                $('#placeholder').show();
                $('#minvalue').show();
                $('#maxvalue').show();
                $('#options').hide();
            }else{
                $('#placeholder').hide();
                $('#minvalue').hide();
                $('#maxvalue').hide();
                $('#options').hide();
            }


        });
    });
</script>
@endsection
