<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveValueToYearLevelEnum.php extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('year_level', function (Blueprint $table) {
            DB::statement("ALTER TABLE guests MODIFY college enum('1', '2', '3', '4', '5')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('year_level', function (Blueprint $table) {
            DB::statement("ALTER TABLE guests MODIFY college enum('1', '2', '3', '4', '5', 'undefined')");
        });
    }
}
