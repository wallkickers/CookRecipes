<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeInstructions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_instructions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recipe_id')->unsigned();
            $table->string('instruction_content');
            $table->string('instruction_sort');
        });

        Schema::table('recipe_instructions', function (Blueprint $table) {
            $table->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipe_instructions', function (Blueprint $table) {
            $table->dropForeign('recipe_instructions_recipe_id_foreign');
        });

        Schema::dropIfExists('recipe_instructions');
    }
}
