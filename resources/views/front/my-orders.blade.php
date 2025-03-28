@extends('front.layout.layout')

@section('content')
<!-- Page Header Start -->
<div class="page-header mb-0">
            <div class="container">
                <div class="row">
                    
                    <div class="col-12">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{url('/customer/account')}}">My Account</a>
                    </div>
                </div>
            </div>
</div>

<div class="container mt-5">
    <h2 class="text-center mb-4">My Orders ({{ $orders->count() }})</h2>

    @if ($orders->isEmpty())
        <div class="alert alert-warning text-center">
            You have not placed any orders yet.
        </div>
    @else
        @foreach ($orders as $order)
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Order #{{ $order->id }}</h5>
                    <p class="mb-1"><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
                    <p class="mb-1"><strong>Status:</strong> 
                        <span class="badge 
                            @if($order->status == 'Order Placed') badge-primary 
                            @elseif($order->status == 'Pending') badge-warning 
                            @elseif($order->status == 'Preparing') badge-info 
                            @elseif($order->status == 'Ready') badge-success 
                            @elseif($order->status == 'Delivered') badge-dark 
                            @endif">
                            {{ $order->status }}
                        </span>
                    </p>
                    <p class="mb-1"><strong>Total Items:</strong> {{ $order->orderItems->sum('quantity') }}</p>
                    <p class="mb-1"><strong>Total Price:</strong> ₹{{ number_format($order->total_price, 2) }}</p>
                    
                    <button class="btn btn-outline-warning mt-2" type="button" data-toggle="collapse" data-target="#orderDetails{{ $order->id }}">
                        View Order Details
                    </button>

                    <div class="collapse mt-3" id="orderDetails{{ $order->id }}">
                        <ul class="list-group">
                            @foreach ($order->orderItems as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->foodItem->name }} (x{{ $item->quantity }})
                                    <span>₹{{ number_format($item->subtotal, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
