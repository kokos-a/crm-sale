<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('organisation', 128);
            $table->string('firstname', 512)->nullable();
            $table->string('lastname', 128)->nullable();
            $table->string('title', 512)->nullable();
            $table->unsignedTinyInteger('type')->default(0);
            $table->string('address', 255);
            $table->string('email', 255)->nullable();
            $table->string('tel', 12)->nullable();
            $table->string('comment', 255)->nullable();
            $table->foreignId('creater_id')
            ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('updater_id')
            ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('clients');
    }
}
