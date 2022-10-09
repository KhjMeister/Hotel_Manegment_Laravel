@extends('front.layout.app')

@section('main_content')

<!-- ====== Banner Section Start -->
<div class="
   relative
   z-10
   pt-[120px]
   md:pt-[130px]
   lg:pt-[160px]
   pb-[100px]
   bg-primary
   overflow-hidden`
 ">
  <div class="container">
    <div class="flex flex-wrap items-center -mx-4">
      <div class="w-full px-4">
        <div class="text-center">
          <h1 class="font-semibold text-white text-4xl">Cart</h1>
        </div>
      </div>
    </div>
  </div>
  <div>
    <span class="absolute top-0 left-0 z-[-1]">

    </span>
    <span class="absolute top-0 right-0 z-[-1]">

    </span>
  </div>
</div>
<!-- ====== Banner Section End -->




@if(session()->has('cart_room_id'))
<div class="container gap-6 pb-16 pt-4 ">

  <div>

    <div class="bg-gray-200 py-2 pl-12 pr-20 xl:pr-28 mb-4 hidden md:flex ">
      <p class="text-gray-600 ">Photo</p>
      <p class="text-gray-600 " style="margin-left:9.5rem">Info</p>
      <p class="text-gray-600 " style="margin-left:6.5rem">Price/Night</p>
      <p class="text-gray-600 " style="margin-left:6rem">Checkin</p>
      <p class="text-gray-600 " style="margin-left:7.5rem">Checkout</p>
      <p class="text-gray-600 " style="margin-left:7.5rem">Guests</p>
      <p class="text-gray-600 " style="margin-left:7rem">Subtotal</p>
      <p class="text-gray-600 " style="margin-left:3.5rem">Action</p>

    </div>


    <div class="space-y-4">
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
        <div
          class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap bg-gray-100 ">
          <div class="w-32 flex-shrink-0">
            <img src="{{ asset('uploads/rooms/'.$room_data->featured_photo) }}" class="w-full" />
          </div>
          <div class="ml-auto md:ml-0">
            <a class="font-semibold" href="{{ route('room_detail',$room_data->id) }}">{{ $room_data->name
              }}</a>
          </div>
          <div class="ml-auto md:ml-0 ">
            <p class="font-semibold">${{ $room_data->price }}</p>
          </div>
          <div class="ml-auto md:ml-0">
            <p class="text-lg font-semibold ">{{ $arr_cart_checkin_date[$i] }}</p>
          </div>
          <div class="ml-auto md:ml-0">
            <p class="text-lg font-semibold ">{{ $arr_cart_checkout_date[$i] }}</p>
          </div>
          <div class="ml-auto md:ml-0">
            <p class="text-lg font-semibold ">Adult: {{ $arr_cart_adult[$i] }}</p>
            <p class="text-lg font-semibold ">Children: {{ $arr_cart_children[$i] }}</p>
          </div>
          <div class="ml-auto md:ml-0">
            <p class="text-lg font-semibold ">
              @php
              $d1 = explode('-',$arr_cart_checkin_date[$i]);
              $d2 = explode('-',$arr_cart_checkout_date[$i]);
              $d1_new = $d1[2].'-'.$d1[1].'-'.$d1[0];
              $d2_new = $d2[2].'-'.$d2[1].'-'.$d2[0];

              $t1 = strtotime($d1_new);
              $t2 = strtotime($d2_new);
              $diff = ($t2-$t1)/60/60/24;
              echo '$'.$room_data->price*$diff;
              @endphp
            </p>
          </div>
          <div class="ml-auto md:ml-0">
            <a href="{{ route('cart_delete',$arr_cart_room_id[$i]) }}" class="text-gray-600 hover:cursor-pointer ">
              X
            </a>
          </div>


        </div>
        @php
        $total_price = $total_price+($room_data->price*$diff);
        }
        @endphp
    </div>
    <div class="space-y-4">
      <div
        class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap bg-gray-100 ">
        <div></div>
        <div class="xl:col-span-3 lg:col-span-4 border border-gray-200 px-4 py-4 rounded mt-6 lg:mt-0 bg-gray-100">

          <div class="flex justify-between my-3 text-gray-800 font-semibold uppercase">
            <h4>Total</h4>
            <h4>${{ $total_price }}</h4>
          </div>

          <a href="{{ route('checkout') }}"
            class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent hover:text-primary transition text-sm w-full block text-center ">
            Checkout
          </a>


        </div>

      </div>
    </div>
  </div>




</div>
@else
<div class="container gap-6 pb-16 pt-4 ">

  <div>

    <div class="space-y-4">
      <div class=" items-center  p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap bg-gray-100 ">
        <h3 class="text-gray-800 text-xl mb-4 font-medium uppercase ">Cart is Empty</h3>

      </div>

    </div>
    <div class="space-y-4">
      <div
        class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap bg-gray-100 ">
        <div></div>
        <div class="xl:col-span-3 lg:col-span-4 border border-gray-200 px-4 py-4 rounded mt-6 lg:mt-0 bg-gray-100">

          <div class="flex justify-between my-3 text-gray-800 font-semibold uppercase">
            <h4>Total: &nbsp;</h4>
            <h4>$0</h4>
          </div>




        </div>

      </div>
    </div>
  </div>




</div>


@endif

@endsection