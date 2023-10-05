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
            $table->id(); // Trường id tự tạo và tự tăng
            $table->string('name', 100);
            $table->integer('id_type')->unsigned();
            $table->text('description');
            $table->float('unit_price', 10, 2); // Giá sản phẩm có 2 chữ số sau dấu thập phân
            $table->float('promotion_price', 10, 2); // Giá khuyến mãi
            $table->string('image', 255);
            $table->string('unit', 255);
            $table->tinyInteger('new')->default(0); // Mặc định là 0
            $table->timestamps(); // Tự động tạo các trường created_at và updated_at
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
