@extends('front.layout.app')

@section('page_scripts')

<script>
    let mainImg = document.getElementById('main-img')
    let imgBars = document.getElementsByClassName('single-img')
    for(let imgBar of imgBars){
         imgBar.addEventListener('click', function(){
              clearActive()
              let imgPath = this.getAttribute('src')
              mainImg.setAttribute('src',imgPath)
              this.classList.add('border-primary')
         })
    }
    function clearActive(){
         for(let imgBar of imgBars){
              imgBar.classList.remove('border-primary')
         }
    }


</script>
@endsection


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

<!-- ---- Shop Wrapper --->
<div class="container grid lg:grid-cols-4 gap-6 pt-4 pb-16 items-start relative">
    <!-- ---- Sidebar --->
    <div
        class="col-span-1 bg-gray-100 px-4 pt-4 pb-6 shadow-sm rounded overflow-hidden absolute lg:static left-4 top-16 z-10 w-72 lg:w-full lg:block">
        <div class="divide-gray-300 divide-y space-y-5 relative">
            <form action="{{ route('cart_submit') }}" method="post">
                @csrf
                <div class="pt-4">

                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Reserve this Room </h3>
                    <input name="room_id" value="{{ $single_room_data->id }}" type="text" hidden>
                </div>

                <div class="pt-4">
                    <h3 class="text-sm text-gray-800 mb-3 uppercase font-medium ">Checkin and checkout </h3>

                    <div class="mt-4 flex items-center ">
                        <input name="checkin" type="date"
                            class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded "
                            placeholder="05/12/2021" />
                        <span class="mx-3 text-gray-500"> - </span>
                        <input name="checkout" type="date"
                            class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded "
                            placeholder="08/12/2021" />
                    </div>
                </div>


                <div class="pt-4">
                    <h3 class="text-sm text-gray-800 mb-3 uppercase font-medium ">Adults </h3>

                    <div class="mt-4 flex items-center ">
                        <input name="adult" type="text"
                            class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded "
                            placeholder="1" />
                    </div>
                    <h3 class="pt-6 text-sm text-gray-800 mb-3 uppercase font-medium ">children </h3>

                    <div class="mt-4 flex items-center ">
                        <input name="children" type="text"
                            class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded "
                            placeholder="3" />
                    </div>
                </div>

                <div class="pt-4">

                    <h3 class="pt-6 text-sm text-gray-800 mb-3 uppercase font-medium ">Total </h3>
                    <h3 class="text-xl"></h3>
                </div>
                <div class="pt-4">
                    <div class="flex gap-3 border-b border-gray-200 pb-5 mt-6 ">
                        <button type="submit"
                            class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase hover:bg-transparent hover:text-primary transition text-sm flex items-center ">
                            <span class="mr-2"><i class="fas fa-shopping-bag"></i> </span>
                            Reserve
                        </button>
                    </div>
                </div>
            </form>


        </div>

    </div>

    <!-- ---- End Sidebar --->

    <!-- ---- Product --->
    <div class="col-span-3 sm:grid-cols-1">
        <div class="mb-4 flex items-center ">
            <div class="flex gap-2 ml-auto ">
                <a href="{{ route('room') }}"
                    class="border border-gray-300 w-14 h-10 flex items-center justify-center text-gray-600 rounded cursor-pointer ">
                    Back
                </a>



            </div>

        </div>
        <!-- ---- Product View /////////////////////////////////////////////////////////////// - -->
        <div class="container pt-4 pb-6 grid lg:grid-cols-2 gap-6 ">
            <!-- ---- Product Image  --->
            <div>
                <div>
                    <img id="main-img" src="{{ asset('uploads/rooms/'.$single_room_data->featured_photo) }}"
                        class="w-full" />
                </div>

                <div class="grid grid-cols-5 gap-4 mt-4 ">
                    @foreach($single_room_data->rRoomPhoto as $item)
                    <div>
                        <img src="{{ asset('uploads/rooms/'.$item->photo) }}" style="height:80%;"
                            class="single-img w-full cursor-pointer border border-primary " />

                    </div>
                    @endforeach


                </div>
            </div>
            <!-- ---- End Product Image  --->

            <!-- ---- Product Content  --->
            <div>
                <h2 class="md:text-3xl text-2xl font-medium uppercase mb-2">{{ $single_room_data->name }}</h2>

                <div class="space-y-2">
                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span>Total Rooms : </span>
                        <span class="text-green-600">{{ $single_room_data->total_rooms }} </span>
                    </p>

                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span>Size : </span>
                        <span class="text-gray-600">{{ $single_room_data->size }} </span>
                    </p>

                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span>Total Beds : </span>
                        <span class="text-gray-600">{{ $single_room_data->total_beds }} </span>
                    </p>

                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span>Total Bathrooms : </span>
                        <span class="text-gray-600"> {{ $single_room_data->total_bathrooms }}
                        </span>
                    </p>
                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span>Total Balconies : </span>
                        <span class="text-gray-600"> {{ $single_room_data->total_balconies }}
                        </span>
                    </p>
                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span>Total Guests : </span>
                        <span class="text-gray-600"> {{ $single_room_data->total_guests }} </span>
                    </p>
                    <p class="text-gray-800 font-semibold space-x-2 ">
                        <span> amenities: </span>
                        <span class="text-gray-600">
                            <div>
                                @php
                                $arr = explode(',',$single_room_data->amenities);
                                for($j=0;$j<count($arr);$j++) { $temp_row=\App\Models\Amenity::where('id',$arr[$j])->
                                    first();
                                    echo $temp_row->name.',';
                                    }
                                    @endphp
                            </div>
                        </span>
                    </p>
                </div>

                <div class="mt-4 flex items-baseline gap-3 ">
                    <span class="text-primary font-semibold text-xl ">${{ $single_room_data->price
                        }} per night</span>
                    <span class="text-gray-500 text-base line-through">${{
                        $single_room_data->price+20 }} </span>
                </div>



            </div>

            <!-- ---- End Product Content  --->

        </div>

        <!-- ---- End Product View --->


        <!-- ---- Product Details  --->

        <div class="container pb-16">
            <h3 class="border-b border-gray-200 font-roboto text-gray-800 font-medium pb-3 ">Room Details </h3>

            <div class="lg:w-4/5 xl:w-3/5 pt-6">
                <div class="space-y-3 text-gray-600">
                    <p>
                        {{ $single_room_data->description }}
                    </p>

                </div>



            </div>

        </div>

        <!-- ---- End Product Details --->



    </div>

    <!-- ---- End Product --->

</div>

<!-- ---- End Shop Wrapper --->




@endsection