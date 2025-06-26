<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('directivos', function (Blueprint $table) {
           $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('nacionality');
            $table->integer('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('institution');
            $table->string('position');
            $table->string('country');
            $table->integer('letter');
            $table->integer('modality');
            $table->integer('logistics');
            $table->text('food')->nullable();
            $table->integer('invoice');
            $table->string('billing-name')->nullable();
            $table->string('rfc')->nullable();
            $table->string('billing-address')->nullable();
            $table->string('billing-email')->nullable();
            $table->integer('consent');
            $table->integer('record');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directivos');
    }
};
