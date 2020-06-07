<?php

use App\Services\Common\StaticArray;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keyword_title');
            $table->integer('keyword_value')->default(StaticArray::KEYWORD_DEFAULT_VALUE);
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['keyword_title', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('keywords');
    }
}
