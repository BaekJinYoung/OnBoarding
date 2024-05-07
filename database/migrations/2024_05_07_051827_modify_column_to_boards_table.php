<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('boards', function (Blueprint $table) {
//            // 기존의 user_id 칼럼 삭제
//            $table->dropColumn('user_id');
//
//            // 새로운 외래 키 칼럼 추가
//            $table->unsignedBigInteger('user_id');
//
            // 외래 키 제약 조건 추가
 //           $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boards', function (Blueprint $table) {
            //
        });
    }
};
