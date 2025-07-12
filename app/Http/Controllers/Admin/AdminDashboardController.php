<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function create(){
        return view('frontend.admin.create-admin');
    }
    
    public function dashboard(){
        $allProduct = Product::count();
        $admin = AdminUser::where('id', Auth::user()->id)->first();
        $orders = Order::latest()->paginate(20);
        $totalOrder = Order::count();
        $confirmedOrder = Order::where('status', 'confirmed')->count();
        $deliveredOrder = Order::where('status', 'delivered')->count();
        $totalDeliveredAmount = Order::where('status', 'delivered')->sum('total');

        return view('frontend.admin.dashboard', 
                        compact(
                            'admin',
                            'orders',
                            'allProduct',
                            'totalOrder',
                            'confirmedOrder',
                            'deliveredOrder',
                            'totalDeliveredAmount'
                        ));
    }
}
