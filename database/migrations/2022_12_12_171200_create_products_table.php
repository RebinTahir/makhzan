<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("note");
            $table->string("sellkarton")->default("0");
            $table->string("selldarzan12")->default("0");
            $table->string("selldarzan10")->default("0");
            $table->string("sellnewdarzan")->default("0");
            $table->string("selldana")->default("0");
            
            $table->string("buykarton")->default("0");
            $table->string("buydarzan12")->default("0");
            $table->string("buydarzan10")->default("0");
            $table->string("buynewdarzan")->default("0");
            $table->string("buydana")->default("0");



            $table->unsignedInteger("user_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
