@extends('admin.layout.app')

@section('heading','Edit Post')

@section('page_scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection

@section('right_top_button')
<a href="{{ route('admin_post_view') }}" class="button light">Back to Posts</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_post_update',$single_post->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="image w-48  mx-auto">
                    <img src="{{ asset('uploads/posts/'.$single_post->photo) }}" alt="pic" class="full">
                </div>
                <div class="field">
                    <label class="label">Photo</label>
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
                                <input value="{{ $single_post->heading }}" class="input" type="text"
                                    placeholder="Heading" name="heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="field">
                    <label class="label">Short Content</label>
                    <div class="control">
                        <textarea name="short_content" class="ckeditor input" type="text" class="textarea"
                            placeholder="short content">{{ $single_post->short_content }}</textarea>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea name="content" class="ckeditor input" type="text" class="textarea"
                            placeholder="Text">{{ $single_post->content }}</textarea>
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