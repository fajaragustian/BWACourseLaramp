@extends('layouts.auth.main')
@section('title','Dashboard Manage Discounts')
@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @include('components.flash-message')
                <h6 class="m-0 font-weight-bold text-primary">Manage Discounts</h6>
            </div>
            <div class="card-body">

                @can('create-product')
                <a href="{{ route('discounts.create') }}" class="btn btn-success btn-sm my-2"><i
                        class="bi bi-plus-circle"></i> Add New
                    Discount</a>
                @endcan
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Code</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Updated</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($discounts as $key => $d )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $d->name }}</td>
                                <td>{!! Str::limit($d->description,50) !!}</td>
                                <td>
                                    {{-- <span class="badge bg-primary text-light">{{ $d->code }}</span> --}}
                                    <strong class="text-primary">{{ $d->code }}</strong>
                                </td>
                                <td>
                                    <strong class="text-primary">{{ $d->percentage }}%</strong>
                                </td>
                                <td>{{ $d->updated_at }}</td>
                                <td>
                                    <form action="{{ route('discounts.destroy', $d->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        {{-- Edit Discount --}}
                                        @can('edit-product')
                                        <a href="{{ route('discounts.edit', $d->id) }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan
                                        {{-- Delete Discount --}}
                                        @can('delete-product')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this product?');"><i
                                                class="bi bi-trash"></i>
                                            Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="3">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Code</th>
                                <th scope="col">Percentage</th>
                                <th scope="col">Updated</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>


                    {{ $discounts->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection
