<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('preview')->nullable();
            $table->boolean('active')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
