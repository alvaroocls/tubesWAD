<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyJobsTable extends Migration
{
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('posting_jobs')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('message', 255)->nullable();
            $table->enum('status', ['pending', 'accepted', 'rejected', 'finished'])->default('pending');
            $table->decimal('saldo', 15, 2)->default(0); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('apply_jobs');
    }
}
