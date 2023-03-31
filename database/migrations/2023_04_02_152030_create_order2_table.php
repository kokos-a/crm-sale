<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder2Table extends Migration
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
            $table->foreignId('client_id')
                ->constrained('clients')
                ->cascadeOnUpdate();
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate();
            $table->foreignId('color_products_id')
                ->constrained('color_products')
                ->cascadeOnUpdate();
            $table->unsignedTinyInteger('type')->default(1);
            $table->foreignId('price')
                ->constrained('products')
                ->cascadeOnUpdate();
            $table->integer('count');
            $table->integer('count_all');
            $table->integer('price_all');
            $table->foreignId('creater_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate();
            $table->foreignId('updater_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate();
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
}
