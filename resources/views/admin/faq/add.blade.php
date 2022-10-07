@extends('admin.layout.app')

@section('heading','Add FAQ')

@section('page_scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

@endsection

@section('right_top_button')
<a href="{{ route('admin_faq_view') }}" class="button light">Back to FAQs</a>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_faq_submit') }}">
                @csrf

                <div class="field">
                    <label class="label">Question</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input class="input" type="text" placeholder="Question" name="question">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="field">
                    <label class="label">Answer</label>
                    <div class="control">
                        <textarea name="answer" class="ckeditor input" type="text" class="textarea" placeholder="Answer"
                            rows="2"></textarea>
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