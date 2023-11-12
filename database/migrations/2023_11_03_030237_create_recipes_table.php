<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('instructions');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\Recipe::class)->constrained();
            $table->foreignIdFor(\App\Models\Ingredient::class)->constrained();
            $table->string('note')->default('');
            $table->unique(['recipe_id', 'ingredient_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingredient_recipe', function (Blueprint $table) {
            $table->dropForeign(['recipe_id']);
            $table->dropForeign(['ingredient_id']);
        });
        Schema::dropIfExists('recipes');
        Schema::dropIfExists('ingredient_recipe');
    }
};
