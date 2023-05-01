<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Shoes;
use Illuminate\Http\Request;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $shoes = Shoes::all();
        return view('shoes_list', ['shoes' => $shoes ]);
    }

    public function list_by_brand($brand) {
        $shoes = Shoes::where('shoes_brand', $brand)->get();
        return view('shoes_list', ['shoes' => $shoes, 'brand' => $brand]);
    }

    public function details($id)
    {
        $shoes = Shoes::where('shoes_id', $id)->get();
        return view('details', ['shoes' => $shoes ]);
    }

    public function checkout(Request $request)
    {
        if(empty($request->input('shoes_id')) || !session()->has('user')) return redirect('/login');
        $shoes = Shoes::where('shoes_id', $request->input('shoes_id'))->get();
        return view('checkout', ['shoes' => $shoes ]);
    }

    public function checkout_process(Request $request)
    {
        if(!session()->has('user')) return redirect('/login');

        $sale = new Sales([
            'user_id' => session('user')->user_id,
            'shoes_id' => $request->input('shoes_id'),
            'postal_code' => $request->input('postal_code'),
            'address' => $request->input('address'),
            'total' => $request->input('total'),
            'payment_method' => $request->input('payment_method'),
        ]);
    
        $sale->save();

        return redirect('/order_status')->with('success', 'Order created successfully.');
    }

    public function order_history()
    {
        if(!session()->has('user')) return redirect('/login');
        $user_id = session('user')->user_id;
        $history = Sales::where('user_id', $user_id)->join('shoes','sales.shoes_id', '=', 'shoes.shoes_id')->get();

        return view('/order_history', ['history' => $history]);

    }
}
