<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->string('ref', 100)->nullable();
            $table->string('barcode', 100)->nullable();
            $table->decimal('price');
            $table->tinyInteger('stock')->unsigned();
            $table->boolean('outstanding')->default(false);
            $table->boolean('is_new')->default(false);
            $table->boolean('published')->default(false);
            $table->string('img', 100)->nullable();
            $table->string('landing_page', 100)->nullable();
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
        Schema::dropIfExists('item');
    }
}
