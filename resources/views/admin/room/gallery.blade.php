@extends('admin.layout.app')

@section('heading','Edit Room')
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

@section('right_top_button')
<a href="{{ route('admin_room_view') }}" class="button light">Back to Room</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Gallery
            </p>
        </header>
        <div class="card-content">
            <!-- ---- Product View /////////////////////////////////////////////////////////////// - -->
            <div class="container pt-4 pb-6 grid lg:grid-cols-2 gap-6 ">
                <!-- ---- Product Image  --->
                <div>
                    <div>
                        <img id="main-img" src="{{ asset('uploads/rooms/'.$room_data->featured_photo) }}"
                            class="w-full" />
                    </div>

                    <div class="grid grid-cols-5 gap-4 mt-4 ">
                        @foreach($room_photos as $row)
                        <div>
                            <img src="{{ asset('uploads/rooms/'.$row->photo) }}" style="height:60%;"
                                class="single-img w-full cursor-pointer border border-primary " />
                            <a href="{{ route('admin_room_gallery_delete',$row->id) }}" class="button small red "
                                type="button">
                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>


                <div>
                    <div class="flex items-center mb-4">

                    </div>

                    <div class="space-y-2">
                        <form method="POST" action="{{ route('admin_room_gallery_store',$room_data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="field">
                                <label class="label">Add new Photo</label>
                                <div class="field-body">
                                    <div class="field file">
                                        <label class="upload control">
                                            <a class="button blue">
                                                Upload
                                            </a>
                                            <input type="file" name="photo">
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="field grouped">
                                <div class="control">
                                    <button type="submit" class="button green">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>


    </div>


</section>


<div class="divider"></div>

@endsection