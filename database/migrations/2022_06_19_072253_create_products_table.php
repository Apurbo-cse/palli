<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('title');
            $table->string('short_desc');
            $table->text('details');
            $table->string('image');
            $table->string('image_two');
            $table->string('image_three')->nullable();
            $table->float('regular_price', 8, 2);
            $table->float('offer_price', 8, 2);
            $table->float('avg_review', 2, 1)->nullable()->default(0);
            $table->float('total_sell', 8, 2)->default(0);
            $table->string('size');
            $table->integer('stock')->default(0);
            $table->enum('is_featured', [0,1]);
            $table->enum('status', [0,1]);
            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('subcategory_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
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
}
