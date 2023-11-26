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
        Schema::create('voting_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vote_id')->constrained();
            $table->foreignId('candidate_id')->constrained();
            $table->foreignId('identity_card_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voting_data');
    }
};
