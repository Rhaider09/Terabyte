<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\about;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'packages'=>Package::where('status', true)->orderBy('sort_order')->get(),
            'testimonials'=>Testimonial::where('status', true)->orderBy('sort_order')->get(),
            'abouts'=>about::where('status', true)->orderBy('sort_order')->get(),
            'settings'=>Setting::pluck('value','key'),
        ]);
    }
}
