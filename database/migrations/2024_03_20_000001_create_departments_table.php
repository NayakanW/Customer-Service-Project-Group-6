<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('szName', 255)->notNull();
            $table->string('szDescription', 1000)->nullable();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departments');
    }
}; 