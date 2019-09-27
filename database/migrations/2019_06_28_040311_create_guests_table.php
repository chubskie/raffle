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
            $table->int('student_number');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial')
            ->nullable();
            $table->enum('college', [
                'law', 'dent', 'cas', 'cba',
                'eng', 'ccss', 'educ', 'cfad',
            ]);
            $table->string('course');
            $table->enum('year_level', [
                '1', '2', '3', '4',
                '5',
            ]);
            $table->int('contact_number');
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
