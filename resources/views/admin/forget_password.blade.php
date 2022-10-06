<!DOCTYPE html>
<html lang="en" class="form-screen">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Tailwind is included -->
    <link href="{{ asset('css/main.css?v=1628755089081') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}" />
    <link rel="mask-icon" href="{{ asset('img/safari-pinned-tab.svg') }}" color="#00b4b6" />

    <meta name="description" content="Hotel">

    <meta property="og:url" content="https://github.io/Khjmeister/">
    <meta property="og:site_name" content="Hotel.com">
    <meta property="og:title" content="Hotel">
    <meta property="og:description" content="Hotel Booking">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="960">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Hotel">
    <meta property="twitter:description" content="Hotel">
    <meta property="twitter:image:width" content="1920">
    <meta property="twitter:image:height" content="960">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script> --}}
    <script>
        window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
    </script>

</head>

<body>
    <div id="app">
        <section class="section main-section">
            <div class="card">
                @if(session()->has('success'))
                <div class="notification green">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                        <div>
                            <span class="icon"><i class="mdi mdi-buffer"></i></span>
                            <b>{{ session('success') }}</b>
                        </div>
                        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
                    </div>
                </div>
                @endif
                @if(session()->has('error'))
                <div class="notification red">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                        <div>
                            <span class="icon"><i class="mdi mdi-buffer"></i></span>
                            <b>{{ session('error') }}</b>
                        </div>
                        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
                    </div>
                </div>
                @endif
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="notification red">
                    <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                        <div>
                            <span class="icon"><i class="mdi mdi-buffer"></i></span>
                            <b>{{ $error }}</b>
                        </div>
                        <button type="button" class="button small textual --jb-notification-dismiss">X</button>
                    </div>
                </div>
                @endforeach
                @endif
                <header class="card-header">
                    <p class="card-header-title">
                        <span class="icon"><i class="mdi mdi-lock"></i></span>
                        Forget Password
                    </p>
                </header>
                <div class="card-content">
                    <form action="{{ route('admin_forget_password_submit') }}" method="POST">
                        @csrf
                        <div class="field spaced">
                            <label class="label">Email</label>
                            <div class="control icons-left">
                                <input class="input" type="text" name="email" placeholder="user@example.com"
                                    autocomplete="username">
                                <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
                            </div>
                            <p class="help">
                                Please enter your Email
                            </p>
                        </div>


                        <hr>

                        <div class="field grouped">
                            <div class="control">
                                <button type="submit" class="button blue">
                                    Send Link
                                </button>
                            </div>
                            <div class="control">
                                <a href="{{ route('admin_login') }}" class="button">
                                    Login
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </section>


    </div>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="{{ asset('js/main.min.js?v=1628755089081') }}"></script>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>

</html>