<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('guests', function (Blueprint $table) {
			$table->increments('id');
			$table->string('student_number', 11, 0);
			$table->string('last_name');
			$table->string('first_name');
			$table->string('middle_initial')
				->nullable();
			$table->enum('college', [
				'law', 'dent', 'cas', 'cba',
				'eng', 'ccss', 'educ', 'cfad',
			]);
			$table->string('course');
			$table->string('year_level');
			$table->string('contact_number', 11, 0)
				->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('guests_tables');
	}
}
