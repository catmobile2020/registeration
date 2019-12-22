<?php

use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = [
            [
                'name'=>'text',
                'type'=>1,
            ],[
                'name'=>'select',
                'type'=>2,
            ],[
                'name'=>'checkbox',
                'type'=>3,
            ],[
                'name'=>'radiobutton',
                'type'=>4,
            ],[
                'name'=>'textarea',
                'type'=>5,
            ],[
                'name'=>'image',
                'type'=>6,
            ],[
                'name'=>'signature',
                'type'=>7,
            ],
        ];

        foreach ($dataArray as $data)
            \App\Field::create($data);
    }
}
