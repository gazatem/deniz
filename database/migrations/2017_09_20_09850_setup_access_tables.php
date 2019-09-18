<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class SetupAccessTables.
 */
class SetupAccessTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('display_name');
            $table->boolean('all')->default(false);
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamps();

            /*
             * Add Foreign/Unique/Index
             */
            $table->unique('name');
        });

        Schema::create('role_user', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::create('permissions', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('display_name');
            $table->smallInteger('sort')->default(0)->unsigned();
            $table->timestamps();

            /*
             * Add Foreign/Unique/Index
             */
            $table->unique('name');
        });

        Schema::create('permission_role', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Remove Foreign/Unique/Index
         */
        Schema::table('roles', function (Blueprint $table) {
            $table->dropUnique('roles'.'_name_unique');
        });

        Schema::table('role_user', function (Blueprint $table) {
            $table->dropForeign('role_user'.'_user_id_foreign');
            $table->dropForeign('role_user'.'_role_id_foreign');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropUnique('permissions'.'_name_unique');
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropForeign('permission_role'.'_permission_id_foreign');
            $table->dropForeign('permission_role'.'_role_id_foreign');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
}
