<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\FieldForm;
use App\Form;
use App\Helpers\UploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use UploadImage;

    public function index(Request $request)
    {
        $user= auth('web')->user();
        if ($user->type == 0)
        {
            if ($request->ajax())
            {
                $event=Form::findOrfail($request->id);
                return 'Change Successfully To '.$event->title;
            }
            $rows = Form::latest()->paginate(20);
        }else
        {
            $rows = Form::latest()->paginate(20);
        }
        return view('admin.pages.event.index',compact('rows'));
    }


    public function create()
    {
        $form = new Form;
        $user= auth('web')->user();
        return view('admin.pages.event.form',compact('form'));
    }


    public function store(EventRequest $request)
    {
        $inputs = $request->all();
        $user= auth('web')->user();
        $event = Form::create($inputs);
        $this->upload($request->logo,$event,'logo');
        return redirect()->route('admin.forms.index')->with('message','Done Successfully');
    }


    public function fieldsIndex(Form $form)
    {
        $rows = $form->fields()->latest()->paginate(20);
        return view('admin.pages.event.fields',compact('rows', 'form'));
    }
    public function fieldsCreate (Form $form)
    {
        $form = new Form;
        $field_form = new FieldForm;
        $types = Field::all();
        $user= auth('web')->user();
        return view('admin.pages.event.fields-create',compact('form', 'field_form', 'types'));
    }


    public function edit(Form $form)
    {
        $user= auth('web')->user();
        return view('admin.pages.event.form',compact('form'));
    }


    public function update(EventRequest $request, Form $form)
    {
        $inputs = $request->all();
        $form->update($inputs);
        if ($request->logo)
            $this->upload($request->logo,$form,'logo',true);

        return redirect()->route('admin.forms.index')->with('message','Done Successfully');
    }


    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('admin.events.index')->with('message','Done Successfully');
    }


}
