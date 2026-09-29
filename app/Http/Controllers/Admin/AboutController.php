<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display About content.
     */
    public function index()
    {
        $items = About::orderBy('sort_order', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.abouts.index', compact('items'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $item = new About();

        return view('admin.abouts.form', compact('item'));
    }

    /**
     * Store About content.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        About::create($data);

        return redirect()
            ->route('admin.abouts.index')
            ->with('success', 'About content added successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(About $about)
    {
        return view('admin.abouts.form', [
            'item' => $about,
        ]);
    }

    /**
     * Update About content.
     */
    public function update(Request $request, About $about)
    {
        $data = $this->validateData($request);

        $about->update($data);

        return redirect()
            ->route('admin.abouts.index')
            ->with('success', 'About content updated successfully.');
    }

    /**
     * Delete About content.
     */
    public function destroy(About $about)
    {
        $about->delete();

        return redirect()
            ->route('admin.abouts.index')
            ->with('success', 'About content deleted successfully.');
    }

    /**
     * Validate About form data.
     */
    private function validateData(Request $request): array
    {
        $data = $request->validate([
            'question'   => ['required', 'string', 'max:255'],
            'answer'     => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        // Default sort order
        $data['sort_order'] = $data['sort_order'] ?? 0;

        // Checkbox status
        $data['status'] = $request->boolean('status');

        return $data;
    }
}