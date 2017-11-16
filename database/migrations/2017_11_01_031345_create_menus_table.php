<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('parent_id')->unsigned()->default(0);
            $table->string('name')->default('');
            $table->string('power')->default('');
            $table->string('url')->default('');
            $table->string('icon')->default('')->nullable();
            $table->string('heightlight_url')->default('')->nullable();
            $table->tinyInteger('sort')->unsigned()->default(0);
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
        Schema::dropIfExists('menus');
    }
}
