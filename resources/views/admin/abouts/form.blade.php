@extends('admin.layout')

@section('content')

<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">abouts</h1>
            <p class="text-muted mb-0">
                Manage your website abouts Us content.
            </p>
        </div>

        <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i>
            Back
        </a>
    </div>


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>
        </div>
    @endif


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- abouts Form --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-info-circle me-2"></i>

                {{ $item->exists ? 'Edit abouts Content' : 'Add abouts Content' }}
            </h5>
        </div>

        <div class="card-body">

            <form method="POST"
                  action="{{ $item->exists
                        ? route('admin.abouts.update', $item)
                        : route('admin.abouts.store') }}">

                @csrf

                @if($item->exists)
                    @method('PUT')
                @endif


                {{-- Question / Title --}}
                <div class="mb-3">

                    <label for="question" class="form-label fw-semibold">
                        Title / Question
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="text"
                        id="question"
                        name="question"
                        class="form-control @error('question') is-invalid @enderror"
                        placeholder="Example: Our Mission"
                        value="{{ old('question', $item->question) }}"
                        required
                    >

                    @error('question')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Answer / Description --}}
                <div class="mb-3">

                    <label for="answer" class="form-label fw-semibold">
                        Description
                        <span class="text-danger">*</span>
                    </label>

                    <textarea
                        id="answer"
                        name="answer"
                        class="form-control @error('answer') is-invalid @enderror"
                        rows="7"
                        placeholder="Enter abouts Us content..."
                        required>{{ old('answer', $item->answer) }}</textarea>

                    @error('answer')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <div class="row">

                    {{-- Sort Order --}}
                    <div class="col-md-6 mb-3">

                        <label for="sort_order" class="form-label fw-semibold">
                            Sort Order
                        </label>

                        <input
                            type="number"
                            id="sort_order"
                            name="sort_order"
                            class="form-control @error('sort_order') is-invalid @enderror"
                            min="0"
                            value="{{ old('sort_order', $item->sort_order ?? 0) }}"
                            placeholder="0"
                        >

                        @error('sort_order')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold d-block">
                            Status
                        </label>

                        <div class="form-check form-switch mt-2">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                role="switch"
                                id="status"
                                name="status"
                                value="1"
                                {{ old('status', $item->exists ? $item->status : true) ? 'checked' : '' }}
                            >

                            <label class="form-check-label" for="status">
                                Active
                            </label>

                        </div>

                    </div>

                </div>


                {{-- Buttons --}}
                <div class="d-flex gap-2 mt-3">

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>

                        {{ $item->exists ? 'Update' : 'Save' }}
                    </button>

                    <a href="{{ route('admin.abouts.index') }}"
                       class="btn btn-outline-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

