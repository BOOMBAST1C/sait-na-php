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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        // Связь Один-ко-многим с roles. restrict запрещает удалять роль, если она есть у пользователя
        $table->foreignId('role_id')->constrained('roles')->onDelete('restrict'); 
        $table->string('login')->unique(); // Уникальный логин (требование лабы)
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
