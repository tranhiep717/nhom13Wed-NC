<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Log; // Import Log facade

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // --- BƯỚC DEBUG 1: Kiểm tra tất cả dữ liệu được gửi từ form ---
        // dd($request->all());

        try {
            // 1. Validate dữ liệu đầu vào
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'tel' => 'required|string|max:20',
                'province' => 'required|string|max:255',
                'district' => 'required|string|max:255',
                'ward' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'payment_method' => 'required|in:bank_transfer,cod,momo_zalopay', // Đảm bảo đúng giá trị radio button
                'terms' => 'accepted',
                'shipping_first_name' => 'nullable|string|max:255',
                'shipping_last_name' => 'nullable|string|max:255',
                'shipping_tel' => 'nullable|string|max:20',
                'shipping_province' => 'nullable|string|max:255',
                'shipping_district' => 'nullable|string|max:255',
                'shipping_ward' => 'nullable|string|max:255',
                'shipping_address' => 'nullable|string|max:255',
                'order_notes' => 'nullable|string|max:1000',
                'selected_cart_items_ids' => 'required|string',
                'total_amount' => 'required|numeric|min:0',
            ]);

            // --- BƯỚC DEBUG 2: Kiểm tra dữ liệu sau validate (nếu vượt qua validation) ---
            // dd('Validation passed', $request->all());


            DB::beginTransaction();

            // 2. Tạo Order mới
            $order = new Order();
            $order->user_id = Auth::id(); // Gán user_id nếu người dùng đã đăng nhập, nếu không thì null
            $order->customer_name = $request->input('first_name') . ' ' . $request->input('last_name');
            $order->customer_phone = $request->input('tel');
            $order->customer_email = $request->input('email');
            $order->billing_address = $request->input('address');
            $order->billing_province = $request->input('province');
            $order->billing_district = $request->input('district');
            $order->billing_ward = $request->input('ward');

            // Xử lý địa chỉ giao hàng
            // Kiểm tra xem checkbox 'shiping_address' có được gửi lên và có giá trị 'on' không
            if ($request->has('shiping_address') && $request->boolean('shiping_address')) {
                $order->shipping_address = $request->input('shipping_address');
                $order->shipping_province = $request->input('shipping_province');
                $order->shipping_district = $request->input('shipping_district');
                $order->shipping_ward = $request->input('shipping_ward');
            } else {
                // Nếu không giao hàng địa chỉ khác, lấy địa chỉ thanh toán làm địa chỉ giao hàng
                $order->shipping_address = $order->billing_address;
                $order->shipping_province = $order->billing_province;
                $order->shipping_district = $order->billing_district;
                $order->shipping_ward = $order->billing_ward;
            }


            $order->notes = $request->input('order_notes');
            $order->total_amount = $request->input('total_amount');
            $order->payment_method = $request->input('payment_method');
            $order->status = 'pending';
            $order->save();

            // --- BƯỚC DEBUG 3: Kiểm tra Order đã được tạo và ID của nó ---
            // dd('Order created', $order->id, $order);


            // 3. Lấy các CartItem đã chọn và tạo OrderItem
            $selectedCartItemIds = explode(',', $request->input('selected_cart_items_ids'));
            // --- BƯỚC DEBUG 4: Kiểm tra các ID sản phẩm được chọn ---
            // dd('Selected Cart Item IDs', $selectedCartItemIds);

            $selectedCartItems = CartItem::whereIn('id', $selectedCartItemIds)
                                    ->where('user_id', Auth::id())
                                    ->with('product')
                                    ->get();

            // --- BƯỚC DEBUG 5: Kiểm tra các CartItem đã lấy được ---
            // dd('Selected Cart Items', $selectedCartItems->toArray());


            foreach ($selectedCartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product_name' => $cartItem->product->name,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                    'color' => $cartItem->product->color,
                    'configuration' => $cartItem->product->configuration,
                ]);

                // Xóa sản phẩm khỏi giỏ hàng sau khi đã thêm vào đơn hàng
                $cartItem->delete();
            }

            DB::commit();

            // --- BƯỚC DEBUG 6: Kiểm tra nếu commit thành công ---
            // dd('Order and Order Items saved successfully!');


            // 4. Chuyển hướng về trang thành công hoặc chi tiết đơn hàng
            // Đảm bảo route 'order.success' đã được định nghĩa trong web.php
            // Ví dụ: Route::get('/order-success', function() { return 'Đặt hàng thành công!'; })->name('order.success');
            return redirect()->route('order.success')->with('success', 'Đơn hàng của bạn đã được đặt thành công!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            // Log lỗi validation
            Log::error('Lỗi Validation khi đặt hàng: ' . $e->getMessage(), $e->errors());
            return redirect()->back()->withInput()->withErrors($e->errors())->with('error', 'Vui lòng kiểm tra lại thông tin đã nhập.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Log lỗi để debug
            Log::error('Lỗi khi đặt hàng: ' . $e->getMessage() . ' at line ' . $e->getLine() . ' in ' . $e->getFile());
            return redirect()->back()->withInput()->with('error', 'Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại. Lỗi: ' . $e->getMessage());
        }
    }
public function index()
    {
        $orders = Auth::user()->orders()->latest()->get();

        return view('orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Auth::user()->orders()->findOrFail($id);

        return view('orders.show', compact('order'));
    }
        private function getStatusText($status)
    {
        $statusTexts = [
            'pending' => 'Chờ xác nhận',
            'confirmed' => 'Đã xác nhận',
            'processing' => 'Đang xử lý',
            'shipping' => 'Đang giao hàng',
            'delivered' => 'Đã giao hàng',
            'cancelled' => 'Đã hủy'
        ];

        return $statusTexts[$status] ?? 'Không xác định';
    }
}