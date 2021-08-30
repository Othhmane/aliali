<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->string('tracking');
            $table->string('order_id');
            $table->string('first_name');
            $table->string('family_name');
            $table->string('contact_phone');
            $table->string('adress');
            $table->string('to_wilaya_name');
            $table->string('to_commune_name');
            $table->string('product_list');
            $table->integer('price');
            $table->integer('delivery_fee');
            $table->string('last_status');
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
        Schema::dropIfExists('livraisons');
    }
}
