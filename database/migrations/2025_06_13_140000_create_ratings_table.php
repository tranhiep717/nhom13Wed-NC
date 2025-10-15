<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('ratings')) {
            Schema::create('ratings', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('product_id');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->unsignedTinyInteger('rating'); // 1-5 sao
                $table->text('comment')->nullable();
                $table->timestamps();
                $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
            return;
        }

        // Alter existing early ratings table to align schema differences.
        Schema::table('ratings', function (Blueprint $table) {
            if (Schema::hasColumn('ratings', 'review') && !Schema::hasColumn('ratings', 'comment')) {
                // Rename review -> comment for consistency
                try { $table->renameColumn('review', 'comment'); } catch (Throwable $e) { /* ignore if already renamed */ }
            }
            // Only add comment if neither comment nor review exists (rare case)
            if (!Schema::hasColumn('ratings', 'comment') && !Schema::hasColumn('ratings', 'review')) {
                $table->text('comment')->nullable();
            }
            // Adjust user_id to nullable if not already
            if (Schema::hasColumn('ratings', 'user_id')) {
                // Some DB engines need raw SQL for modify; skip for simplicity unless needed.
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
