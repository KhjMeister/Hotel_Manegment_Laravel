@extends('admin.layout.app')

@section('heading','Rooms')

@section('right_top_button')
<a href="{{ route('admin_room_add') }}" class="button green">Add New</a>
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
                                <a href="#" class="button small blue " type="button">
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
                    <div id="sample-modal-{{ $i }}" class="modal modal-xl">
                        <div class="modal-background --jb-modal-close"></div>
                        <div class="modal-card" style="width: 68% !important;">
                            <header class="modal-card-head">
                                <p class="modal-card-title">Room Detail</p>
                            </header>
                            <section class="modal-card-body">
                                <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
                                <p>This is sample modal</p>
                            </section>
                            <footer class="modal-card-foot">
                                <button class="button --jb-modal-close">Cancel</button>
                                <button class="button blue --jb-modal-close">Confirm</button>
                            </footer>
                        </div>
                    </div>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
</section>



<div class="divider"></div>

@endsection