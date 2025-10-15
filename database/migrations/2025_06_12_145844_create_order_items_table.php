<?php
// Harmonize order_items schema: if table already exists (created by earlier migration), transform it; otherwise create it.
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
        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->cascadeOnDelete();
                $table->foreignId('product_id')->constrained()->cascadeOnDelete();
                $table->string('product_name');
                $table->integer('quantity');
                $table->decimal('price', 10, 2);
                $table->string('color')->nullable();
                $table->string('configuration')->nullable();
                $table->timestamps();
            });
            return; // done
        }

        // Table exists (from older minimal definition). Alter it to match new schema.
        Schema::table('order_items', function (Blueprint $table) {
            // Drop obsolete columns if they exist
            if (Schema::hasColumn('order_items', 'user_id')) {
                try { $table->dropConstrainedForeignId('user_id'); } catch (\Throwable $e) { /* ignore */ }
            }
            if (Schema::hasColumn('order_items', 'total_price')) {
                $table->dropColumn('total_price');
            }
            if (Schema::hasColumn('order_items', 'status')) {
                $table->dropColumn('status');
            }

            // Add new columns only if missing
            if (!Schema::hasColumn('order_items', 'order_id')) {
                $table->foreignId('order_id')->after('id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('order_items', 'product_id')) {
                $table->foreignId('product_id')->after('order_id')->constrained()->cascadeOnDelete();
            }
            if (!Schema::hasColumn('order_items', 'product_name')) {
                $table->string('product_name')->after('product_id');
            }
            if (!Schema::hasColumn('order_items', 'quantity')) {
                $table->integer('quantity')->after('product_name');
            }
            if (!Schema::hasColumn('order_items', 'price')) {
                $table->decimal('price', 10, 2)->after('quantity');
            }
            if (!Schema::hasColumn('order_items', 'color')) {
                $table->string('color')->nullable()->after('price');
            }
            if (!Schema::hasColumn('order_items', 'configuration')) {
                $table->string('configuration')->nullable()->after('color');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to an empty drop (safe rollback)
        Schema::dropIfExists('order_items');
    }
};