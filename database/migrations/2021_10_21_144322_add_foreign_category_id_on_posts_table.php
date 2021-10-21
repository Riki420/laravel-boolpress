<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignCategoryIdOnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //definizione dell'id colonna
            $table->unsignedBigInteger('category_id')->after('id')->nullable();
            //foreign key category id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
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
            //rimuovere il collegamento della foregin key
            $table->dropForeign('posts_category_id_foreign');
            //eliminare la colonna
            $table->dropColumn('category_id');
        });
    }
}
