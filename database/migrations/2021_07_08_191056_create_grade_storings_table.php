<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeStoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_storings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auditor_id')->nullable();
            $table->unsignedBigInteger('auditee_id')->nullable();
            $table->unsignedBigInteger('standart_id');
            $table->Integer('grade');
            $table->String('type');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_storings');
    }
}
