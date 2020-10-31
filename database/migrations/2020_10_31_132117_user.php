<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class User extends Migration
{
    var $table = 'tbl_user';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id_user');
            $table->char('name_user', 50);
            $table->char('password_user', 100);
            $table->char('email_user', 50);
            $table->text('image_user')->nullable();
            $table->integer('status_user')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
