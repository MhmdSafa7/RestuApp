<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Customer name
            $table->string('email')->nullable(); // Customer email
            $table->string('phone'); // Customer phone number
            $table->text('location'); // Location description
            $table->decimal('total_price', 10, 2); // Total order price
            $table->timestamp('order_arrival_time'); // Estimated arrival time
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    public function down() {
        Schema::dropIfExists('orders');
    }
};
