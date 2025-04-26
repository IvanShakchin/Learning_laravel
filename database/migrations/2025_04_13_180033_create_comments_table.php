<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // внутри этой функции мы прописываем поля которые будут в табилце и т.д.
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            // настройка типа табл(не обязательно тут прописывать)
            $table->engine ='InnoDB'; 
            // настройка кодировки табл(не обязательно тут прописывать)
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();// сразу создает primery и autoincriment
            //добавляем свои поля
            // unsugned только положительные числа или 0
            $table->integer('post_id')->unsugned();
            // В default прописывае значение по умолчанию
            $table->string('name', 255)->default('Гость');            
            $table->string('text', 1000);
            //добавить два поля:1)дата созадния записи 2)дата обновления записи
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
