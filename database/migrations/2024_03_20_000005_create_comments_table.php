<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iTicket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('iUser_id')->constrained('users')->cascadeOnDelete();
            $table->string('szContent', 2000)->notNull();
            $table->string('szAttachment_url', 255)->nullable();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}; 