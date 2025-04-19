<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('szName', 255)->notNull();
            $table->string('szDescription', 1000)->nullable();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });

        // Add foreign key to tickets table after categories table is created
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('iCategory_id')->references('id')->on('categories')->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['iCategory_id']);
        });
        Schema::dropIfExists('categories');
    }
}; 