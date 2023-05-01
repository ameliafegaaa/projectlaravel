<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Shoes;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        if(!session()->has('user')) return redirect('/');

        $users = User::all();
        $shoes = Shoes::all();
        $sales = Sales::sum('total');

        return view('dashboard', ['users' => $users, 'shoes' => $shoes, 'sales' => $sales]);
    }

    public function users() {

        if(!session()->has('user')) return redirect('/');

        $users = User::all();

        return view('users', ['users' => $users]);
    }

    public function users_delete(Request $request) {

        if(!session()->has('user') || empty($request->input('user_id'))) return redirect('/');
        $user_id = $request->input('user_id');

        $users = User::findOrFail($user_id);
        $users->delete();

        return redirect('/dashboard/users')->with('success', 'User deleted successfully.');
    }


    public function shoes() {

        if(!session()->has('user')) return redirect('/');

        $shoes = Shoes::all();

        return view('shoes', ['shoes' => $shoes]);
    }

    public function shoes_delete(Request $request) {

        if(!session()->has('user') || empty($request->input('shoes_id'))) return redirect('/');
        $shoes_id = $request->input('shoes_id');

        $shoes = Shoes::findOrFail($shoes_id);
        $shoes->delete();

        return redirect('/dashboard/shoes')->with('success', 'Shoes deleted successfully.');
    }

    public function shoes_insert(Request $request) {

        if(!session()->has('user')) return redirect('/');

        $shoes = new Shoes([
            'shoes_name' => $request->input('shoes_name'),
            'shoes_brand' => $request->input('shoes_brand'),
            'shoes_price' => $request->input('shoes_price'),
            'shoes_image' => $request->input('shoes_image'),
            'shoes_description' => $request->input('shoes_description'),
        ]);
        $shoes->save();

        return redirect('/dashboard/shoes')->with('success', 'Shoes added successfully.');
    }

    public function shoes_update(Request $request) {

        if(!session()->has('user')) return redirect('/');
        $shoes_id = $request->input('shoes_id');

        $shoes = Shoes::findOrFail($shoes_id);

        $shoes->shoes_name = $request->input('shoes_name');
        $shoes->shoes_brand = $request->input('shoes_brand');
        $shoes->shoes_price = $request->input('shoes_price');
        $shoes->shoes_image = $request->input('shoes_image');
        $shoes->shoes_description = $request->input('shoes_description');
        
        $shoes->save();

        return redirect('/dashboard/shoes')->with('success', 'Shoes updated successfully.');
    }

    public function sales() {

        if(!session()->has('user')) return redirect('/');

        $sales = Sales::select('shoes.shoes_name', 'shoes.shoes_brand', 'sales.total', 'users.name', 'sales.payment_method', 'sales.created_at')->join('shoes','sales.shoes_id', '=', 'shoes.shoes_id')->join('users','sales.user_id', '=', 'users.user_id')->get();

        return view('sales', ['sales' => $sales]);
    }

    public function sales_delete(Request $request) {

        if(!session()->has('user') || empty($request->input('sale_id'))) return redirect('/');
        $sale_id = $request->input('sale_id');

        $sales = Sales::findOrFail($sale_id);
        $sales->delete();

        return redirect('/dashboard/sales')->with('success', 'Sales data deleted successfully.');
    }
}
