@extends('layouts.auth.main')
@section('title','Dashboard Manage Camps')
@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Camps</h6>
            </div>
            <div class="card-body">
                @include('components.flash-message')
                @can('create-camp')
                <a href="{{ route('camps.create') }}" class="btn btn-success btn-sm my-2"><i
                        class="bi bi-plus-circle"></i> Add New
                    Camps</a>
                @endcan
                <a href="{{ route('camps.trash') }}" class="btn btn-primary btn-sm my-2"><i
                        class="bi bi-plus-circle"></i>Trash
                    Camps</a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Price</th>
                                <th scope="col">Desc</th>
                                <th scope="col">Updated</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($camp as $key => $c )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $c->title }}</td>
                                <td>{!! Str::limit($c->slug,50) !!}</td>
                                <td>{{ $c->price }}</td>
                                <td>{!! Str::limit($c->desc,9) !!}</td>
                                <td>{{ $c->updated_at }}</td>
                                <td>
                                    <form action="{{ route('camps.destroy', $c->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        {{-- <a href="{{ route('camps.show', $c->slug) }}"
                                            class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a> --}}
                                        {{-- Edit Users --}}
                                        @can('edit-camp')
                                        <a href="{{ route('camps.edit', $c->id) }}" class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan
                                        {{-- Delete Users --}}
                                        @can('delete-camp')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this Camps?');"><i
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
                                <th scope="col">Slug</th>
                                <th scope="col">Price</th>
                                <th scope="col">Updated</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>


                    {{ $camp->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection