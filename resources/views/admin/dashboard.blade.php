@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4 card-header">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        All Bootcamps
                    </h2>
                </div>
            </div>
            <div class="card-body">
                @include('components.alert')
                <div class="row my-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Thumbnail</th>
                                <th>Camp</th>
                                <th>Price</th>
                                <th>Register Data</th>
                                <th>Paid Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($checkouts as $checkout)
                            <tr class="align-middle">
                                <td>{{ $checkout->user->name }}</td>
                                <td width="18%">
                                    <img src="{{ url('frontend/assets/images/item_bootcamp.png') }}" height="120" alt="">
                                </td>
                                <td>
                                    <strong>{{ $checkout->camp->title }}</strong>
                                </td>
                                <td>
                                    <strong>Rp.{{ $checkout->camp->price }}k</strong>
                                </td>
                                <td>{{ $checkout->created_at->format('M d Y') }}</td>
                                <td>
                                    @if ($checkout->is_paid)
                                        <span class="badge bg-success rounded-pill">Paid</span>
                                    @else
                                        <span class="badge bg-warning rounded-pill">Waiting</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$checkout->is_paid)
                                        <form action="{{ route('admin.checkout.update', $checkout->id) }}" method="post">
                                        @csrf
                                            <button class="btn btn-sm btn-primary">Set to Paid</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <h3>No Camp Registered</h3>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection