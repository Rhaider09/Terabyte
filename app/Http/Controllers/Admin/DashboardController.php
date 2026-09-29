<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Order;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'packages'=>Package::count(),
            'orders'=>Order::count(),
            'pendingOrders'=>Order::where('status','pending')->count(),
            'customers'=>Customer::count(),
        ]);
    }
}
