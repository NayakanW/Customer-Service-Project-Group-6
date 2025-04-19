<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('szName', 255)->notNull()->unique();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });

        Schema::create('ticket_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iTicket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('iTag_id')->constrained('tags')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_tags');
        Schema::dropIfExists('tags');
    }
}; 