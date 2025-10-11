<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Import Str facade để tạo slug

class Product extends Model
{
    use HasFactory;

    // Các cột có thể được gán hàng loạt (fillable)
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'old_price',
        'image_path', // Đảm bảo cột này khớp với tên trong DB
        'category_id',
        'stock',
        'is_new',
        'discount_percentage',
        'rating',
        'long_description',
        'details',
        'sold_count',
        'views_count',
        // Thêm các cột khác nếu có
    ];

    // Định nghĩa mối quan hệ với Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Định nghĩa mối quan hệ với Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Tự động tạo slug khi tạo hoặc cập nhật sản phẩm
    // Đây là một cách để đảm bảo slug luôn được tạo và duy nhất.
    protected static function boot()
    {
        parent::boot();

        // Khi tạo một sản phẩm mới
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
            // Đảm bảo slug là duy nhất
            $latestSlug = static::where('slug', 'like', $product->slug . '%')
                ->latest('id')
                ->value('slug');
            if ($latestSlug) {
                $numbers = explode('-', $latestSlug);
                $lastNumber = end($numbers);
                if (is_numeric($lastNumber)) {
                    $product->slug = $product->slug . '-' . ($lastNumber + 1);
                } else {
                    $product->slug = $product->slug . '-1';
                }
            }
        });

        // Khi cập nhật một sản phẩm
        static::updating(function ($product) {
            // Chỉ cập nhật slug nếu tên sản phẩm thay đổi
            if ($product->isDirty('name')) {
                $product->slug = Str::slug($product->name);
                $latestSlug = static::where('slug', 'like', $product->slug . '%')
                    ->where('id', '!=', $product->id) // Loại trừ sản phẩm hiện tại
                    ->latest('id')
                    ->value('slug');
                if ($latestSlug) {
                    $numbers = explode('-', $latestSlug);
                    $lastNumber = end($numbers);
                    if (is_numeric($lastNumber)) {
                        $product->slug = $product->slug . '-' . ($lastNumber + 1);
                    } else {
                        $product->slug = $product->slug . '-1';
                    }
                }
            }
        });
    }

    // Có thể thêm Accessor để đảm bảo image_path luôn có giá trị hợp lệ
    // public function getImagePathAttribute($value)
    // {
    //     // Đây là ví dụ, bạn có thể điều chỉnh đường dẫn mặc định
    //     return $value ? asset('storage/' . $value) : asset('img/default-product.png');
    // }
}
