@extends('front.layout.app')

@section('main_content')

 <!-- ====== Banner Section Start -->
 <div
 class="
   relative
   z-10
   pt-[120px]
   md:pt-[130px]
   lg:pt-[160px]
   pb-[100px]
   bg-primary
   overflow-hidden`
 "
>
 <div class="container">
   <div class="flex flex-wrap items-center -mx-4">
     <div class="w-full px-4">
       <div class="text-center">
         <h1 class="font-semibold text-white text-4xl">Cart</h1>
       </div>
     </div>
   </div>
 </div>
 <div>
   <span class="absolute top-0 left-0 z-[-1]">
     <svg
       width="495"
       height="470"
       viewBox="0 0 495 470"
       fill="none"
       xmlns="http://www.w3.org/2000/svg"
     >
       <circle
         cx="55"
         cy="442"
         r="138"
         stroke="white"
         stroke-opacity="0.04"
         stroke-width="50"
       />
       <circle
         cx="446"
         r="39"
         stroke="white"
         stroke-opacity="0.04"
         stroke-width="20"
       />
       <path
         d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z"
         stroke="white"
         stroke-opacity="0.08"
         stroke-width="12"
       />
     </svg>
   </span>
   <span class="absolute top-0 right-0 z-[-1]">
     <svg
       width="493"
       height="470"
       viewBox="0 0 493 470"
       fill="none"
       xmlns="http://www.w3.org/2000/svg"
     >
       <circle
         cx="462"
         cy="5"
         r="138"
         stroke="white"
         stroke-opacity="0.04"
         stroke-width="50"
       />
       <circle
         cx="49"
         cy="470"
         r="39"
         stroke="white"
         stroke-opacity="0.04"
         stroke-width="20"
       />
       <path
         d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z"
         stroke="white"
         stroke-opacity="0.06"
         stroke-width="13"
       />
     </svg>
   </span>
 </div>
</div>
<!-- ====== Banner Section End -->



<!-- ---- Shpping Cart Wrapper--->

<div class="container lg:grid grid-cols-12 gap-6 items-start pb-16 pt-4 ">
  <!-- ---- Product Cart--->
  <div class="xl:col-span-9 lg:col-span-8 ">

     <div class="bg-gray-200 py-2 pl-12 pr-20 xl:pr-28 mb-4 hidden md:flex "> 
          <p class="text-gray-600 text-center" >Product </p>
          <p class="text-gray-600 text-center ml-auto mr-16 xl:mr-24 " >Quantity </p>
          <p class="text-gray-600 text-center" >Total </p> 
     </div>

<!-- ---- Shipping Cart--->
<div class="space-y-4" >
  <!-- ---- Single Cart--->
  <div class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap bg-gray-100 ">
       <div class="w-32 flex-shrink-0">
            <img src="{{ asset('front_assets/images/products/product5.jpg') }}" class="w-full" /> 
       </div>

       <div class="md:w-1/3 w-full ">
          <h2 class="text-gray-800 mb-3 xl:text-xl text-lg font-medium uppercase" >Itaila l shap sofa </h2>
          <p class="text-primary font-semibold">$54.00</p>
          <p class="text-gray-500">Size: L</p>
       </div>


       <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max ">
          <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"> -  </div>
          <div class="h-8 w-10 flex items-center justify-center"> 5 </div>
          <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"> +  </div>

     </div> 


     <div class="ml-auto md:ml-0">
          <p class="text-primary text-lg font-semibold ">$358.00</p>
     </div>

     <div class="text-gray-600 hover:text-primary cursor-pointer ">
          <i class="fas fa-trash"></i>
     </div> 

  </div>

   <!-- ----End  Single Cart--->



<!-- ---- Single Cart--->
<div class="flex items-center md:justify-between gap-4 md:gap-6 p-4 border border-gray-200 rounded flex-wrap md:flex-nowrap bg-gray-100">
<div class="w-32 flex-shrink-0">
     <img src="{{ asset('front_assets/images/products/product6.jpg') }}" class="w-full" /> 
</div>

<div class="md:w-1/3 w-full ">
   <h2 class="text-gray-800 mb-3 xl:text-xl text-lg font-medium uppercase" >heial shap sofa </h2>
   <p class="text-primary font-semibold">$56.00</p>
   <p class="text-gray-500">Size: M</p>
</div>


<div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max ">
   <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"> -  </div>
   <div class="h-8 w-10 flex items-center justify-center"> 3 </div>
   <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none"> +  </div>

</div> 


<div class="ml-auto md:ml-0">
   <p class="text-primary text-lg font-semibold ">$338.00</p>
</div>

<div class="text-gray-600 hover:text-primary cursor-pointer ">
   <i class="fas fa-trash"></i>
</div> 

</div>

<!-- ----End  Single Cart---> 

</div> 

<!-- ---- End Shipping Cart---> 

</div>

  <!-- ---- End Product Cart--->


<!-- ---- Order Summary--->
<div class="xl:col-span-3 lg:col-span-4 border border-gray-200 px-4 py-4 rounded mt-6 lg:mt-0 bg-gray-100">

<h3 class="text-gray-800 text-lg mb-4 font-medium uppercase ">Order Summary</h3> 

<div class="space-y-1 text-gray-600 pb-3 border-b border-gray-200 ">
     <div class="flex justify-between font-medium">
          <p>Subtotal</p>
          <p>$355</p>
     </div>

     <div class="flex justify-between font-medium">
          <p>Delivery</p>
          <p>Free</p>
     </div>

     <div class="flex justify-between font-medium">
          <p>Tax</p>
          <p>Free</p>
     </div> 
</div>

<div class="flex justify-between my-3 text-gray-800 font-semibold uppercase">
     <h4>Total</h4>
     <h4>$855</h4>
</div>

<!-- ---- Coupon ---> 
<div class="flex mb-4">
<input type="text" class="pl-4 w-full border border-r-0 border-primary py-2 px-3 rounded-l-md focus:ring-primary focus:border-primary text-sm " placeholder="Coupon" />

<button type="submit" class="bg-primary border border-primary text-white px-5 font-medium rounded-r-md hover\:bg-transparent hover\:text-primary transition text-sm w-full block text-center " >Apply</button>

</div>
<!-- ---- End Coupon---> 

<a href="" class="bg-primary border border-primary text-white px-4 py-3 font-medium rounded-md uppercase hover:bg-transparent hover:text-primary transition text-sm w-full block text-center ">
     Process to checkout
</a>


</div>


 <!-- ---- End Order Summary---> 
</div>


<!-- ---- End Cart Wrapper ---> 

@endsection