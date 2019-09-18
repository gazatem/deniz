<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('group_id')->nullable()->unsigned();
            $table->foreign('group_id')->references('id')->onDelete('cascade')->on('setting_groups');
            $table->string('setting_label')->nullable();
            $table->string('setting_name')->unique();
            $table->text('setting_value')->nullable();
            $table->string('setting_type')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('settings');
    }
}
