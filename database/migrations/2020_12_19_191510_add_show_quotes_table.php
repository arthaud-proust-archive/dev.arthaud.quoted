<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShowQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('quotes', 'show')) {
            Schema::table('quotes', function (Blueprint $table) {
                $table->boolean('show')->default(true);
            });
        }

        if (!Schema::hasColumn('groups', 'minrole')) {
            Schema::table('groups', function (Blueprint $table) {
                $table->unsignedTinyInteger('minrole')->default(1);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
