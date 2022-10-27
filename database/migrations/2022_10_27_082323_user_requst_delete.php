<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserRequstDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_delete_request_address', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('address_id');
            $table->integer('is_confirmed')
                ->default(0)
                ->comment("
                    1:confirmed, 2:reject
                ");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
