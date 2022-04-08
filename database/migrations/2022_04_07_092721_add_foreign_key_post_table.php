<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            
            //Creo una nuova colonna che abbia il nome della chiave primaria della tabella collegata
            $table->unsignedBigInteger('category_id')->nullable()->after('slug');

            //Vincolo di integrità specificato
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
            
            //Istruzioni per la cancellazione della tabella e dei vincoli foreign
            //sintassi particolare per dropForeign, vedi documentazione Laravel
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn('category_id');


        });
    }
}
