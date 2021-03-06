<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkColorInItemImageTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('item_image', function (Blueprint $table) {
      $table->foreignId('color_id')->nullable()->after('item_id')->constrained('color')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('item_image', function (Blueprint $table) {
      $table->dropForeign('item_image_color_id_foreign');
      $table->dropColumn('color_id');
    });
  }
}
