@extends('admin.layout.app')

@section('heading','Edit Amenity')

@section('page_scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection

@section('right_top_button')
<a href="{{ route('admin_amenity_view') }}" class="button light">Back to Amenity</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_amenity_update',$single_amenity->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="field">
                    <label class="label">Name</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_amenity->name }}" class="input" type="text" placeholder="Name"
                                    name="name">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                <hr>

                <div class="field grouped">
                    <div class="control">
                        <button type="submit" class="button blue">
                            Update
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