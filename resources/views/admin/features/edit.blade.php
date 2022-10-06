@extends('admin.layout.app')

@section('heading','Edit Feature')

@section('right_top_button')
<a href="{{ route('admin_feature_view') }}" class="button light">Back to Features</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_feature_update',$single_feature->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="image w-48  mx-auto">
                    <div class="bg-white mb-12 group wow fadeInUp" data-wow-delay=".1s"
                        style="visibility: visible; animation-delay: 0.1s;">
                        <div
                            class="w-[70px] h-[70px] flex items-center justify-center bg-primary rounded-2xl mb-8 relative z-10">
                            <span
                                class="w-[70px] h-[70px] flex items-center justify-center bg-primary bg-opacity-20 rounded-2xl mb-8 absolute z-[-1] top-0 left-0 rotate-[25deg] group-hover:rotate-45 duration-300"></span>
                            <img style="background-color: #3056D3 !important;"
                                src="{{ asset('uploads/features/'.$single_feature->icon) }}" alt="pic" class="full">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Icon</label>
                    <div class="field-body">
                        <div class="field file">
                            <label class="upload control">
                                <a class="button blue">
                                    Upload
                                </a>
                                <input type="file" name="icon">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Heading</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_feature->heading }}" class="input" type="text"
                                    placeholder="Heading" name="heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="field">
                    <label class="label">Text</label>
                    <div class="control">
                        <textarea name="text" class="input" type="text" class="textarea"
                            placeholder="Text">{{ $single_feature->text }}</textarea>
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