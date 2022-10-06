@extends('front.layout.app')

@section('main_content')

<!-- ====== Banner Section Start -->
<div class="
   relative
   z-10
   pt-[30px]
   md:pt-[60px]
   lg:pt-[60px]
   pb-[35px]
   bg-primary
   overflow-hidden
 ">

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

<!-- ---- Checkout Wrapper--->

<div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4 ">
    <!-- ---- Checkout Form--->
    <div class="lg:col-span-8 border border-gray-300 px-4 py-4 rounded bg-gray-100">
        <form method="" action="">
            <h3 class="text-lg font-medium capitalize mb-4"> Checkout </h3>

            <div class="space-y-4">
                <div class="grid sm:grid-cols-2 gap-4 ">
                    <div>
                        <label class="block text-xs text-dark">First Name <span class="text-primary">*</span>
                        </label>
                        <input type="text"
                            class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                    </div>

                    <div>
                        <label class="block text-xs text-dark">Last Name <span class="text-primary">*</span>
                        </label>
                        <input type="text"
                            class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                    </div>

                </div>

                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Company Name
                    </label>
                    <input type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Country/Region <span class="text-primary">*</span>
                    </label>
                    <input type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Street Address <span class="text-primary">*</span>
                    </label>
                    <input type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Town/City <span class="text-primary">*</span>
                    </label>
                    <input type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Zip Code <span class="text-primary">*</span>
                    </label>
                    <input type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Phone Number <span class="text-primary">*</span>
                    </label>
                    <input type="text"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->


                <!-- ----Single Input --->
                <div class="mb-6">
                    <label class="block text-xs text-dark">Email Address <span class="text-primary">*</span>
                    </label>
                    <input type="email"
                        class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                </div>

                <!-- ---- End Single Input--->
            </div>
        </form>
    </div>
    <!-- ---- End Checkout Form--->


    <!-- ---- Order Summary --->
    <div class="lg:col-span-4 border border-gray-300 px-4 py-4 rounded mt-6 lg:mt-0 bg-gray-100 ">
        <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase ">Order Summary</h4>

        <div class="space-y-2">
            <div class=" flex justify-between">
                <div>
                    <h5 class="text-gray-800 font-medium">Italia Shape Sofa</h5>
                    <p class="text-sm text-gray-600">Size:M</p>
                </div>
                <p class="text-gray-600">x 3</p>
                <p class="text-gray-600 font-medium">$320</p>

            </div>
        </div>


        <div class="flex justify-between border-b border-gray-300 mt-1">
            <h4 class="text-gray-800 font-medium my-3 uppercase">Subtotal</h4>
            <h4 class="text-gray-800 font-medium my-3 uppercase">$320</h4>
        </div>

        <div class="flex justify-between border-b border-gray-300 mt-1">
            <h4 class="text-gray-800 font-medium my-3 uppercase">Shipping</h4>
            <h4 class="text-gray-800 font-medium my-3 uppercase">Free</h4>
        </div>


        <div class="flex justify-between border-b border-gray-300 mt-1">
            <h4 class="text-gray-800 font-medium my-3 uppercase">Total</h4>
            <h4 class="text-gray-800 font-medium my-3 uppercase">$320</h4>
        </div>

        <div class="flex items-center mb-4 mt-2">
            <input type="checkbox" id="agreement"
                class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3 " />
            <label for="agreement" class="text-gray-600 ml-3 cursor-pointer text-sm "> Agree to our <a href="#"
                    class="text-primary">terms & conditions</a> </label>

        </div>

        <a href="#"
            class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent hover:text-primary transition text-sm w-full block text-center ">
            Place Order
        </a>

    </div>


    <!-- ---- End Order Summary--->







</div>



<!-- ---- End Checkout Wrapper --->

@endsection