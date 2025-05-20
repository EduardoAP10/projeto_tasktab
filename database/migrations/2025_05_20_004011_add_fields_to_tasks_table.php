<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->string('difficulty')->nullable();
            $table->integer('xp')->nullable();
            $table->string('reward')->nullable();
            $table->date('due_date')->nullable();
            $table->string('status')->default('Pendente');
        });
    }

    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['difficulty', 'xp', 'reward', 'due_date', 'status']);
        });
    }
};
