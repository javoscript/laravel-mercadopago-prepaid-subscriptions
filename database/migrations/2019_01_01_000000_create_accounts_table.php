<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('prepaid_subs_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('model_id');
            $table->date('expiration_date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prepaid_subs_accounts');
    }
}
