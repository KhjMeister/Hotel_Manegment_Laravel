@extends('admin.layout.app')

@section('heading','Profile')

@section('main_content')

<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                    Edit Profile
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{ route('admin_profile_submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <label class="label">Avatar</label>
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
                    <hr>
                    <div class="field">
                        <label class="label">Name</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="text" autocomplete="on" name="name"
                                        value="{{ Auth::guard('admin')->user()->name }}" class="input">
                                </div>
                                <p class="help">Required. Your name</p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input type="email" autocomplete="on" name="email"
                                        value="{{ Auth::guard('admin')->user()->email }}" class="input">
                                </div>
                                <p class="help">Required. Your e-mail</p>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">New password</label>
                        <div class="control">
                            <input type="password" autocomplete="password" name="password" class="input">
                        </div>
                        <p class="help">Required. New password</p>
                    </div>
                    <div class="field">
                        <label class="label">Confirm password</label>
                        <div class="control">
                            <input type="password" autocomplete="new-password" name="retype_password" class="input">
                        </div>
                        <p class="help">Required. New password one more time</p>
                    </div>
                    <hr>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button green">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                    Profile
                </p>
            </header>
            <div class="card-content">
                <div class="image w-48 h-48 mx-auto">
                    <img src="{{ asset('uploads/'.Auth::guard('admin')->user()->photo) }}" alt="John Doe"
                        class="rounded-full">
                </div>
                <hr>
                <div class="field">
                    <label class="label">Name</label>
                    <div class="control">
                        <input type="text" readonly value="{{ Auth::guard('admin')->user()->name }}"
                            class="input is-static">
                    </div>
                </div>
                <hr>
                <div class="field">
                    <label class="label">E-mail</label>
                    <div class="control">
                        <input type="text" readonly value="{{ Auth::guard('admin')->user()->email }}"
                            class="input is-static">
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection