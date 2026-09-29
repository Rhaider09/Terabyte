<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create() { return view('frontend.contact'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:120',
            'email'=>'required|email',
            'phone'=>'nullable|string|max:30',
            'message'=>'required|string|max:3000',
        ]);

        // Add your mail/ContactMessage model here in Phase 2.
        return back()->with('success','Thank you. Your message has been received.');
    }
}
