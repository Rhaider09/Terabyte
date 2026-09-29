<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Package $package = null)
    {
        return view('frontend.order', compact('package'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id'=>'nullable|exists:packages,id',
            'full_name'=>'required|string|max:120',
            'phone'=>'required|string|max:30',
            'email'=>'nullable|email|max:120',
            'installation_address'=>'required|string|max:1000',
            'city'=>'nullable|string|max:100',
            'message'=>'nullable|string|max:2000',
        ]);

        $customer = Customer::create([
            'name'=>$data['full_name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'] ?? null,
            'address'=>$data['installation_address'],
            'city'=>$data['city'] ?? null,
        ]);

        $order = Order::create($data + ['customer_id'=>$customer->id]);

        $wa = config('app.whatsapp_number', env('WHATSAPP_NUMBER'));
        $text = urlencode("New Internet Order #{$order->id}\nName: {$order->full_name}\nPhone: {$order->phone}\nPackage: ".($order->package?->name ?? 'Not selected'));
        $whatsappUrl = $wa ? "https://wa.me/{$wa}?text={$text}" : null;

        return view('frontend.order-success', compact('order','whatsappUrl'));
    }
}
