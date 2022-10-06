@extends('admin.layout.app')

@section('heading','About Us')

@section('page_scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection


@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_about_update',$single_about->id) }}">
                @csrf
                
                <div class="field">
                    <label class="label">Heading</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control icons-left">
                                <input value="{{ $single_about->about_heading }}" class="input" type="text"
                                    placeholder="Heading" name="heading">
                                <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="field">
                    <label class="label">Content</label>
                    <div class="control">
                        <textarea name="content" class="ckeditor input" type="text" class="textarea"
                            placeholder="Content">{{ $single_about->about_content }}</textarea>
                    </div>
                </div>
                
                <div class="field">
                    <label class="label">Status</label>
                    <div class="control">
                      <div class="select">
                        <select name="status">
                          <option value="1" @if($single_about->about_status==1) selected @endif>Active</option>
                          <option value="0" @if($single_about->about_status==0) selected @endif>Deactive</option>
                        </select>
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