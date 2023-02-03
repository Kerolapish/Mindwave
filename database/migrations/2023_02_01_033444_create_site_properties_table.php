<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_properties', function (Blueprint $table) {
            $table->id();
            $table->boolean('downStatus')->default(true);
            $table->boolean('hasSetup')->default(false);
            $table->boolean('setupBrand')->default(false);
            $table->boolean('setupBackground')->default(false);
            $table->boolean('setupTitle')->default(false);
            $table->boolean('setupInfo')->default(false);
            $table->boolean('setupService')->default(false);
            $table->boolean('setupTeam')->default(false);
            $table->boolean('setupFooter')->default(false);
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
        Schema::dropIfExists('site_properties');
    }
};
