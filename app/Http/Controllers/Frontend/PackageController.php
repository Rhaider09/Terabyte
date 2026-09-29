<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        return view('frontend.packages', [
            'packages'=>Package::where('status', true)->orderBy('sort_order')->get()
        ]);
    }
}
