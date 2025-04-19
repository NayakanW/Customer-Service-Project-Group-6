<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ticket_escalations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('iTicket_id')->constrained('tickets')->cascadeOnDelete();
            $table->foreignId('iFrom_department_id')->constrained('departments')->cascadeOnDelete();
            $table->foreignId('iTo_department_id')->constrained('departments')->cascadeOnDelete();
            $table->boolean('isEscalated_by')->notNull();
            $table->string('szReason', 1000)->notNull();
            $table->dateTime('szCreated_at')->notNull()->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticket_escalations');
    }
}; 