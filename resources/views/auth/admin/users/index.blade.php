@extends('layouts.auth.main')
@section('title','Dashboard Manage Users')
@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Users</h6>
            </div>
            <div class="card-body">
                @can('create-user')
                <a href="{{ route('users.create') }}" class="btn btn-success btn-sm my-2"><i
                        class="bi bi-plus-circle"></i> Add New
                    Users</a>
                @endcan
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Updated</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key => $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-eye"></i> Show</a>
                                        {{-- Edit Users --}}
                                        @can('edit-user')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan
                                        {{-- Delete Users --}}
                                        @can('delete-user')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this user?');"><i
                                                class="bi bi-trash"></i>
                                            Delete</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="3">
                                <span class="text-danger">
                                    <strong>No Users Found!</strong>
                                </span>
                            </td>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Updated</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>


                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection