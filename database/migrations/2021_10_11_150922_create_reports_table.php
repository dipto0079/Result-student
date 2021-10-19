<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->decimal('total_marks');
            $table->timestamps();

            $table->unique(['student_id','subject_id']);

            $table->foreign("student_id")
                ->references("id")
                ->on('students')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign("subject_id")
                ->references("id")
                ->on('subjects')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
