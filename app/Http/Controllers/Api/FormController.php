<?php

namespace App\Http\Controllers\Api;

use App\Form;
use App\Http\Resources\FormResource;
use App\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Swagger\Annotations as SWG;

class FormController extends Controller
{

    /**
     *
     * @SWG\Get(
     *      tags={"forms"},
     *      path="/forms/{form}",
     *      summary="Get Single Form",
     *      security={
     *          {"jwt": {}}
     *      },
     *     @SWG\Parameter(
     *         name="form",
     *         in="path",
     *         required=true,
     *         type="integer",
     *         format="integer",
     *      ),
     *      @SWG\Response(response=200, description="object"),
     * )
     * @param Form $form
     * @return FormResource
     */
    public function getForm(Form $form)
    {
        return FormResource::make($form);
    }


    public function submit(Form $form,Request $request)
    {
        foreach ($data as $filed)
        {
            Result::create(['field_forms_id'=>$filed['id'],'value'=>$filed['value']]);
        }
        return response()->json(['message'=>'Send Successfully'],200);
    }
}
