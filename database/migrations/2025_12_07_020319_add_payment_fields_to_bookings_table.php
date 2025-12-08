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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('payment_id')->nullable()->after('status');
            $table->string('payment_status')->default('pending')->after('payment_id');
            $table->string('payment_url')->nullable()->after('payment_status');
            $table->decimal('total_price', 10, 2)->nullable()->after('payment_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['payment_id', 'payment_status', 'payment_url', 'total_price']);
        });
    }
};
