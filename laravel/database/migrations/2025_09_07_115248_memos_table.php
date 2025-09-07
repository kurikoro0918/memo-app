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
        // Laravelの例
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content');
            $table->timestamps();
            // ユーザー機能がある場合
            // $table->foreignId('user_id')->constrained();
        });//
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
