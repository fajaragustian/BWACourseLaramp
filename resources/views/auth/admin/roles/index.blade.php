@extends('layouts.auth.main')
@section('title','Dashboard Manage Roles')
@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manage Roles</h6>
            </div>
            <div class="card-body">

                @can('create-role')
                <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm my-2"><i
                        class="bi bi-plus-circle"></i> Add New
                    Role</a>
                @endcan
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-eye"></i> Show</a>

                                        @if ($role->name!='Super Admin')
                                        @can('edit-role')
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i
                                                class="bi bi-pencil-square"></i> Edit</a>
                                        @endcan

                                        @can('delete-role')
                                        @if ($role->name!=Auth::user()->hasRole($role->name))
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Do you want to delete this role?');"><i
                                                class="bi bi-trash"></i>
                                            Delete</button>
                                        @endif
                                        @endcan
                                        @endif

                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td colspan="3">
                                <span class="text-danger">
                                    <strong>No Role Found!</strong>
                                </span>
                            </td>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>


                    {{ $roles->links() }}
                </div>
            </div>
        </div>
    </div>
    @endsection