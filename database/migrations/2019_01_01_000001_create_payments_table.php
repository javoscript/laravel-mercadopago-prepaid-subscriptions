<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


/**
 * Class CreateExampleTable
 * @author Javier Ugarte <javougarte@gmail.com>
 */
class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('prepaid_subs_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->unsignedBigInteger('account_id');
            $table->foreign('account_id')->references('id')->on('prepaid_subs_accounts')->onDelete('cascade');

            $table->string('request_key')->nullable();
            $table->string('client')->nullable();
            $table->string('email')->nullable();
            $table->string('state')->default(Javoscript\PrepaidSubs\Models\Payment::MP_PENDING);
            $table->json('plan');

        });
    }

    public function down()
    {
        Schema::table('prepaid_subs_payments', function(Blueprint $table) {
            $table->dropForeign(['account_id']);
        });

        Schema::dropIfExists('prepaid_subs_payments');
    }
}
