<?php

use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formData = [
            'description'=>'description',
            'bg_color'=>'bg_color',
            'title'=>'title',
            'date'=>now(),
            'place'=>'place',
            'btn_name'=>'btn_name',
            'btn_color'=>'btn_color',
        ];

        $form = \App\Form::create($formData);

        $formFields = [
            [
                'field_id'=>1,
                'label_name'=>'text',
                'place_holder'=>'text',
                'min_value'=>0,
                'max_value'=>191,
                'is_required'=>true,
            ],[
                'field_id'=>5,
                'label_name'=>'textarea',
                'place_holder'=>'textarea',
                'min_value'=>1,
                'max_value'=>191,
                'is_required'=>true,
            ],
        ];
        foreach ($formFields as $filed)
            $form->fields()->create($filed);
    }
}
