@extends('admin.layout') @section('content')
    <h1>
        Website Settings</h1>
    <form method="POST" action="{{ route('admin.settings.update') }}" class="card p-4 mt-4">
        @csrf @method('PUT')@foreach (['site_name' => 'Site Name', 'site_name_title' => 'Site Name Title', 'phone' => 'Phone',
        'whatsapp' => 'WhatsApp Number', 'email' => 'Email', 'address' => 'Address', 'hero_title' => 'Hero Title',
         'hero_subtitle' => 'Hero Subtitle', 'hero_site_name' => 'Hero Site Name', 'hero_Distraction' => 'Hero Distraction',
        ] as $key => $label)
            <div class="mb-3"><label>{{ $label }}</label><input name="{{ $key }}" class="form-control" value="{{ $settings[$key] ?? '' }}"></div>
        @endforeach
        <button class="btn btn-primary">Save Settings</button>
    </form>
@endsection
