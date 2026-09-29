<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index',['orders'=>Order::with('package')->latest()->paginate(20)]);
    }

    public function status(Request $request, Order $order)
    {
        $data=$request->validate(['status'=>'required|in:pending,processing,installed,cancelled']);
        $order->update($data);
        return back()->with('success','Order status updated.');
    }
}
