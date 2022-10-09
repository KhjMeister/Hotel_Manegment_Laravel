@extends('admin.layout.app')

@section('heading','Setting')



@section('main_content')

<section class="section main-section">
    <div class="card mb-6">

        <div class="card-content">
            <form method="POST" action="{{ route('admin_setting_update',$setting_data->id) }}"
                enctype="multipart/form-data">
                @csrf
                <div class="image w-48  mx-auto">
                    <img height="" src="{{ asset('uploads/setting/'.$setting_data->logo) }}" alt="pic" class="full">
                </div>
                <div class="field">
                    <label class="label">Change Logo</label>
                    <div class="field-body">
                        <div class="field file">
                            <label class="upload control">
                                <a class="button blue">
                                    Upload
                                </a>
                                <input type="file" name="logo">
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="image w-48  mx-auto">
                    <img src="{{ asset('uploads/setting/'.$setting_data->favicon) }}" alt="pic" class="full">
                </div>
                <div class="field">
                    <label class="label">Change Favicon</label>
                    <div class="field-body">
                        <div class="field file">
                            <label class="upload control">
                                <a class="button green">
                                    Upload
                                </a>
                                <input type="file" name="favicon">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">

                    <div class="field">
                        <label class="label">Top Bar Phone</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ $setting_data->top_bar_phone }}" class="input" type="text"
                                        placeholder="Heading" name="top_bar_phone">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Top Bar Email</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ $setting_data->top_bar_email }}" class="input" type="text"
                                        placeholder="Heading" name="top_bar_email">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                    <div class="field">
                        <label class="label">Home Feature Status</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <div class="control">
                                        <div class="select">
                                            <select name="home_feature_status">

                                                <option value="1" @if($setting_data->home_feature_status == '1')
                                                    selected @endif>Active</option>
                                                <option value="0" @if($setting_data->home_feature_status == '0')
                                                    selected @endif>Deactive</option>
                                            </select>
                                            <span class="icon left"><i class="mdi mdi-view-list"></i></span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Home Room Total</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input value="{{ $setting_data->home_room_total }}" class="input" type="text"
                                        placeholder="Heading" name="home_room_total">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                    <div class="field">
                        <label class="label">Home Room Status</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <div class="control">
                                        <div class="select">
                                            <select name="home_room_status">
                                                <option vlaue="1" @if($setting_data->home_room_status == '1') selected
                                                    @endif>Active</option>
                                                <option vlaue="0" @if($setting_data->home_room_status == '0') selected
                                                    @endif>Deactive</option>
                                            </select>
                                            <span class="icon left"><i class="mdi mdi-view-list"></i></span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Home Testimonial Status</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <div class="control">
                                        <div class="select">
                                            <select>
                                                <option value="1" @if($setting_data->home_testimonial_status == '1')
                                                    selected @endif>Active</option>
                                                <option value="0" @if($setting_data->home_testimonial_status == '0')
                                                    selected @endif>Deactive</option>
                                            </select>
                                            <span class="icon left"><i class="mdi mdi-view-list"></i></span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                    <div class="field">
                        <label class="label">Home Latest Post Status</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <div class="control">
                                        <div class="select">
                                            <select name="home_latest_post_status">

                                                <option value="1" @if($setting_data->home_latest_post_status == '1')
                                                    selected @endif>Active</option>
                                                <option value="0" @if($setting_data->home_latest_post_status == '0')
                                                    selected @endif>Deactive</option>
                                            </select>
                                            <span class="icon left"><i class="mdi mdi-view-list"></i></span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Home Latest Post Total</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input name="home_latest_post_total"
                                        value="{{ $setting_data->home_latest_post_total }}" class="input" type="text"
                                        placeholder="Heading">
                                    <span class="icon left"><i class="mdi mdi-view-list"></i></span>
                                </div>
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