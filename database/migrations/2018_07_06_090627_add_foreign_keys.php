<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('questions', function (Blueprint $table) {
            $table->foreign('cid')->references('CID')->on('categories');
            $table->foreign('sid')->references('SID')->on('sources');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('qid')->references('QID')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('cid');
            $table->dropForeign('sid');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign('qid');
        });
    }
}
