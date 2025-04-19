<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('szSubject', 255)->notNull();
            $table->string('szDescription', 1000);
            $table->foreignId('iUser_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('iAssigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('iDepartment_id')->constrained('departments')->cascadeOnDelete();
            $table->enum('enmPriority', ['low', 'medium', 'high', 'urgent'])->notNull()->default('low');
            $table->enum('enmStatus', ['open', 'pending', 'resolved', 'closed'])->notNull()->default('open');
            $table->integer('iCategory_id')->nullable();
            $table->dateTime('dtmSla_due_at')->nullable();
            $table->dateTime('dtmClosed_at')->nullable();
            $table->dateTime('dtmCreated_at')->notNull()->useCurrent();
            $table->dateTime('dtmUpdated_at')->notNull()->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}; 