@extends('admin.layout.app')

@section('heading','Edit Slide')

@section('right_top_button')
<a href="{{ route('admin_slide_view') }}" class="button light">Back to Slide</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">
        
        <div class="card-content">
            <form method="POST" action="{{ route('admin_slide_update',$single_slide->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="image w-48  mx-auto">
                    <img src="{{ asset('uploads/slides/'.$single_slide->photo) }}" alt="pic" class="full">
                </div>
                <div class="field">
                    <label class="label">Picture</label>
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
                <div class="field">
                    <label class="label">Heading</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_slide->heading }}" class="input" type="text" placeholder="Heading" name="heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                

                <div class="field">
                    <label class="label">Text</label>
                    <div class="control">
                        <textarea name="text" class="input" type="text" class="textarea" placeholder="Text">{{ $single_slide->text }}</textarea>
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