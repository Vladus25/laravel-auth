<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('cars', function (Blueprint $table) {
        $table -> foreign('brand_id', 'carbrand')
               -> references('id')
               -> on('brands');
      });
      Schema::table('car_pilot', function (Blueprint $table) {
        $table -> foreign('car_id', 'carpilot')
               -> references('id')
               -> on('cars');
        $table -> foreign('pilot_id', 'pilotcar')
               -> references('id')
               -> on('pilots');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('cars', function (Blueprint $table) {
        $table -> dropForeign('carbrand');
      });
      Schema::table('car_pilot', function (Blueprint $table) {
        $table -> dropForeign('carpilot');
        $table -> dropForeign('pilotcar');
      });
    }
}
