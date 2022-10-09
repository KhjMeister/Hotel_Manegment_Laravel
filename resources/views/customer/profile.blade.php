@extends('customer.layout.app')

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
                <form method="POST" action="{{ route('customer_profile_submit') }}" enctype="multipart/form-data">
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
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">

                        <div class="field">
                            <label class="label">Name</label>
                            <div class="field-body">
                                <div class="field">
                                    <div class="control">
                                        <input type="text" autocomplete="on" name="name"
                                            value="{{ Auth::guard('customer')->user()->name }}" class="input">
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
                                            value="{{ Auth::guard('customer')->user()->email }}" class="input">
                                    </div>
                                    <p class="help">Required. Your e-mail</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">

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
                    </div>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                        <div class="field">
                            <label class="label">Phone</label>
                            <div class="control">
                                <input name="phone" value="{{ Auth::guard('customer')->user()->phone }}" type="text"
                                    autocomplete="new-password" class="input">
                            </div>

                        </div>

                        <div class="field">
                            <label class="label">Country</label>
                            <div class="control">
                                <input name="country" value="{{ Auth::guard('customer')->user()->country }}" type="text"
                                    autocomplete="new-password" class="input">
                            </div>

                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <input name="address" value="{{ Auth::guard('customer')->user()->address }}" type="text"
                                    autocomplete="new-password" class="input">
                            </div>

                        </div>

                        <div class="field">
                            <label class="label">State</label>
                            <div class="control">
                                <input name="state" value="{{ Auth::guard('customer')->user()->state }}" type="text"
                                    autocomplete="new-password" class="input">
                            </div>

                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                        <div class="field">
                            <label class="label">City</label>
                            <div class="control">
                                <input name="city" value="{{ Auth::guard('customer')->user()->city }}" type="text"
                                    autocomplete="new-password" class="input">
                            </div>

                        </div>

                        <div class="field">
                            <label class="label">Zip</label>
                            <div class="control">
                                <input name="zip" value="{{ Auth::guard('customer')->user()->zip }}" type="text"
                                    autocomplete="new-password" class="input">
                            </div>

                        </div>
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
                <div class="image w-48  mx-auto">
                    <img style="height:190px;" src="{{ asset('uploads/'.Auth::guard('customer')->user()->photo) }}"
                        alt="John Doe" class="rounded-full">
                </div>
                <hr>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">

                    <div class="field">
                        <label class="label">Name</label>
                        <div class="control">
                            <input type="text" readonly value="{{ Auth::guard('customer')->user()->name }}"
                                class="input is-static">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                            <input type="text" readonly value="{{ Auth::guard('customer')->user()->email }}"
                                class="input is-static">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">Phone</label>
                        <div class="control">
                            <input readonly name="phone" value="{{ Auth::guard('customer')->user()->phone }}" type="text"
                                autocomplete="new-password" class="input">
                        </div>

                    </div>

                    <div class="field">
                        <label class="label">Country</label>
                        <div class="control">
                            <input readonly name="country" value="{{ Auth::guard('customer')->user()->country }}" type="text"
                                autocomplete="new-password" class="input">
                        </div>

                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">Address</label>
                        <div class="control">
                            <input readonly name="address" value="{{ Auth::guard('customer')->user()->address }}" type="text"
                                autocomplete="new-password" class="input">
                        </div>

                    </div>

                    <div class="field">
                        <label class="label">State</label>
                        <div class="control">
                            <input readonly name="state" value="{{ Auth::guard('customer')->user()->state }}" type="text"
                                autocomplete="new-password" class="input">
                        </div>

                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-2">
                    <div class="field">
                        <label class="label">City</label>
                        <div class="control">
                            <input readonly name="city" value="{{ Auth::guard('customer')->user()->city }}" type="text"
                                autocomplete="new-password" class="input">
                        </div>

                    </div>

                    <div class="field">
                        <label class="label">Zip</label>
                        <div class="control">
                            <input readonly name="zip" value="{{ Auth::guard('customer')->user()->zip }}" type="text"
                                autocomplete="new-password" class="input">
                        </div>

                    </div>
                </div>
            </div>

</section>

@endsection