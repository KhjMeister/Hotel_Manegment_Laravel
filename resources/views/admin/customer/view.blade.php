@extends('admin.layout.app')

@section('heading','Customers')





@section('main_content')

<section class="section main-section">




    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                Customers
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
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="image w-48  mx-auto">
                                @if($row->photo!='')
                                <img style="height: 120px !important;" src="{{ asset('uploads/'.$row->photo) }}" alt="pic"
                                    class=" rounded-full">
                                @else
                                <img src="{{ asset('uploads/admin.png') }}" alt="" class="w_100">
                                @endif
                            </div>

                        </td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <a href="" class="btn btn-success"></a>
                        <a href="" class="btn btn-danger"></a>

                        <td class="actions-cell">

                            <div class="buttons right nowrap">
                                @if($row->status == 1)

                                <a href="{{ route('admin_customer_change_status',$row->id) }}" class="button  green "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline">Active</i></span>
                                </a>
                                @else
                                <a href="{{ route('admin_customer_change_status',$row->id) }}" class="button  red "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can">Pending</i></span>
                                </a>
                                @endif

                            </div>
                        </td>
                    </tr>
                    @endforeach



                </tbody>
            </table>
            {{ $customers->links('vendor.pagination.admin') }}

        </div>
    </div>
</section>



<div class="divider"></div>

@endsection