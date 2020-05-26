<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnTrabajoObraFromObras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void temporada_trabajo
     */
    public function up()
    {
        Schema::table('obras', function (Blueprint $table) {
            $table->dropForeign('obras_trabajo_obra_foreign');
            $table->dropColumn('trabajo_obra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('obras', function (Blueprint $table) {
            //
        });
    }
}
