// database/migrations/YYYY_MM_DD_HHMMSS_create_orders_table.php
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Nếu có user đăng nhập
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('billing_address');
            $table->string('billing_province');
            $table->string('billing_district');
            $table->string('billing_ward');
            $table->string('shipping_address')->nullable();
            $table->string('shipping_province')->nullable();
            $table->string('shipping_district')->nullable();
            $table->string('shipping_ward')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_method'); // 'bank_transfer', 'cod', 'momo_zalopay'
            $table->string('status')->default('pending'); // 'pending', 'processing', 'completed', 'cancelled'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
