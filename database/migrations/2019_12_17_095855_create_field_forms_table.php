<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('form_id')->index();
            $table->unsignedBigInteger('field_id');
            $table->text('label_name');
            $table->text('place_holder')->nullable();
            $table->text('value')->nullable();
            $table->text('min_value')->nullable();
            $table->text('max_value')->nullable();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_forms');
    }
}
