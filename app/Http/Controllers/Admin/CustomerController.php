<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customers.index',['customers'=>Customer::latest()->paginate(20)]);
    }
}
