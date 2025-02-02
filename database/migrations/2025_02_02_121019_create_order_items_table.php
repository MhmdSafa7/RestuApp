<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Links to orders
            $table->foreignId('menu_item_id')->constrained()->onDelete('cascade'); // Links to menu items
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('order_items');
    }
};

