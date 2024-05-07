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
          //  $table->dropColumn('user_id');
//
//            // 새로운 외래 키 칼럼 추가

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
