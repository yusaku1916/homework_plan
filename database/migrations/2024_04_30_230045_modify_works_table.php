<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
        // 外部キー制約を削除
        $table->dropForeign('works_teacher_id_foreign');
        // カラムを削除
        $table->dropColumn('teacher_id');

        // 新たなカラムと外部キー制約を追加
        $table->unsignedBigInteger('teacher_student_id')->after('coment');
        $table->foreign('teacher_student_id')->references('id')->on('teacher_students');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
        // 外部キー制約とカラムを削除
        $table->dropForeign('works_teacher_student_id_foreign');
        $table->dropColumn('teacher_student_id');

        // 元のカラムと外部キー制約を追加
        $table->unsignedBigInteger('teacher_id')->after('coment');
        $table->foreign('teacher_id')->references('id')->on('teachers');
        });
    }
};
