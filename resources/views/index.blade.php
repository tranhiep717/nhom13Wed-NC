@extends('layouts.main')

@section('title', 'home')

@section('content')
<div class="section">
	<div class="container">
		<div class="row"> 
			<div class="shop"> 
				<div class="shop-img"> 
					<img src="{{ asset('storage/products/shop03.png') }}" alt="Bộ sưu tập máy tính xách tay">

				</div>
				<div class="shop-body">
					<h3>Bộ sưu tập<br>Máy tính xách tay</h3>
					<a href="{{route('laptop')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xs-6">
			<div class="shop">
				<div class="shop-img">
					<img src="{{ asset('storage/products/shop03.png') }}" alt="Bộ sưu tập phụ kiện">
				</div>
				<div class="shop-body">
					<h3>Bộ sưu tập<br>Phụ kiện</h3>
					<a href="{{route('accessories')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xs-6">
			<div class="shop">
				<div class="shop-img">
					<img src="{{ asset('storage/products/shop02.png') }}" alt="Bộ sưu tập điện thoại">
				</div>
				<div class="shop-body">
					<h3>Bộ sưu tập<br>Điện thoại</h3>
					<a href="{{route('telephone')}}" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sản phẩm mới</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Máy tính xách tay</a></li>
							<li><a data-toggle="tab" href="#tab1">Điện thoại</a></li>
							<li><a data-toggle="tab" href="#tab1">Máy ảnh</a></li>
							<li><a data-toggle="tab" href="#tab1">Phụ kiện</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
                                @foreach($newProducts as $product)
								<div class="product">
									<div class="product-img">
										<img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                                        @if($product->is_new)
										<div class="product-label">
											<span class="new">MỚI</span>
										</div>
                                        @endif
									</div>
									<div class="product-body">
										<p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
										<h3 class="product-name">
											<a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
										</h3>
										<h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
										<div class="product-rating">
                                            @for ($i = 0; $i < $product->rating; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                            @for ($i = $product->rating; $i < 5; $i++)
                                                <i class="fa fa-star-o"></i>
                                            @endfor
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">thêm vào danh sách yêu thích</span></button>
											<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">thêm vào so sánh</span></button>
											<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">xem nhanh</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> thêm vào giỏ hàng</button>
									</div>
								</div>
                                @endforeach
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="container">
		<div class="row">
			@foreach([$widgetProducts1, $widgetProducts2, $widgetProducts3, $widgetProducts4, $widgetProducts5] as $index => $widgetGroup)
			@if($index % 2 === 0)
				@if($index > 0)
					<div class="clearfix visible-sm visible-xs"></div>
				@endif
			@endif
			<div class="col-md-4 col-xs-6">
				<div class="section-title">
					<h4 class="title">Sản phẩm bán chạy</h4>
					<div class="section-nav">
						<div id="slick-nav-{{ $index + 3 }}" class="products-slick-nav"></div>
					</div>
				</div>

				<div class="products-widget-slick" data-nav="#slick-nav-{{ $index + 3 }}">
					<div>
                        @foreach($widgetGroup as $product)
						<div class="product-widget">
							<div class="product-img">
								<img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
							</div>
							<div class="product-body">
								<p class="product-category">{{ $product->category->name ?? 'Không có danh mục' }}</p>
								<h3 class="product-name">
									<a href="{{ route('products.show', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
								</h3>
								<h4 class="product-price">{{ number_format($product->price) }} VNĐ <del class="product-old-price">{{ number_format($product->old_price) }} VNĐ</del></h4>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
