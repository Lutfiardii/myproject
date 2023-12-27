<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('Products')->onDelete('cascade');
            $table->foreignId('attribute_id')->constrained('Attributes')->onDelete('cascade');
            $table->foreignId('attribute_value_id')->constrained('Attribute_values')->onDelete('cascade');
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
        Schema::dropIfExists('Product_attributes');
    }
}
