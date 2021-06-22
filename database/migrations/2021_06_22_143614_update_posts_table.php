<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // DEFINIZIONE COLONNA
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');
            
            // DEFINIZIONE FK
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // 1 rimozione relazione
            $table->dropForeign('posts_category_id_foreign'); // tabella posts _ nome colonna _ suffisso foreign

            // 2 rimozione della colonna
            $table->dropColumn('category_id');

        });
    }
}
