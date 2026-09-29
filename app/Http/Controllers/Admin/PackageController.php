<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        return view('admin.packages.index', ['packages' => Package::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.packages.form', ['package' => new Package]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        Package::create($data);
        return redirect()->route('admin.packages.index')->with('success', 'Package created.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.form', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $package->update($this->validated($request));
        return redirect()->route('admin.packages.index')->with('success', 'Package updated.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return back()->with('success', 'Package deleted.');
    }

    private function validated(Request $request): array
    {
        $d = $request->validate([
            'name' => 'required|max:100',
            'speed' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'billing_period' => 'required|max:30',
            'short_description' => 'nullable|string',
            'features' => 'nullable|string',
            'installation_fee' => 'nullable|numeric|min:0',
            'router_included' => 'nullable|boolean',
            'status' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
        ]);
        $d['slug'] = Str::slug($d['name']);
        $d['features'] = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $d['features'] ?? ''))));
        $d['router_included'] = $request->boolean('router_included');
        $d['status'] = $request->boolean('status');
        return $d;
    }
}
