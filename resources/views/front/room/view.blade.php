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

<!-- ---- Shop Wrapper --->
<div class="container grid lg:grid-cols-4 sm:grid-cols-1 gap-6 pt-4 pb-16 items-start relative">
    <!-- ---- Sidebar --->
    <div
        class="col-span-1 bg-gray-100 px-4 pt-4 pb-6 shadow-sm rounded overflow-hidden absolute lg:static left-4 top-16 z-10 w-72 lg:w-full lg:block">
        <div class="divide-gray-300 divide-y space-y-5 relative">
            <!-- ---- Category filter --->
            <div class="relative">
                <div class="lg:hidden text-gray-400 hover:text-primary text-lg absolute right-0 top-0 cursor-pointer ">
                </div>
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Categories </h3>
                <div class="space-y-2">
                    <!-- ----Single Category  --->
                    <div class="flex items-center">
                        <input type="checkbox" id="Bedroom"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer " />
                        <label for="Bedroom" class="text-gray-600 ml-3 cursor-pointer  ">Vip Rooms</label>
                        <div class="ml-auto text-gray-600 text-sm ">(3)</div>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="Office"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer " />
                        <label for="Office" class="text-gray-600 ml-3 cursor-pointer  ">Cuple Rooms</label>
                        <div class="ml-auto text-gray-600 text-sm ">(4)</div>
                    </div>
                </div>
            </div>
            <!-- ---- End Categoryfilter --->
            <div class="relative">
                <div class="lg:hidden text-gray-400 hover:text-primary text-lg absolute right-0 top-0 cursor-pointer ">
                </div>
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Available </h3>
                <div class="space-y-2">
                    <!-- ----Single Category  --->
                    <div class="flex items-center">
                        <input type="checkbox" id="Bedroom"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer " />
                        <label for="Bedroom" class="text-gray-600 ml-3 cursor-pointer  ">First</label>
                        <div class="ml-auto text-gray-600 text-sm ">(3)</div>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="Office"
                            class="text-primary focus:ring-0 rounded-sm cursor-pointer " />
                        <label for="Office" class="text-gray-600 ml-3 cursor-pointer  ">Latest</label>
                        <div class="ml-auto text-gray-600 text-sm ">(4)</div>
                    </div>
                </div>
            </div>


            <!-- ---- Price filter --->
            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium ">Price </h3>

                <div class="mt-4 flex items-center ">
                    <input type="text"
                        class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded "
                        placeholder="Min" />
                    <span class="mx-3 text-gray-500"> - </span>
                    <input type="text"
                        class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded "
                        placeholder="Mix" />
                </div>
            </div>
            <!-- ---- End Price filter --->


        

            <!-- ---- End Color filter --->

        </div>

    </div>

    <!-- ---- End Sidebar --->

    <!-- ---- Product --->
    <div class="col-span-3 sm:grid-cols-1">
        <!-- ---- Shorting --->
        <div class="mb-4 flex items-center ">
            <select
                class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary ">
                <option>Latest product</option>
                <option>Price low-high</option>
                <option>Price high-low</option>
            </select>

        </div>

        <!-- ----End Shorting --->


        <!-- ---Product Wrapper --->
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 sm:grid-cols-1 gap-6">

            @foreach ($room_all as $room)

            <div class="group rounded bg-white shadow overflow-hidden ">
                <div class="relative ">
                    <img src="{{ asset('uploads/rooms/'.$room->featured_photo) }}" class="w-full"
                        style="height:180px!important;" />

                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition ">
                        <a href="{{ route('room_detail',$room->id) }}"
                            class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex  items-center justify-center ">
                            <svg width="20" height="12" viewBox="0 0 20 12" class="fill-current">
                                <path
                                    d="M10.2559 3.8125C9.03711 3.8125 8.06836 4.8125 8.06836 6C8.06836 7.1875 9.06836 8.1875 10.2559 8.1875C11.4434 8.1875 12.4434 7.1875 12.4434 6C12.4434 4.8125 11.4746 3.8125 10.2559 3.8125ZM10.2559 7.09375C9.66211 7.09375 9.16211 6.59375 9.16211 6C9.16211 5.40625 9.66211 4.90625 10.2559 4.90625C10.8496 4.90625 11.3496 5.40625 11.3496 6C11.3496 6.59375 10.8496 7.09375 10.2559 7.09375Z">
                                </path>
                                <path
                                    d="M19.7559 5.625C17.6934 2.375 14.1309 0.4375 10.2559 0.4375C6.38086 0.4375 2.81836 2.375 0.755859 5.625C0.630859 5.84375 0.630859 6.125 0.755859 6.34375C2.81836 9.59375 6.38086 11.5312 10.2559 11.5312C14.1309 11.5312 17.6934 9.59375 19.7559 6.34375C19.9121 6.125 19.9121 5.84375 19.7559 5.625ZM10.2559 10.4375C6.84961 10.4375 3.69336 8.78125 1.81836 5.96875C3.69336 3.1875 6.84961 1.53125 10.2559 1.53125C13.6621 1.53125 16.8184 3.1875 18.6934 5.96875C16.8184 8.78125 13.6621 10.4375 10.2559 10.4375Z">
                                </path>
                            </svg>
                        </a>

                    </div>
                </div>

                <div class="pt-4 pb-3 px-4 ">
                    <a href="view.html">
                        <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition ">
                            {{ $room->name }} </h4>
                    </a>

                    <div class="flex items-baseline mb-1 space-x-2 ">
                        <p class="text-xl text-primary font-roboto font-semibold "> ${{ $room->price }} per night</p>
                        <p class="text-sm text-gray-400 font-roboto  line-through "> ${{ $room->price+20 }} </p>
                    </div>

                </div>


            </div>
            @endforeach




            <!-- ---- End Single Product  ----- -->

        </div>

        <!-- --End Product Wrapper --->
        <div dir="rtl" class="mt-6">

            {{ $room_all->links() }}
        </div>
    </div>

    <!-- ---- End Product --->

</div>

<!-- ---- End Shop Wrapper --->




@endsection