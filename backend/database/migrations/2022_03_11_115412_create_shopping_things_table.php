<?php

declare(strict_types=1);

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
        Schema::create('shopping_things', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('ingredient_category_id')->nullable()->unsigned();
            $table->string('ingredient_name');
            $table->string('ingredient_amount')->nullable()->default(null);
        });

        Schema::table('shopping_things', function (Blueprint $table) {
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
        Schema::table('shopping_things', function (Blueprint $table) {
            $table->dropForeign('shopping_things_ingredient_category_id_foreign');
        });

        Schema::dropIfExists('shopping_things');
    }
};
