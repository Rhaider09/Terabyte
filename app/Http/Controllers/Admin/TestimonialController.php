<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        return view('admin.testimonials.index', [
            'items' => Testimonial::orderBy('sort_order')->get()
        ]);
    }

    public function create()
    {
        return view('admin.testimonials.form', [
            'item' => new Testimonial()
        ]);
    }

    public function store(Request $request)
    {
        Testimonial::create($this->v($request));

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.form', [
            'item' => $testimonial
        ]);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update($this->v($request));

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }

    private function v(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'sort_order' => 'nullable|integer',
        ]);

        $data['status'] = $request->boolean('status');

        return $data;
    }
}
