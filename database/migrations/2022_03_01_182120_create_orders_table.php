<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->index();

            $table->bigInteger( 'public_id' )->index(); // Keeping it simple but the displayed order id shouldn't be the db id

            $table->timestamp( 'updated' )->nullable();

            // probably a foreignId of statuses
            $table->string( 'status' );

            // this would be a foreignId but keeping it simple for this test
            $table->text('customer_avatar');
            $table->text('customer_name');

            $table->text( 'items' )->nullable(); // array of items
            $table->string( 'currency' )->default('usd'); // not necessary unless I use a vue currency filter
            $table->integer( 'revenue' )->default(0);

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
        Schema::dropIfExists('orders');
    }
};
