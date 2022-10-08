<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('front.layout.head')
    @yield('page_style')

</head>

<body>
    <!-- ====== Navbar Section Start -->
    @include('front.layout.navbar')
    <!-- ====== Navbar Section End -->

    @yield('main_content')
    <!-- ====== Footer Section Start -->
    @include('front.layout.footer')
    <!-- ====== Footer Section End -->

    <!-- ====== Back To Top Start -->
    <a href="javascript:void(0)"
        class="hidden items-center justify-center bg-primary text-white w-10 h-10 rounded-md fixed bottom-8 right-8 left-auto z-[999] hover:bg-dark back-to-top shadow-md transition duration-300 ease-in-out">
        <span class="w-3 h-3 border-t border-l border-white rotate-45 mt-[6px]"></span>
    </a>
    <!-- ====== Back To Top End -->

    <!-- ====== All Scripts -->

    @include('front.layout.scripts')
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