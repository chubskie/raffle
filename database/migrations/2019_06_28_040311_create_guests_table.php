<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->double('student_number', 11, 0);
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial')    
            ->nullable();
            $table->enum('college', [
                'law', 'dent', 'cas', 'cba',
                'eng', 'ccss', 'educ', 'cfad',
            ]);
            $table->string('course');
            $table->integer('year_level');
            $table->double('contact_number', 11, 0)
            ->nullable();
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
        Schema::dropIfExists('guests_tables');
    }
}
