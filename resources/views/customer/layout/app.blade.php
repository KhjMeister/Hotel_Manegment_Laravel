<!doctype html>
<html lang="en">

<head>
  @include('customer.layout.head')
  @yield('page_style')

</head>

<body>
  <div id="app">

    @include('customer.layout.navbar')

    @include('customer.layout.sidebar')


    <section class="is-hero-bar">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
          @yield('heading')
        </h1>
        @yield('right_top_button')
      </div>
    </section>

    @yield('main_content')

    @include('customer.layout.footer')

  </div>

  @include('customer.layout.scripts')

  @yield('page_scripts')



  @if($errors->any())
  @foreach ($errors->all() as $error)
  <script>
    iziToast.show({
    color: 'red',
    message: "{{ $error }}"
  });
  </script>
  @endforeach

  @endif


  @if(session()->has('success'))
  <script>
    iziToast.show({
    color: 'green',
    message: "{{ session('success') }}"
  });
  </script>
  @endif

  @if(session()->has('error'))
  <script>
    iziToast.show({
    color: 'red',
    message: "{{ session('error') }}"
  });
  </script>
  @endif

</body>

</html>