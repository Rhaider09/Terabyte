@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold mb-1">
            Testimonials
        </h1>

        <p class="text-muted mb-0">
            Manage customer testimonials and frontend visibility.
        </p>
    </div>

    <a
        class="btn btn-primary"
        href="{{ route('admin.testimonials.create') }}"
    >
        + Add Testimonial
    </a>

</div>


<div class="card mt-3">

    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead class="table-dark">

                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Message</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>

            </thead>


            <tbody>

                @forelse ($items as $i)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>


                        <td>
                            <strong>
                                {{ $i->name }}
                            </strong>
                        </td>


                        <td>
                            {{ $i->designation }}
                        </td>


                        <td style="max-width: 350px;">

                            {{ $i->message }}

                        </td>


                        <!-- Rating -->

                        <td>

                            <div class="text-warning">

                                @for ($star = 1; $star <= 5; $star++)

                                    @if ($star <= $i->rating)
                                        ★
                                    @else
                                        ☆
                                    @endif

                                @endfor

                            </div>

                            <small class="text-muted">
                                {{ $i->rating }}/5
                            </small>

                        </td>


                        <!-- Status -->

                        <td>

                            @if ($i->status == 1)

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        <!-- Actions -->

                        <td class="text-end">

                            <a
                                href="{{ route('admin.testimonials.edit', $i) }}"
                                class="btn btn-sm btn-outline-primary"
                            >
                                Edit
                            </a>


                            <form
                                class="d-inline"
                                method="POST"
                                action="{{ route('admin.testimonials.destroy', $i) }}"
                                onsubmit="return confirm('Are you sure you want to delete this testimonial?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="text-center py-5 text-muted"
                        >
                            No testimonials found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection
