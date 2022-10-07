@extends('admin.layout.app')

@section('heading','Add Post')

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
            <form method="POST" action="{{ route('admin_post_submit') }}" enctype="multipart/form-data">
                @csrf
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
                                <input class="input" type="text" placeholder="Heading" name="heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="field">
                    <label class="label">Short Content</label>
                    <div class="control">
                        <textarea name="short_content" class="ckeditor input" type="text" class="textarea"
                            placeholder="short content" rows="2"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea name="content" class="ckeditor input" type="text" class="textarea"
                            placeholder="Content" row="3"></textarea>
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