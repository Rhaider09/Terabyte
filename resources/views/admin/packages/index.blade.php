@extends('admin.layout') @section('content')
    <div class="d-flex justify-content-between">
        <h1>Packages</h1><a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Add Package</a>
    </div>
    <div class="card mt-4">
        <div class="table-responsive">
            <table class="table mb-0">
                <tr>
                    <th>Name</th>
                    <th>Speed</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                @foreach ($packages as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->speed }}</td>
                        <td>Rs {{ number_format($p->price) }}</td>
                        <td>{{ $p->status ? 'Active' : 'Disabled' }}</td>
                        <td><a href="{{ route('admin.packages.edit', $p) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form class="d-inline" method="POST" action="{{ route('admin.packages.destroy', $p) }}">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
