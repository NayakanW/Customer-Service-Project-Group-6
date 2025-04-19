<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Notifications table
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iUser_id')->constrained('users')->cascadeOnDelete();
            $table->string('szTitle', 255)->notNull();
            $table->string('szBody', 200)->notNull();
            $table->boolean('bIsRead')->notNull()->default(false);
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
        });

        // Activity logs table
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iUser_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('iTicket_id')->nullable()->constrained('tickets')->cascadeOnDelete();
            $table->string('szAction', 255)->notNull();
            $table->string('szDescription', 1000)->nullable();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
        });

        // Ticket histories table
        Schema::create('ticket_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iTicket_id')->constrained('tickets')->cascadeOnDelete();
            $table->string('szField_changed', 255)->notNull();
            $table->string('szOld_value', 1000)->nullable();
            $table->string('szNew_value', 1000)->nullable();
            $table->foreignId('iChanged_by')->constrained('users')->cascadeOnDelete();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
        });

        // Attachments table
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iTicket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('iUser_id')->constrained('users')->cascadeOnDelete();
            $table->string('szFile_path', 255)->notNull();
            $table->string('szFile_name', 255)->notNull();
            $table->integer('iFile_size')->notNull();
            $table->string('szMime_type', 100)->notNull();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
        });

        // SLA rules table
        Schema::create('sla_rules', function (Blueprint $table) {
            $table->id();
            $table->enum('enmPriority', ['low', 'medium', 'high', 'urgent'])->notNull();
            $table->integer('iResponse_time_minutes')->notNull();
            $table->integer('iResolution_time_minutes')->notNull();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });

        // Settings table
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('szKey', 255)->notNull()->unique();
            $table->string('szValue', 1000)->notNull();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('sla_rules');
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('ticket_histories');
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('notifications');
    }
}; 