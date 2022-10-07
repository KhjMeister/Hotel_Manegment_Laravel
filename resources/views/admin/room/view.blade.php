@extends('admin.layout.app')

@section('heading','Rooms')

@section('right_top_button')
<a href="{{ route('admin_room_add') }}" class="button green">Add New</a>
@endsection

@section('page_style')
<link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endsection

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

<section class="section main-section">

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-view-list"></i></span>
                Room
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Price (per night)</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=0; @endphp
                    @foreach ($rooms as $room)
                    @php $i++; @endphp

                    <tr>
                        <td data-label="Company">
                            <div class="image w-48  mx-auto">
                                <img src="{{ asset('uploads/rooms/'.$room->featured_photo) }}" alt="pic" class="full">
                            </div>
                        </td>
                        <td data-label="Company">{{ $room->name }}</td>
                        <td data-label="Company">${{ $room->price }}</td>


                        <td class="actions-cell">
                            <div class="buttons right nowrap">
                                <a href="#" class="button small green --jb-modal" data-target="sample-modal-{{ $i }}"
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                                </a>
                                <a href="{{ route('admin_room_gallery',$room->id) }}" class="button small blue "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-camera"></i></span>
                                </a>
                                <a href="{{ route('admin_room_edit',$room->id) }}" class="button small blue "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                                </a>
                                <a href="{{ route('admin_room_delete',$room->id) }}" class="button small red "
                                    type="button">
                                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <div id="sample-modal-{{ $i }}" class="modal ">
                        <div class="modal-background --jb-modal-close"></div>
                        <div class="modal-card" style="width: 68% !important;">
                            <header class="modal-card-head">
                                <p class="modal-card-title">Room Detail</p>
                            </header>
                            <section class="modal-card-content">
                                <div class="card mb-6">
                                    <header class="card-header">
                                        <p class="card-header-title">
                                            <span class="icon"><i class="mdi mdi-ballot"></i></span>
                                            {{ $room->name }}
                                        </p>
                                    </header>
                                    <div class="card-content">

                                        <div class="container pt-4 pb-6 grid lg:grid-cols-2 gap-6 ">

                                            <div>
                                                <div>
                                                    <img id="main-img"
                                                        src="{{ asset('uploads/rooms/'.$room->featured_photo) }}"
                                                        class="w-full" />
                                                </div>


                                            </div>

                                            <div>
                                                <h2 class="md:text-3xl text-2xl font-medium uppercase mb-2"></h2>
                                                <div class="flex items-center mb-4">

                                                </div>

                                                <div class="space-y-2">
                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span>Total Rooms : </span>
                                                        <span class="text-green-600">{{ $room->total_rooms }} </span>
                                                    </p>

                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span>Size : </span>
                                                        <span class="text-gray-600">{{ $room->size }} </span>
                                                    </p>

                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span>Total Beds : </span>
                                                        <span class="text-gray-600">{{ $room->total_beds }} </span>
                                                    </p>

                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span>Total Bathrooms : </span>
                                                        <span class="text-gray-600"> {{ $room->total_bathrooms }}
                                                        </span>
                                                    </p>
                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span>Total Balconies : </span>
                                                        <span class="text-gray-600"> {{ $room->total_balconies }}
                                                        </span>
                                                    </p>
                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span>Total Guests : </span>
                                                        <span class="text-gray-600"> {{ $room->total_guests }} </span>
                                                    </p>
                                                    <p class="text-gray-800 font-semibold space-x-2 ">
                                                        <span> amenities: </span>
                                                        <span class="text-gray-600">
                                                            <div>
                                                                @php
                                                                $arr = explode(',',$room->amenities);
                                                                for($j=0;$j<count($arr);$j++) {
                                                                    $temp_row=\App\Models\Amenity::where('id',$arr[$j])->
                                                                    first();
                                                                    echo $temp_row->name.',';
                                                                    }
                                                                    @endphp
                                                            </div>
                                                        </span>
                                                    </p>
                                                </div>

                                                <div class="mt-4 flex items-baseline gap-3 ">
                                                    <span class="text-primary font-semibold text-xl ">${{ $room->price
                                                        }}</span>
                                                    <span class="text-gray-500 text-base line-through">${{
                                                        $room->price+20 }}</span>
                                                </div>
                                                <p class="mt-4 text-gray-600">
                                                    {{ $room->description }}
                                                </p>






                                            </div>



                                        </div>

                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                    @endforeach


                </tbody>
            </table>
            {{ $rooms->links('vendor.pagination.admin') }}

        </div>
    </div>
</section>



<div class="divider"></div>

@endsection


{{-- <section class="modal-card-body">
    <div class="grid gap-3 grid-cols-1 md:grid-cols-3 mb-2">




        <div class="grid gap-63 grid-cols-1 md:grid-cols-3 mb-2">




        </div>
</section> --}}