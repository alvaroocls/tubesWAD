<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSaldoToApplyJobsTable extends Migration
{
    public function up()
    {
        Schema::table('apply_jobs', function (Blueprint $table) {
            $table->decimal('saldo', 15, 2)->default(0)->after('status');
        });
    }

    public function down()
    {
        Schema::table('apply_jobs', function (Blueprint $table) {
            $table->dropColumn('saldo');
        });
    }
};
