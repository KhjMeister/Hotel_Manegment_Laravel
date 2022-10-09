@extends('customer.layout.app')

@section('heading','Invoice')

@section('page_style')

<link rel="stylesheet" href="{{ asset('css/invoice.css') }}">

@endsection

@section('main_content')


<section class=" ">
    <div class="max-w-5xl mx-auto py-16 bg-white">
        <article class="overflow-hidden">
            <div class="bg-[white] rounded-b-md">
                <div class="p-9">

                </div>
                <div class="p-9">
                    <div class="flex w-full">
                        <div class="grid grid-cols-4 gap-12">
                            <div class="text-sm font-light text-slate-500">
                                <p class="text-sm font-normal text-slate-700">
                                    Invoice Detail:
                                </p>
                                <p>{{ Auth::guard('customer')->user()->name }}</p>
                                <p>{{ Auth::guard('customer')->user()->address }}</p>
                                <p>{{ Auth::guard('customer')->user()->state }}</p>
                                <p>{{ Auth::guard('customer')->user()->city }}</p>
                                <p>{{ Auth::guard('customer')->user()->zip }}</p>
                            </div>

                            <div class="text-sm font-light text-slate-500">
                                <p class="text-sm font-normal text-slate-700">Invoice Number</p>
                                <p>#{{ $order->order_no }}</p>

                                <p class="mt-2 text-sm font-normal text-slate-700">
                                    Date of Issue
                                </p>
                                <p>{{ $order->booking_date }}</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="p-9">
                    <div class="flex flex-col mx-0 mt-8">
                        <table class="min-w-full divide-y divide-slate-500">
                            <thead>
                                <tr>
                                    <th>SL</th>

                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-normal text-slate-700 sm:pl-6 md:pl-0">
                                        Room Name
                                    </th>
                                    <th scope="col"
                                        class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                        Checkin Date
                                    </th>
                                    <th scope="col"
                                        class="hidden py-3.5 px-3 text-right text-sm font-normal text-slate-700 sm:table-cell">
                                        Checkout Date
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                        Number of Adult
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                        Number of Children
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 pl-3 pr-4 text-right text-sm font-normal text-slate-700 sm:pr-6 md:pr-0">
                                        Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach($order_detail as $item)
                                @php
                                $room_data = \App\Models\Room::where('id',$item->room_id)->first();
                                @endphp
                                <tr class="border-b border-slate-200">
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="py-4 pl-4 pr-3 text-sm sm:pl-6 md:pl-0">
                                        <div class="font-medium text-slate-700">{{ $room_data->name }}</div>

                                    </td>
                                    <td class="text-center">{{ $item->checkin_date }}</td>
                                    <td class="text-center">{{ $item->checkout_date }}</td>
                                    <td class="text-center">{{ $item->adult }}</td>
                                    <td class="text-center">{{ $item->children }}</td>
                                    <td class="text-right">
                                        @php
                                        $d1 = explode('-',$item->checkin_date);
                                        $d2 = explode('-',$item->checkout_date);
                                        $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                                        $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];
                                        $t1 = strtotime($d1_new);
                                        $t2 = strtotime($d2_new);
                                        $diff = ($t2-$t1)/60/60/24;
                                        $sub = $room_data->price*$diff;
                                        @endphp
                                        ${{ $sub }}
                                    </td>
                                </tr>
                                @php
                                $total += $sub;
                                @endphp
                                @endforeach

                            </tbody>
                            <tfoot>



                                <tr>
                                    <th scope="row" colspan="3"
                                        class="hidden pt-4 pl-6 pr-3 text-sm font-normal text-right text-slate-700 sm:table-cell md:pl-0">
                                        Total
                                    </th>
                                    <th scope="row"
                                        class="pt-4 pl-4 pr-3 text-sm font-normal text-left text-slate-700 sm:hidden">
                                        Total
                                    </th>
                                    <td
                                        class="pt-4 pl-3 pr-4 text-sm font-normal text-right text-slate-700 sm:pr-6 md:pr-0">
                                        ${{ $total }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </article>
    </div>
</section>




@endsection