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
                    <h1 class="font-semibold text-white text-4xl">{{ $global_page_data->forget_password_heading }}</h1>
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

<!-- ====== Forms Section Start -->
<section class="bg-[#F4F7FF] py-14 lg:py-20">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="
              max-w-[525px]
              mx-auto
              text-center
              bg-white
              rounded-lg
              relative
              overflow-hidden
              py-14
              px-8
              sm:px-12
              md:px-[60px]
              wow
              fadeInUp
            " data-wow-delay=".15s">
                    <div class="mb-10 text-center">
                        <a href="javascript:void(0)" class="inline-block max-w-[160px] mx-auto">
                            <img src="{{ asset('front_assets/images/logo/logo.png') }}" alt="logo" />
                        </a>
                    </div>
                    <form action="{{ route('customer_forget_password_submit') }}" method="post">
                        @csrf
                        <div class="mb-6">
                            <input value="{{ old('email') }}" name="email" type="email" placeholder="Email" class="
                                w-full
                                rounded-md
                                border
                                bordder-[#E9EDF4]
                                py-3
                                px-5
                                bg-[#FCFDFE]
                                text-base text-body-color
                                placeholder-[#ACB6BE]
                                outline-none
                                focus-visible:shadow-none
                                focus:border-primary
                                transition" />
                            @if($errors->has('email'))
                            <span class="text-red">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-10">
                            <input type="submit" value="Submit" class="
                                w-full
                                rounded-md
                                border
                                bordder-primary
                                py-3
                                px-5
                                bg-primary
                                text-base text-white
                                cursor-pointer
                                hover:shadow-md
                                transition
                                duration-300
                                ease-in-out" />
                        </div>
                    </form>


                    <a href="{{ route('customer_forget_password') }}" class="
                        text-base
                        inline-block
                        mb-2
                        text-[#adadad]
                        hover:text-primary">
                        Forget Password?
                    </a>
                    <p class="text-base text-[#adadad]">
                        Not a member yet?
                        <a href="{{ route('customer_signup') }}" class="text-primary hover:underline">
                            Sign Up
                        </a>
                    </p>

                    <div>
                        <span class="absolute top-1 right-1">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.39737" cy="38.6026" r="1.39737" transform="rotate(-90 1.39737 38.6026)"
                                    fill="#3056D3" />
                                <circle cx="1.39737" cy="1.99122" r="1.39737" transform="rotate(-90 1.39737 1.99122)"
                                    fill="#3056D3" />
                                <circle cx="13.6943" cy="38.6026" r="1.39737" transform="rotate(-90 13.6943 38.6026)"
                                    fill="#3056D3" />
                                <circle cx="13.6943" cy="1.99122" r="1.39737" transform="rotate(-90 13.6943 1.99122)"
                                    fill="#3056D3" />
                                <circle cx="25.9911" cy="38.6026" r="1.39737" transform="rotate(-90 25.9911 38.6026)"
                                    fill="#3056D3" />
                                <circle cx="25.9911" cy="1.99122" r="1.39737" transform="rotate(-90 25.9911 1.99122)"
                                    fill="#3056D3" />
                                <circle cx="38.288" cy="38.6026" r="1.39737" transform="rotate(-90 38.288 38.6026)"
                                    fill="#3056D3" />
                                <circle cx="38.288" cy="1.99122" r="1.39737" transform="rotate(-90 38.288 1.99122)"
                                    fill="#3056D3" />
                                <circle cx="1.39737" cy="26.3057" r="1.39737" transform="rotate(-90 1.39737 26.3057)"
                                    fill="#3056D3" />
                                <circle cx="13.6943" cy="26.3057" r="1.39737" transform="rotate(-90 13.6943 26.3057)"
                                    fill="#3056D3" />
                                <circle cx="25.9911" cy="26.3057" r="1.39737" transform="rotate(-90 25.9911 26.3057)"
                                    fill="#3056D3" />
                                <circle cx="38.288" cy="26.3057" r="1.39737" transform="rotate(-90 38.288 26.3057)"
                                    fill="#3056D3" />
                                <circle cx="1.39737" cy="14.0086" r="1.39737" transform="rotate(-90 1.39737 14.0086)"
                                    fill="#3056D3" />
                                <circle cx="13.6943" cy="14.0086" r="1.39737" transform="rotate(-90 13.6943 14.0086)"
                                    fill="#3056D3" />
                                <circle cx="25.9911" cy="14.0086" r="1.39737" transform="rotate(-90 25.9911 14.0086)"
                                    fill="#3056D3" />
                                <circle cx="38.288" cy="14.0086" r="1.39737" transform="rotate(-90 38.288 14.0086)"
                                    fill="#3056D3" />
                            </svg>
                        </span>
                        <span class="absolute left-1 bottom-1">
                            <svg width="29" height="40" viewBox="0 0 29 40" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="2.288" cy="25.9912" r="1.39737" transform="rotate(-90 2.288 25.9912)"
                                    fill="#3056D3" />
                                <circle cx="14.5849" cy="25.9911" r="1.39737" transform="rotate(-90 14.5849 25.9911)"
                                    fill="#3056D3" />
                                <circle cx="26.7216" cy="25.9911" r="1.39737" transform="rotate(-90 26.7216 25.9911)"
                                    fill="#3056D3" />
                                <circle cx="2.288" cy="13.6944" r="1.39737" transform="rotate(-90 2.288 13.6944)"
                                    fill="#3056D3" />
                                <circle cx="14.5849" cy="13.6943" r="1.39737" transform="rotate(-90 14.5849 13.6943)"
                                    fill="#3056D3" />
                                <circle cx="26.7216" cy="13.6943" r="1.39737" transform="rotate(-90 26.7216 13.6943)"
                                    fill="#3056D3" />
                                <circle cx="2.288" cy="38.0087" r="1.39737" transform="rotate(-90 2.288 38.0087)"
                                    fill="#3056D3" />
                                <circle cx="2.288" cy="1.39739" r="1.39737" transform="rotate(-90 2.288 1.39739)"
                                    fill="#3056D3" />
                                <circle cx="14.5849" cy="38.0089" r="1.39737" transform="rotate(-90 14.5849 38.0089)"
                                    fill="#3056D3" />
                                <circle cx="26.7216" cy="38.0089" r="1.39737" transform="rotate(-90 26.7216 38.0089)"
                                    fill="#3056D3" />
                                <circle cx="14.5849" cy="1.39761" r="1.39737" transform="rotate(-90 14.5849 1.39761)"
                                    fill="#3056D3" />
                                <circle cx="26.7216" cy="1.39761" r="1.39737" transform="rotate(-90 26.7216 1.39761)"
                                    fill="#3056D3" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Forms Section End -->

@endsection