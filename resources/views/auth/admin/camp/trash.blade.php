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
                <h6 class="m-0 font-weight-bold text-primary">Manage Trash Camps</h6>
            </div>
            <div class="card-body">
                @include('components.flash-message')
                @can('list-camp')
                <a href="{{ route('camps.index') }}" class="btn btn-success btn-sm my-2"><i
                        class="bi bi-plus-circle"></i>Manage Camps</a>
                @endcan

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Price</th>
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
                                <td>{{ $c->updated_at }}</td>
                                <td>
                                    <div class="row pl-3 mr-2">
                                        <form action="{{ route('camps.restore',$c->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm mr-2"
                                                onclick="return confirm('Do you want to delete Restore this Camps?');"><i
                                                    class="bi bi-trash"></i>
                                                Restore</button>
                                        </form>
                                        <form action="{{ route('camps.forceDelete', $c->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            {{-- Delete Permanent Users --}}
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Do you want to delete Permanently this Camps?');"><i
                                                    class="bi bi-trash"></i>
                                                Delete</button>
                                        </form>
                                    </div>

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