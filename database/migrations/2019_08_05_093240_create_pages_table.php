<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('summary')->nullable();     
            $table->text('content')->nullable();            
            $table->string('template')->nullable();
            $table->string('slug')->indexed()->unique();
            $table->tinyInteger('is_menu_item')->default(1);            
            $table->tinyInteger('status')->default(1);                         
            $table->integer('sort_order')->default(0)->nullable();    
            $table->integer('template_id')->default(0)->nullable();                
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
        Schema::dropIfExists('pages');
    }
}
