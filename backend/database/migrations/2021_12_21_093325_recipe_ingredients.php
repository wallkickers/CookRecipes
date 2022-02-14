<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecipeIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('recipe_id')->unsigned();
            $table->unsignedBigInteger('ingredient_category_id')->nullable()->unsigned();
            $table->string('ingredient_name');
            $table->string('ingredient_amount')->nullable()->default(null);
        });

        Schema::table('recipe_ingredients', function (Blueprint $table) {
            $table->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->cascadeOnDelete();
        });

        Schema::table('recipe_ingredients', function (Blueprint $table) {
            $table->foreign('ingredient_category_id')
                ->references('id')
                ->on('ingredient_categories')
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
        Schema::table('recipe_ingredients', function (Blueprint $table) {
            $table->dropForeign('recipe_ingredients_ingredient_category_id_foreign');
        });

        Schema::table('recipe_ingredients', function (Blueprint $table) {
            $table->dropForeign('recipe_ingredients_recipe_id_foreign');
        });

        Schema::dropIfExists('recipe_ingredients');
    }
}
