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

    // Quan hệ với Rating (đã có)
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Quan hệ với Review (dữ liệu mẫu)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Lấy 5 reviews ngẫu nhiên cho sản phẩm
    public function getRandomReviews($min = 7, $max = 10)
{
    // Lấy số lượng review ngẫu nhiên trong khoảng từ $min đến $max
    $limit = rand($min, $max);

    // Lấy review mẫu liên kết với sản phẩm
    return $this->reviews()->inRandomOrder()->limit($limit)->get();
}

    // Tính rating trung bình từ cả Rating và Review
    public function averageRating()
    {
        $ratingsAvg = $this->ratings()->avg('rating') ?? 0;
        $reviewsAvg = $this->reviews()->avg('rating') ?? 0;

        // Nếu có cả 2 loại đánh giá, tính trung bình cộng
        if ($ratingsAvg > 0 && $reviewsAvg > 0) {
            return ($ratingsAvg + $reviewsAvg) / 2;
        }

        // Nếu chỉ có 1 loại, return loại đó
        return $ratingsAvg > 0 ? $ratingsAvg : $reviewsAvg;
    }

    // Đếm tổng số đánh giá từ cả Rating và Review
    public function totalReviewsCount()
    {
        return $this->ratings()->count() + $this->reviews()->count();
    }
}
