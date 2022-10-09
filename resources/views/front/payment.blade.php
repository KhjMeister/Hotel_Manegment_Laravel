@extends('front.layout.app')

@section('main_content')

<!-- ====== Banner Section Start -->
<div class="
   relative
   z-10
   pt-[30px]
   md:pt-[60px]
   lg:pt-[60px]
   pb-[35px]
   bg-primary
   overflow-hidden
 ">

    <div>
        <span class="absolute top-0 left-0 z-[-1]">
            <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
                <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white"
                    stroke-opacity="0.08" stroke-width="12" />
            </svg>
        </span>
        <span class="absolute top-0 right-0 z-[-1]">
            <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
                <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white"
                    stroke-opacity="0.06" stroke-width="13" />
            </svg>
        </span>
    </div>
</div>
<!-- ====== Banner Section End -->

<!-- ---- Checkout Wrapper--->

<form action="{{ route('payment_submit') }}" method="post">
    @csrf
    <div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4 ">
        <!-- ---- Checkout Form--->
        <div class="lg:col-span-8 border border-gray-300 px-4 py-4 rounded bg-gray-100">

            <h3 class="text-lg font-medium capitalize mb-4">Make Payment </h3>

            <div class="mb-6">

                <select name="method"
                    style="background-color: rgba(255,255,255,var(--tw-bg-opacity));--tw-bg-opacity: 1"
                    class="w-full select text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:border-primary focus:outline-none py-4">

                    <option >Select payment method</option>
                    <option value="1">Paypal</option>
                    <option value="2">Zarinpal</option>


                </select>
            </div>
            <div class="mb-6">

                <button type="submit"
                    class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent hover:text-primary transition text-sm w-full block text-center ">
                    Place Order
                </button>
            </div>



        </div>
        <div class="lg:col-span-4 border border-gray-300 px-4 py-4 rounded mt-6 lg:mt-0 bg-gray-100 ">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase ">Order Summary</h4>
            @php
            $arr_cart_room_id = array();
            $i=0;
            foreach(session()->get('cart_room_id') as $value) {
            $arr_cart_room_id[$i] = $value;
            $i++;
            }

            $arr_cart_checkin_date = array();
            $i=0;
            foreach(session()->get('cart_checkin_date') as $value) {
            $arr_cart_checkin_date[$i] = $value;
            $i++;
            }

            $arr_cart_checkout_date = array();
            $i=0;
            foreach(session()->get('cart_checkout_date') as $value) {
            $arr_cart_checkout_date[$i] = $value;
            $i++;
            }

            $arr_cart_adult = array();
            $i=0;
            foreach(session()->get('cart_adult') as $value) {
            $arr_cart_adult[$i] = $value;
            $i++;
            }

            $arr_cart_children = array();
            $i=0;
            foreach(session()->get('cart_children') as $value) {
            $arr_cart_children[$i] = $value;
            $i++;
            }

            $total_price = 0;
            @endphp
            @php
            for($i=0;$i<count($arr_cart_room_id);$i++) { $room_data=DB::table('rooms')->
                where('id',$arr_cart_room_id[$i])->first();
                @endphp
                <div class="space-y-2">
                    <div class=" flex justify-between">
                        <div>
                            <a class="text-gray-800 font-medium" href="{{ route('room_detail',$room_data->id) }}">
                                {{ $room_data->name }}
                            </a>

                        </div>
                        <p class="text-gray-600">
                            @php
                            $d1 = explode('-',$arr_cart_checkin_date[$i]);
                            $d2 = explode('-',$arr_cart_checkout_date[$i]);
                            $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
                            $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];

                            $t1 = strtotime($d1_new);
                            $t2 = strtotime($d2_new);
                            $diff = ($t2-$t1)/60/60/24;
                            echo $diff.' day';

                            @endphp
                        </p>
                        <p class="text-gray-600 font-medium">
                            @php
                            echo '$'.$room_data->price*$diff;
                            @endphp
                        </p>

                    </div>

                </div>
                @php
                $total_price = $total_price+($room_data->price*$diff);
                }
                @endphp
                <input name="total_price" value="{{ $total_price }}" type="text" hidden>
                <div class="flex justify-between border-b border-gray-300 mt-1">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Total</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">${{ $total_price }}</h4>
                </div>


                <h4 class="text-gray-800 text-lg mb-4 mt-2 font-medium uppercase ">Billing Details</h4>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Name</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_name') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Email</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_email') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Phone</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_phone') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Country</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_country') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Address</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_address') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">State</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_state') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">City</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_city') }}</h4>
                </div>
                <div class="flex justify-between  border-gray-300 ">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Zip</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">{{ session()->get('billing_zip') }}</h4>
                </div>


        </div>

    </div>
</form>



@endsection