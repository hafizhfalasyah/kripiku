<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class OngkirController extends Controller
{
    public function index() {
        $response = Http::withHeaders([
            'key' => '281749a010e26f4d064d5779331fc253'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];

        return view('user.cek-ongkir', ['cities' => $cities, 'ongkir' => '']);
    }

    public function cek_ongkir(Request $request) {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $carts = Cart::where('user_id', '=', $id)->get();

            $response = Http::withHeaders([
                'key' => '281749a010e26f4d064d5779331fc253'
            ])->get('https://api.rajaongkir.com/starter/city');

            $responseCost = Http::withHeaders([
                'key' => '281749a010e26f4d064d5779331fc253'
            ])->post('https://api.rajaongkir.com/starter/cost', [
                'origin' => $request->origin,
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => $request->courier,
            ]);

            $cities = $response['rajaongkir']['results'];
            $ongkir = $responseCost['rajaongkir']['results'];


            return view('user.order', ['cities' => $cities, 'ongkir' => $ongkir, 'carts' => $carts]);
        }
    }
}
