@extends('admin.layout.app')

@section('heading','Add Room')

@section('page_scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection

@section('right_top_button')
<a href="{{ route('admin_room_view') }}" class="button light">Back to Room</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">
        <div class="card-content ">
            <form method="POST" action="{{ route('admin_room_submit') }}" enctype="multipart/form-data">
                @csrf
                <div class="field">
                    <label class="label">Photo</label>
                    <div class="field-body">
                        <div class="field file">
                            <label class="upload control">
                                <a class="button blue">
                                    Upload
                                </a>
                                <input type="file" name="featured_photo">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ old('name') }}" class="input" type="text" placeholder="Name"
                                        name="name">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Guests</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ old('total_guests') }}" class="input" type="text"
                                        placeholder="Guests" name="total_guests">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea name="description" class="ckeditor input" type="text" class="textarea"
                            placeholder="Description" rows="2">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Amenities</label>
                    <div class="field-body">
                        <div class="field grouped multiline">
                            @php $i=0; @endphp
                            @foreach($all_amenities as $item)
                            @php $i++; @endphp
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" name="arr_amenities[]" value="{{ $item->id }}">
                                    <span class="check"></span>
                                    <span class="control-label">{{ $item->name }}</span>
                                </label>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">Price</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input w-full" type="text" placeholder="Price"
                                        value="{{ old('price') }}" name="price">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Total Rooms</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ old('total_rooms') }}" class="input w-full" type="text"
                                        placeholder="Total Rooms" name="total_rooms">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">Room Size</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ old('size') }}" class="input" type="text" placeholder="Room Size"
                                        name="size">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Beds</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Beds" value="{{ old('total_beds') }}"
                                        name="total_beds">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">Bathrooms</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Bathrooms"
                                        value="{{ old('total_bathrooms') }}" name="total_bathrooms">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Balconies</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" placeholder="Balconies"
                                        value="{{ old('total_balconies') }}" name="total_balconies">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button green">
                            Submit
                        </button>
                    </div>
                    <div class="control">
                        <button type="reset" class="button red">
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<div class="divider"></div>

@endsection