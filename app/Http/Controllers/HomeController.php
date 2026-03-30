<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        $catagory = Catagory::all();

        return view('user.home', compact('product', 'catagory'));
    }

    public function adminHome() {
        return view('admin.admin-home');
    }

    public function product_detail($id) {
        $product = Product::find($id);

        return view('user.product-detail', compact('product'));
    }

    public function add_cart(Request $request, $id) {
        if(Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            $cart->price = $product->price * $request->quantity;
            $cart->image = $product->image;
            $cart->product_id = $product->id;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect('show_cart');

        } else {
            return redirect('login');
        }
    }

    public function show_cart() {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('user.cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id) {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function make_order() {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();

            // Memeriksa apakah keranjang belanja kosong
            if ($carts->isEmpty()) {
                // Jika keranjang belanja kosong, kembalikan pengguna ke halaman keranjang belanja
                return view('user.home');
            }

            $ongkir = '';

            return view('user.order', compact('carts', 'ongkir'));
        } else {
            return redirect('login');
        }
    }

    public function transaction(Request $request) {
        // Memastikan pengguna terautentikasi
        if (Auth::check()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', $id)->get();
            $subTotalPrice = intval(Cart::where('user_id', $id)->sum('price'));
            $selectedHarga = $request->input('selectedValues');
            $totalPrice = $subTotalPrice + $selectedHarga;
            $snapToken = null; // Initialize $snapToken outside the loop

            $orders = []; // Initialize an empty array to store orders

            foreach ($carts as $cart) {
                $order = new Order;

                // Set user details from the current cart item
                $order->name = $cart->name;
                $order->email = $cart->email;
                $order->phone = $cart->phone;
                $order->address = $cart->address;
                $order->user_id = $cart->user_id;

                // Set product details from the current cart item
                $order->product_title = $cart->product_title;
                $order->quantity = $cart->quantity;
                $order->price = $cart->price;
                $order->image = $cart->image;
                $order->product_id = $cart->product_id;

                $total = $totalPrice;
                $order->total_price = $total;
                $order->payment_status = 'Belum Dibayar';

                // Simpan pesanan
                $order->save();

                $orders[] = $order; // Add the order to the orders array
            }

            // Hapus semua item dari keranjang pengguna setelah pembayaran berhasil
            Cart::where('user_id', $id)->delete();

            // Generate Snap token outside the loop
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => rand(), // Using user ID as order ID, you might want to change this
                    'gross_amount' => $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->phone,
                    'address' => Auth::user()->address,
                ]
            ];

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Pass $snapToken and $orders to the view
            return view('user.transaction', ['snapToken' => $snapToken, 'user_id' => $id, 'orders' => $orders, 'total' => $totalPrice]);
        } else {
            return redirect('login');
        }
    }

    public function success(Request $request) {
        if (Auth::check()) { // Mengganti Auth::id() dengan Auth::check()
            $id = Auth::user()->id;
            $orders = Order::where('user_id', $id)->get();

            $snapToken = $request->input('snap_token');

            foreach ($orders as $order) {
                // Update status pembayaran untuk setiap pesanan
                $order->payment_status = 'Sudah Dibayar';
                $order->save();
            }

            return view('user.success');
        } else {
            return redirect('login');
        }
    }
}
