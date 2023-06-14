<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name', 128)->nullable();
            $table->string('last_name', 128)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('brithday')->nullable();
            $table->string('born')->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('education', 128)->nullable();
            $table->string('job', 128)->nullable();
            $table->string('hoby')->nullable();
            $table->text('note')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
