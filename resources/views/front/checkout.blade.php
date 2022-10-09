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

<form action="{{ route('payment') }}" method="post">
<div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4 ">
    <!-- ---- Checkout Form--->
        <div class="lg:col-span-8 border border-gray-300 px-4 py-4 rounded bg-gray-100">
            @csrf
            @php
            if(session()->has('billing_name')) {
            $billing_name = session()->get('billing_name');
            } else {
            $billing_name = Auth::guard('customer')->user()->name;
            }

            if(session()->has('billing_email')) {
            $billing_email = session()->get('billing_email');
            } else {
            $billing_email = Auth::guard('customer')->user()->email;
            }

            if(session()->has('billing_phone')) {
            $billing_phone = session()->get('billing_phone');
            } else {
            $billing_phone = Auth::guard('customer')->user()->phone;
            }

            if(session()->has('billing_country')) {
            $billing_country = session()->get('billing_country');
            } else {
            $billing_country = Auth::guard('customer')->user()->country;
            }

            if(session()->has('billing_address')) {
            $billing_address = session()->get('billing_address');
            } else {
            $billing_address = Auth::guard('customer')->user()->address;
            }

            if(session()->has('billing_state')) {
            $billing_state = session()->get('billing_state');
            } else {
            $billing_state = Auth::guard('customer')->user()->state;
            }

            if(session()->has('billing_city')) {
            $billing_city = session()->get('billing_city');
            } else {
            $billing_city = Auth::guard('customer')->user()->city;
            }

            if(session()->has('billing_zip')) {
            $billing_zip = session()->get('billing_zip');
            } else {
            $billing_zip = Auth::guard('customer')->user()->zip;
            }
            @endphp
            <h3 class="text-lg font-medium capitalize mb-4"> Checkout </h3>

            <div class="space-y-4">
                <div class="grid sm:grid-cols-2 gap-4 ">
                    <div>
                        <label class="block text-xs text-dark">Name <span class="text-primary">*</span>
                        </label>
                        <input name="billing_name" value="{{ $billing_name }}" type="text"
                            class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                    </div>

                    <div>
                        <label class="block text-xs text-dark">Email <span class="text-primary">*</span>
                        </label>
                        <input name="billing_email" value="{{ $billing_email }}" type="email"
                            class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                    </div>

                </div>

                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Phone Number <span class="text-primary">*</span>
                    </label>
                    <input name="billing_phone" value="{{ $billing_phone }}" type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Country <span class="text-primary">*</span>
                    </label>
                    <input name="billing_country" value="{{ $billing_country }}" type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Address <span class="text-primary">*</span>
                    </label>
                    <input name="billing_address" value="{{ $billing_address }}" type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">State <span class="text-primary">*</span>
                    </label>
                    <input name="billing_state" value="{{ $billing_state }}" type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">City <span class="text-primary">*</span>
                    </label>
                    <input name="billing_city" value="{{ $billing_city }}" type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Zip Code <span class="text-primary">*</span>
                    </label>
                    <input name="billing_zip" value="{{ $billing_zip }}" type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->

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

                <div class="flex justify-between border-b border-gray-300 mt-1">
                    <h4 class="text-gray-800 font-medium my-3 uppercase">Total</h4>
                    <h4 class="text-gray-800 font-medium my-3 uppercase">${{ $total_price }}</h4>
                </div>

                <div class="flex items-center mb-4 mt-2">
                    <input type="checkbox" id="agreement"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3 " />
                    <label for="agreement" class="text-gray-600 ml-3 cursor-pointer text-sm "> Agree to our <a href="#"
                            class="text-primary">terms & conditions</a> </label>

                </div>

                <button type="submit"
                    class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent hover:text-primary transition text-sm w-full block text-center ">
                    Place Order
                </button>

        </div>
        
    </div>
</form>



@endsection