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
        Schema::create('abonnement', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('nbr_article');
            $table->integer('nbr_days');
            $table->string('price');
            $table->enum('type_media', ['image', 'video']);   
            $table->integer('nbr_scan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abonnement');
    }
};
