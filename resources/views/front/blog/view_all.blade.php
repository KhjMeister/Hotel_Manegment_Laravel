@extends('front.layout.app')


@section('main_content')

<!-- ====== Banner Section Start -->
<div class="
        relative
        z-10
        pt-[120px]
        md:pt-[130px]
        lg:pt-[160px]
        pb-[100px]
        bg-primary
        overflow-hidden
      ">
    <div class="container">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4">
                <div class="text-center">
                    <h1 class="font-semibold text-white text-4xl">Blog </h1>
                </div>
            </div>
        </div>
    </div>
    <div>
        <span class="absolute top-0 left-0 z-[-1]">
            <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
                <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white"
                    stroke-opacity="0.08" stroke-width="12" />
            </svg>
        </span>
        <span class="absolute top-0 right-0 z-[-1]">
            <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50" />
                <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20" />
                <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white"
                    stroke-opacity="0.06" stroke-width="13" />
            </svg>
        </span>
    </div>
</div>
<!-- ====== Banner Section End -->

<!-- ====== Blog Section Start -->
<section class="pt-20 lg:pt-[120px] pb-10 lg:pb-20">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            @foreach ($posts as $post)
            <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                <div class="mb-10 group wow fadeInUp" data-wow-delay=".1s">
                    <div class="rounded overflow-hidden mb-8">
                        <a href="{{ route('post',$post->id) }}" class="block">
                            <img src="{{ asset('uploads/posts/'.$post->photo) }}" alt="image" class="
                        w-full
                        transition
                        group-hover:scale-125 group-hover:rotate-6
                      " />
                        </a>
                    </div>
                    <div>
                        <span class="
                      bg-primary
                      rounded
                      inline-block
                      text-center
                      py-1
                      px-4
                      text-xs
                      leading-loose
                      font-semibold
                      text-white
                      mb-5
                    ">
                            {{ date('d m, Y', strtotime($post->created_at)) }}

                        </span>
                        <h3>
                            <a href="blog-details.html" class="
                        font-semibold
                        text-xl
                        sm:text-2xl
                        lg:text-xl
                        xl:text-2xl
                        mb-4
                        inline-block
                        text-dark
                        hover:text-primary
                      ">
                                {{ $post->heading }}

                            </a>
                        </h3>
                        <p class="text-base text-body-color">
                            {{ $post->short_content }}

                        </p>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

        <div dir="rtl" class="flex items-center space-x-1">
            {{ $posts->links('vendor.pagination.tailwind') }}
        </div>

    </div>
</section>
<!-- ====== Blog Section End -->


@endsection