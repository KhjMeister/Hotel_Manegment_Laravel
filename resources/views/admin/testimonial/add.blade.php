@extends('admin.layout.app')

@section('heading','Add Testimonial')

@section('right_top_button')
<a href="{{ route('admin_testimonial_view') }}" class="button light">Back to testimonials</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">
        
        <div class="card-content">
            <form method="POST" action="{{ route('admin_testimonial_submit') }}" enctype="multipart/form-data">
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
                    <label class="label">Name</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" placeholder="Name" name="name">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="field">
                    <label class="label">Designation</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" placeholder="Heading" name="designation">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>
                

                <div class="field">
                    <label class="label">Comment</label>
                    <div class="control">
                        <textarea name="comment" class="input" type="text" class="textarea" placeholder="Comment"></textarea>
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