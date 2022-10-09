@extends('admin.layout.app')

@section('heading','Orders')


@section('main_content')

<section class="section main-section">


    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                orders
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Order No</th>
                        <th>Payment Method</th>
                        <th>Booking Date</th>
                        <th>Paid Amount</th>
                        <th>Action</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td data-label="Company">{{ $loop->iteration }}</td>
                        <td data-label="Company">{{ $order->order_no }}</td>
                        <td data-label="Company">{{ $order->payment_method }}</td>
                        <td data-label="Company">{{ $order->booking_date }}</td>
                        <td data-label="Company">${{ $order->paid_amount }}</td>

                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="{{ route('admin_invoice',$order->id) }}" class="button small green "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </a>
                                <a href="{{ route('admin_order_delete',$order->id) }}" class="button small red "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $orders->links('vendor.pagination.admin') }}

        </div>
    </div>
</section>


<div class="divider"></div>

@endsection