<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('szName', 255)->notNull();
            $table->string('szEmail', 255)->notNull()->unique();
            $table->string('szPassword_hash', 255)->notNull();
            $table->enum('enmRole', ['admin', 'agent', 'user'])->notNull();
            $table->foreignId('iDepartment_id')->nullable()->constrained('departments')->nullOnDelete();
            $table->enum('enmStatus', ['active', 'inactive'])->notNull()->default('active');
            $table->dateTime('dtmLast_login_at')->nullable();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}; 