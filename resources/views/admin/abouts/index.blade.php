@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="h3 mb-1">About Us</h1>
                <p class="text-muted mb-0">
                    Manage About Us content displayed on your website.
                </p>
            </div>

            <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i>
                Add About
            </a>

        </div>


        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                <i class="fas fa-check-circle me-2"></i>

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif


        {{-- About Us Table --}}
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    About Us Content
                </h5>

            </div>


            <div class="card-body p-0">

                @if ($items->count())
                    <div class="table-responsive">

                        <table class="table table-hover align-middle mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th width="80">#</th>
                                    <th width="220">Title / Question</th>
                                    <th>Description</th>
                                    <th width="100">Order</th>
                                    <th width="110">Status</th>
                                    <th width="180" class="text-center">Actions</th>
                                </tr>

                            </thead>


                            <tbody>

                                @foreach ($items as $i)
                                    <tr>

                                        {{-- ID --}}
                                        <td>
                                            <span class="text-muted">
                                                {{ $i->id }}
                                            </span>
                                        </td>


                                        {{-- Question --}}
                                        <td>
                                            <strong>
                                                {{ $i->question }}
                                            </strong>
                                        </td>


                                        {{-- Answer --}}
                                        <td>

                                            <div style="max-width: 500px;">

                                                {{ \Illuminate\Support\Str::limit($i->answer, 150) }}

                                            </div>

                                        </td>


                                        {{-- Sort Order --}}
                                        <td>

                                            <span class="badge bg-secondary">
                                                {{ $i->sort_order ?? 0 }}
                                            </span>

                                        </td>


                                        {{-- Status --}}
                                        <td>

                                            @if ($i->status)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check me-1"></i>
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-times me-1"></i>
                                                    Inactive
                                                </span>
                                            @endif

                                        </td>


                                        {{-- Actions --}}
                                        <td class="text-center">

                                            {{-- Edit --}}
                                            <a href="{{ route('admin.abouts.edit', $i) }}" class="btn btn-sm btn-outline-primary" title="Edit">

                                                <i class="fas fa-edit"></i>
                                                Edit

                                            </a>


                                            {{-- Delete --}}
                                            <form method="POST" action="{{ route('admin.abouts.destroy', $i) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this About Us content?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">

                                                    <i class="fas fa-trash"></i>
                                                    Delete

                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                @else
                    {{-- Empty State --}}
                    <div class="text-center py-5">

                        <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>

                        <h5>No About Us Content Found</h5>

                        <p class="text-muted">
                            Add your first About Us section.
                        </p>

                        <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">

                            <i class="fas fa-plus me-1"></i>
                            Add About

                        </a>

                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection
