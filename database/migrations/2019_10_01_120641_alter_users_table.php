<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function($table) {
        $table->string("first_name");
        $table->string("last_name");
        $table->string("login_name");
        $table->integer("gender");
        $table->string("city");
        $table->string("address");
        $table->integer("shop_id");
        $table->integer("user_type");
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function($table) {
          $table->dropColumn('first_name');
          $table->dropColumn('last_name');
          $table->dropColumn('login_name');
          $table->dropColumn('gender');
          $table->dropColumn('city');
          $table->dropColumn('address');
          $table->dropColumn('shop_id');
          $table->dropColumn('user_type');
      });
    }
}
