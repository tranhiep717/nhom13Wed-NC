<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
                $table->decimal('total_price', 12, 2);
                $table->string('status')->default('pending');
                $table->timestamps();
            });
            return;
        }

        // If table already exists (created by earlier migration with richer schema), ensure required columns exist / adjust.
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'total_price') && Schema::hasColumn('orders', 'total_amount')) {
                // leave total_amount as-is; optionally you could add a view or alias column.
            } elseif (!Schema::hasColumn('orders', 'total_price')) {
                $table->decimal('total_price', 12, 2)->nullable();
            }
            if (!Schema::hasColumn('orders', 'status')) {
                $table->string('status')->default('pending');
            }
        });
    }

    public function down()
    {
        // Only drop if originally created here (simplify by dropping always)
        Schema::dropIfExists('orders');
    }
}
