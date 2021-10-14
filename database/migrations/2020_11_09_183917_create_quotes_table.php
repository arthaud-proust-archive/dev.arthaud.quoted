<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('quotes')) {
            Schema::create('quotes', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->string('uuid');
                $table->string('group');
                $table->string('author');
                $table->text('content');
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
        Schema::dropIfExists('citations');
    }
}
