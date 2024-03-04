@extends('layouts.auth.main')
@section('title','Dashboard Transactions')
@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Transaction</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Camp</th>
                                <th scope="col">Created</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($checkout as $key => $p )
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->camp->title }}</td>
                                <td>{{$p->created_at->format('M d, Y')}}</td>
                                <td>Rp.{{ $p->total }}
                                    @if ($p->discount_id)
                                    <span class="badge bg-success text-light"> Disc {{ $p->discount_percentage
                                        }}%</span>

                                    @endif
                                </td>
                                <td>
                                    @if ($p->payment_status == 'paid')
                                    <strong class="text-primary"> Success Payment </strong>
                                    @elseif($p->payment_status == 'expired')
                                    <strong class="text-danger">Failed for Payment</strong>
                                    @else
                                    <strong class="text-warning">Waiting for Payment</strong>
                                    @endif
                                </td>
                                <td>
                                    @if ($p->payment_status == 'paid')
                                    <a href="#" class="btn btn-primary">
                                        Get Invoice
                                    </a>
                                    @else
                                    <a href="#" class="btn btn-primary text-white">
                                        Delete
                                    </a>
                                    @endif





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
                                <th scope="col">Camp</th>
                                <th scope="col">Created</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $checkout->links() }}
                </div>
            </div>
        </div>
    </div>

    @endsection