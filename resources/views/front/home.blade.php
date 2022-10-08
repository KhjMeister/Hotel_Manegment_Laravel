@extends('front.layout.app')

@section('page_scripts')

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script>
    const MONTH_NAMES = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December",
    ];
    const MONTH_SHORT_NAMES = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ];
    const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    function app() {
      return {
        showDatepicker: false,
        datepickerValue: "",
        selectedDate: "2021-08-10",
        dateFormat: "DD-MM-YYYY",
        month: "",
        year: "",
        no_of_days: [],
        blankdays: [],
        initDate() {
          let today;
          if (this.selectedDate) {
            today = new Date(Date.parse(this.selectedDate));
          } else {
            today = new Date();
          }
          this.month = today.getMonth();
          this.year = today.getFullYear();
          this.datepickerValue = this.formatDateForDisplay(
            today
          );
        },
        formatDateForDisplay(date) {
          let formattedDay = DAYS[date.getDay()];
          let formattedDate = ("0" + date.getDate()).slice(
            -2
          ); // appends 0 (zero) in single digit date
          let formattedMonth = MONTH_NAMES[date.getMonth()];
          let formattedMonthShortName =
            MONTH_SHORT_NAMES[date.getMonth()];
          let formattedMonthInNumber = (
            "0" +
            (parseInt(date.getMonth()) + 1)
          ).slice(-2);
          let formattedYear = date.getFullYear();
          if (this.dateFormat === "DD-MM-YYYY") {
            return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
          }
          if (this.dateFormat === "YYYY-MM-DD") {
            return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
          }
          if (this.dateFormat === "D d M, Y") {
            return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
          }
          return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
        },
        isSelectedDate(date) {
          const d = new Date(this.year, this.month, date);
          return this.datepickerValue ===
            this.formatDateForDisplay(d) ?
            true :
            false;
        },
        isToday(date) {
          const today = new Date();
          const d = new Date(this.year, this.month, date);
          return today.toDateString() === d.toDateString() ?
            true :
            false;
        },
        getDateValue(date) {
          let selectedDate = new Date(
            this.year,
            this.month,
            date
          );
          this.datepickerValue = this.formatDateForDisplay(
            selectedDate
          );
          // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
          this.isSelectedDate(date);
          this.showDatepicker = false;
        },
        getNoOfDays() {
          let daysInMonth = new Date(
            this.year,
            this.month + 1,
            0
          ).getDate();
          // find where to start calendar day of week
          let dayOfWeek = new Date(
            this.year,
            this.month
          ).getDay();
          let blankdaysArray = [];
          for (var i = 1; i <= dayOfWeek; i++) {
            blankdaysArray.push(i);
          }
          let daysArray = [];
          for (var i = 1; i <= daysInMonth; i++) {
            daysArray.push(i);
          }
          this.blankdays = blankdaysArray;
          this.no_of_days = daysArray;
        },
      };
    }
</script>
@endsection

@section('page_style')
<style>
    [x-cloak] {
        display: none;
    }
</style>
@endsection

@section('main_content')



<!-- ====== Hero Section Start -->
<div id="home" class="relative pt-[120px] md:pt-[130px] lg:pt-[160px] bg-primary">
    <div class="container">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full px-4">
                <div class="hero-content text-center max-w-[780px] mx-auto wow fadeInUp" data-wow-delay=".2s">
                    <h1
                        class="text-white font-bold text-3xl sm:text-4xl md:text-[45px] leading-snug sm:leading-snug md:leading-snug mb-8">
                        {{ $slide->heading }}
                    </h1>



                </div>
            </div>

            <div class="w-full px-4">
                <div class="mx-auto max-w-[845px] relative z-10 wow fadeInUp" data-wow-delay=".25s">
                    <div class="mt-16">
                        <img src="{{ asset('uploads/slides/'.$slide->photo) }}" alt="hero"
                            class="max-w-full mx-auto rounded-t-xl rounded-tr-xl" />
                    </div>
                    <div class="absolute z-[-1] bottom-0 -left-9">
                        <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                fill="white" />
                            <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                fill="white" />
                            <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)" fill="white" />
                            <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                fill="white" />
                            <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                fill="white" />
                            <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                fill="white" />
                            <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                fill="white" />
                            <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                fill="white" />
                            <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)" fill="white" />
                            <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)" fill="white" />
                            <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"
                                fill="white" />
                            <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"
                                fill="white" />
                            <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)" fill="white" />
                            <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"
                                fill="white" />
                            <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"
                                fill="white" />
                            <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                fill="white" />
                            <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                fill="white" />
                            <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"
                                fill="white" />
                            <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"
                                fill="white" />
                            <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"
                                fill="white" />
                            <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)" fill="white" />
                            <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)" fill="white" />
                            <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"
                                fill="white" />
                            <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"
                                fill="white" />
                            <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"
                                fill="white" />
                            <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"
                                fill="white" />
                            <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"
                                fill="white" />
                            <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"
                                fill="white" />
                            <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"
                                fill="white" />
                            <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"
                                fill="white" />
                            <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"
                                fill="white" />
                            <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                fill="white" />
                            <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                fill="white" />
                            <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                fill="white" />
                            <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                fill="white" />
                            <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"
                                fill="white" />
                            <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"
                                fill="white" />
                            <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)" fill="white" />
                            <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)" fill="white" />
                            <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"
                                fill="white" />
                            <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"
                                fill="white" />
                            <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"
                                fill="white" />
                            <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"
                                fill="white" />
                            <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"
                                fill="white" />
                            <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"
                                fill="white" />
                            <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"
                                fill="white" />
                            <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"
                                fill="white" />
                            <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"
                                fill="white" />
                            <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                fill="white" />
                            <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                fill="white" />
                            <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                fill="white" />
                            <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"
                                fill="white" />
                            <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"
                                fill="white" />
                            <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)" fill="white" />
                            <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)" fill="white" />
                            <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"
                                fill="white" />
                            <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"
                                fill="white" />
                            <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"
                                fill="white" />
                            <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"
                                fill="white" />
                            <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"
                                fill="white" />
                            <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"
                                fill="white" />
                            <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"
                                fill="white" />
                            <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                fill="white" />
                            <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                fill="white" />
                            <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                fill="white" />
                            <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                fill="white" />
                        </svg>
                    </div>
                    <div class="absolute z-[-1] -top-6 -right-6">
                        <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                fill="white" />
                            <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                fill="white" />
                            <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)" fill="white" />
                            <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                fill="white" />
                            <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)"
                                fill="white" />
                            <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                fill="white" />
                            <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                fill="white" />
                            <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                fill="white" />
                            <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)" fill="white" />
                            <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)" fill="white" />
                            <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)"
                                fill="white" />
                            <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)"
                                fill="white" />
                            <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)" fill="white" />
                            <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)"
                                fill="white" />
                            <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)"
                                fill="white" />
                            <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                fill="white" />
                            <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                fill="white" />
                            <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)"
                                fill="white" />
                            <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)"
                                fill="white" />
                            <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)"
                                fill="white" />
                            <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)" fill="white" />
                            <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)" fill="white" />
                            <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)"
                                fill="white" />
                            <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)"
                                fill="white" />
                            <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)"
                                fill="white" />
                            <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)"
                                fill="white" />
                            <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)"
                                fill="white" />
                            <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)"
                                fill="white" />
                            <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)"
                                fill="white" />
                            <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)"
                                fill="white" />
                            <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)"
                                fill="white" />
                            <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                fill="white" />
                            <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)"
                                fill="white" />
                            <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                fill="white" />
                            <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)"
                                fill="white" />
                            <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)"
                                fill="white" />
                            <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)"
                                fill="white" />
                            <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)"
                                fill="white" />
                            <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)" fill="white" />
                            <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)" fill="white" />
                            <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)"
                                fill="white" />
                            <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)"
                                fill="white" />
                            <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)"
                                fill="white" />
                            <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)"
                                fill="white" />
                            <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)"
                                fill="white" />
                            <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)"
                                fill="white" />
                            <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)"
                                fill="white" />
                            <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)"
                                fill="white" />
                            <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)"
                                fill="white" />
                            <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)"
                                fill="white" />
                            <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                fill="white" />
                            <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)"
                                fill="white" />
                            <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                fill="white" />
                            <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)"
                                fill="white" />
                            <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)"
                                fill="white" />
                            <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)"
                                fill="white" />
                            <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)"
                                fill="white" />
                            <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)" fill="white" />
                            <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)" fill="white" />
                            <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)"
                                fill="white" />
                            <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)"
                                fill="white" />
                            <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)"
                                fill="white" />
                            <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)"
                                fill="white" />
                            <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)"
                                fill="white" />
                            <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)"
                                fill="white" />
                            <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)"
                                fill="white" />
                            <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)"
                                fill="white" />
                            <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)"
                                fill="white" />
                            <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)"
                                fill="white" />
                            <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                fill="white" />
                            <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)"
                                fill="white" />
                            <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                fill="white" />
                            <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)"
                                fill="white" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ====== Hero Section End -->

<!-- ====== booking Start ====== -->
<section id="contact" class="py-20 md:py-[120px] relative">
    <div class="absolute z-[-1] w-full h-1/2 lg:h-[45%] xl:h-1/2 bg-[#f3f4fe] top-0 left-0"></div>
    <div class="container px-4">
        <div class="flex flex-wrap items-center -mx-4">

            <div class="px-4 w-full lg:w-12/12 xl:w-12/12">
                <div class="shadow-testimonial rounded-lg bg-white py-10 px-8 md:p-[60px] lg:p-10 2xl:p-[60px] sm:py-12 sm:px-10 lg:py-12 lg:px-10 wow fadeInUp"
                    data-wow-delay=".2s">
                    <h3 class="font-semibold mb-8 text-2xl md:text-[26px]">
                        Book a Room
                    </h3>
                    <form class="flex flex-wrap items-center -mx-4" action="{{ route('cart_submit') }}" method="post">
                        @csrf
                        <div class="mb-6 mr-2">
                            <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Select Room</label>

                            <select name="room_id"
                                style="background-color: rgba(255,255,255,var(--tw-bg-opacity));--tw-bg-opacity: 1"
                                class="w-full select text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:border-primary focus:outline-none py-4">
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>

                                @endforeach
                            </select>

                        </div>
                        <div class="mb-6 mr-2" x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                            <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Chick In</label>
                            <div class="relative">
                                <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                                <input name="checkin" type="text" x-on:click="showDatepicker = !showDatepicker"
                                    x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false"
                                    class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4"
                                    placeholder="Chick In" readonly />

                                <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                    style="width: 17rem" x-show.transition="showDatepicker"
                                    @click.away="showDatepicker = false">
                                    <div class="flex justify-between items-center mb-2">
                                        <div>
                                            <span x-text="MONTH_NAMES[month]"
                                                class="text-lg font-bold text-gray-800"></span>
                                            <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                @click="if (month == 0) {
                                                                              year--;
                                                                              month = 12;
                                                                          } month--; getNoOfDays()">
                                                <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                @click="if (month == 11) {
                                                                              month = 0; 
                                                                              year++;
                                                                          } else {
                                                                              month++; 
                                                                          } getNoOfDays()">
                                                <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap mb-3 -mx-1">
                                        <template x-for="(day, index) in DAYS" :key="index">
                                            <div style="width: 14.26%" class="px-0.5">
                                                <div x-text="day" class="text-gray-800 font-medium text-center text-xs">
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <div class="flex flex-wrap -mx-1">
                                        <template x-for="blankday in blankdays">
                                            <div style="width: 14.28%"
                                                class="text-center border p-1 border-transparent text-sm">
                                            </div>
                                        </template>
                                        <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                            <div style="width: 14.28%" class="px-1 mb-1">
                                                <div @click="getDateValue(date)" x-text="date"
                                                    class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                    :class="{
                                                    'bg-indigo-200': isToday(date) == true, 
                                                    'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                                    'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                                  }"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 mr-2" x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                            <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Chick Out</label>
                            <div class="relative">
                                <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                                <input name="checkout" type="text" x-on:click="showDatepicker = !showDatepicker"
                                    x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false"
                                    class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4"
                                    placeholder="Chick out" readonly />
                                <div class="bg-white mt-12 rounded-lg shadow p-4 absolute top-0 left-0"
                                    style="width: 17rem" x-show.transition="showDatepicker"
                                    @click.away="showDatepicker = false">
                                    <div class="flex justify-between items-center mb-2">
                                        <div>
                                            <span x-text="MONTH_NAMES[month]"
                                                class="text-lg font-bold text-gray-800"></span>
                                            <span x-text="year" class="ml-1 text-lg text-gray-600 font-normal"></span>
                                        </div>
                                        <div>
                                            <button type="button"
                                                class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                @click="if (month == 0) {
                                                                              year--;
                                                                              month = 12;
                                                                          } month--; getNoOfDays()">
                                                <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 19l-7-7 7-7" />
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="focus:outline-none focus:shadow-outline transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-100 p-1 rounded-full"
                                                @click="if (month == 11) {
                                                                              month = 0; 
                                                                              year++;
                                                                          } else {
                                                                              month++; 
                                                                          } getNoOfDays()">
                                                <svg class="h-6 w-6 text-gray-400 inline-flex" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap mb-3 -mx-1">
                                        <template x-for="(day, index) in DAYS" :key="index">
                                            <div style="width: 14.26%" class="px-0.5">
                                                <div x-text="day" class="text-gray-800 font-medium text-center text-xs">
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <div class="flex flex-wrap -mx-1">
                                        <template x-for="blankday in blankdays">
                                            <div style="width: 14.28%"
                                                class="text-center border p-1 border-transparent text-sm">
                                            </div>
                                        </template>
                                        <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                            <div style="width: 14.28%" class="px-1 mb-1">
                                                <div @click="getDateValue(date)" x-text="date"
                                                    class="cursor-pointer text-center text-sm leading-none rounded-full leading-loose transition ease-in-out duration-100"
                                                    :class="{
                                                    'bg-indigo-200': isToday(date) == true, 
                                                    'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                                    'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true 
                                                  }"></div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-6 mr-2">
                            <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Adults</label>

                            <input type="text" name="adult" placeholder="Adults"
                                class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                        </div>
                        <div class="mb-6  mr-3">
                            <label for="datepicker" class="font-bold mb-1 text-gray-700 block">Children</label>

                            <input type="text" name="children" placeholder="Children"
                                class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                        </div>
                        <div class="mb-0 ">
                            <button type="submit"
                                class="inline-flex items-center justify-center py-2 px-6 rounded text-white bg-primary text-base font-medium hover:bg-dark transition duration-300 ease-in-out">
                                Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ====== booking End ====== -->


<!-- ====== Features Section Start -->
<section class="pt-20 lg:pt-[120px] pb-8 lg:pb-[70px]">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="mb-12 lg:mb-20 max-w-[620px]">
                    <span class="font-semibold text-lg text-primary mb-2 block">
                        Features
                    </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[42px] text-dark mb-4">
                        Main Features Of TheHotel
                    </h2>
                    <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed text-body-color">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            @foreach ($features as $feature)
            <div class="w-full md:w-1/2 lg:w-1/4 px-4">
                <div class="bg-white mb-12 group wow fadeInUp" data-wow-delay=".1s">
                    <div
                        class="w-[70px] h-[70px] flex items-center justify-center bg-primary rounded-2xl mb-8 relative z-10">
                        <span
                            class="w-[70px] h-[70px] flex items-center justify-center bg-primary bg-opacity-20 rounded-2xl mb-8 absolute z-[-1] top-0 left-0 rotate-[25deg] group-hover:rotate-45 duration-300"></span>
                        <img src="{{ asset('uploads/features/'.$feature->icon) }}" alt="pic" class="full">
                    </div>
                    <h4 class="font-bold text-xl text-dark mb-3">
                        {{ $feature->heading }}
                    </h4>
                    <p class="text-body-color mb-8 lg:mb-11">
                        {{ $feature->text }}
                    </p>

                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- ====== Features Section End -->

<!-- ====== Faq Section Start -->
<section class="bg-[#f3f4ff] pt-20 lg:pt-[120px] pb-12 lg:pb-[90px] relative z-20 overflow-hidden">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[620px]">
                    <span class="font-semibold text-lg text-primary mb-2 block">
                        FAQ
                    </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[42px] text-dark mb-4">
                        Any Questions? Answered
                    </h2>
                    <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed text-body-color">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-4">
            @foreach ($faqs as $faq)
            <div class="w-full md:w-1/2 lg:w-1/2 px-4">
                <div class="single-faq w-full bg-white border border-[#F3F4FE] rounded-lg p-5 sm:p-8 mb-8 wow fadeInUp"
                    data-wow-delay=".1s">
                    <button class="faq-btn flex items-center w-full text-left">
                        <div
                            class="w-full max-w-[40px] h-10 flex items-center justify-center rounded-lg bg-primary text-primary bg-opacity-5 mr-5">
                            <svg width="17" height="10" viewBox="0 0 17 10" class="fill-current icon">
                                <path
                                    d="M7.28687 8.43257L7.28679 8.43265L7.29496 8.43985C7.62576 8.73124 8.02464 8.86001 8.41472 8.86001C8.83092 8.86001 9.22376 8.69083 9.53447 8.41713L9.53454 8.41721L9.54184 8.41052L15.7631 2.70784L15.7691 2.70231L15.7749 2.69659C16.0981 2.38028 16.1985 1.80579 15.7981 1.41393C15.4803 1.1028 14.9167 1.00854 14.5249 1.38489L8.41472 7.00806L2.29995 1.38063L2.29151 1.37286L2.28271 1.36548C1.93092 1.07036 1.38469 1.06804 1.03129 1.41393L1.01755 1.42738L1.00488 1.44184C0.69687 1.79355 0.695778 2.34549 1.0545 2.69659L1.05999 2.70196L1.06565 2.70717L7.28687 8.43257Z"
                                    fill="#3056D3" stroke="#3056D3" />
                            </svg>
                        </div>
                        <div class="w-full">
                            <h4 class="text-base sm:text-lg font-semibold text-black">
                                {{ $faq->question }}
                            </h4>
                        </div>
                    </button>
                    <div class="faq-content pl-[62px] hidden">
                        <p class="text-base text-body-color leading-relaxed py-3">
                            {{ $faq->answer }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
            <div>
            </div>
            <div class="absolute bottom-0 right-0 z-[-1]">
                <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
                        fill="url(#paint0_linear)" />
                    <defs>
                        <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3056D3" stop-opacity="0.36" />
                            <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
                            <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
</section>
<!-- ====== Faq Section End -->

<!-- ====== Testimonials Start ====== -->
<section id="testimonials" class="pt-20 md:pt-[120px]">
    <div class="container px-4">
        <div class="flex flex-wrap">
            <div class="w-full mx-4">
                <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[620px]">
                    <span class="font-semibold text-lg text-primary mb-2 block">
                        Testimonials
                    </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[42px] text-dark mb-4">
                        What our Client Say
                    </h2>
                    <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed text-body-color">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap">
            @foreach ($testimonials as $testimonial)
            <div class="w-full md:w-1/2 lg:w-1/3 px-4">
                <div class="ud-single-testimonial p-8 bg-white mb-12 shadow-testimonial wow fadeInUp"
                    data-wow-delay=".1s">
                    <div class="ud-testimonial-ratings flex items-center mb-3">
                        <span class="text-[#fbb040] mr-1">
                            <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                <path
                                    d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                            </svg>
                        </span>
                        <span class="text-[#fbb040] mr-1">
                            <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                <path
                                    d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                            </svg>
                        </span>
                        <span class="text-[#fbb040] mr-1">
                            <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                <path
                                    d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                            </svg>
                        </span>
                        <span class="text-[#fbb040] mr-1">
                            <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                <path
                                    d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                            </svg>
                        </span>
                        <span class="text-[#fbb040] mr-1">
                            <svg width="18" height="16" viewBox="0 0 18 16" class="fill-current">
                                <path
                                    d="M9.09815 0.360596L11.1054 6.06493H17.601L12.3459 9.5904L14.3532 15.2947L9.09815 11.7693L3.84309 15.2947L5.85035 9.5904L0.595291 6.06493H7.0909L9.09815 0.360596Z" />
                            </svg>
                        </span>
                    </div>
                    <div class="ud-testimonial-content mb-6">
                        <p class="text-base tracking-wide text-body-color">
                            {{ $testimonial->comment }}
                        </p>
                    </div>
                    <div class="ud-testimonial-info flex items-center">
                        <div class="ud-testimonial-image w-[50px] h-[50px] rounded-full overflow-hidden mr-5">
                            <img src="{{ asset('uploads/testimonials/'.$testimonial->photo) }}" alt="author" />
                        </div>
                        <div class="ud-testimonial-meta">
                            <h4 class="text-sm font-semibold">{{ $testimonial->name }}</h4>
                            <p class="text-[#969696] text-xs">{{ $testimonial->designation }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="flex flex-wrap">
            <div class="w-full mx-4">
                <div class="wow fadeInUp" data-wow-delay=".2s">
                    <div class="ud-title mb-8">
                        <h6 class="text-xs font-normal text-body-color relative inline-flex items-center">
                            Some Of Our Clients
                            <span class="w-8 h-[1px] inline-block bg-[#afb2b5] ml-4">
                            </span>
                        </h6>
                    </div>
                    <div class="ud-brands-logo flex items-center flex-wrap">
                        <div class="ud-single-logo mr-10 mb-5 max-w-[140px]">
                            <a href="https://tailgrids.com" target="_blank" rel="nofollow noopner">
                                <img src="{{ asset('front_assets/images/brands/tailgrids.svg') }}" alt="tailgrids"
                                    class="grayscale hover:filter-none duration-300" />
                            </a>
                        </div>
                        <div class="ud-single-logo mr-10 mb-5 max-w-[140px]">
                            <a href="https://ayroui.com" target="_blank" rel="nofollow noopner">
                                <img src="{{ asset('front_assets/images/brands/ayroui.svg') }}" alt="ayroui"
                                    class="grayscale hover:filter-none duration-300" />
                            </a>
                        </div>
                        <div class="ud-single-logo mr-10 mb-5 max-w-[140px]">
                            <a href="https://uideck.com" target="_blank" rel="nofollow noopner">
                                <img src="{{ asset('front_assets/images/brands/uideck.svg') }}" alt="uideck"
                                    class="grayscale hover:filter-none duration-300" />
                            </a>
                        </div>
                        <div class="ud-single-logo mr-10 mb-5 max-w-[140px]">
                            <a href="https://graygrids.com" target="_blank" rel="nofollow noopner">
                                <img src="{{ asset('front_assets/images/brands/graygrids.svg') }}" alt="graygrids"
                                    class="grayscale hover:filter-none duration-300" />
                            </a>
                        </div>
                        <div class="ud-single-logo mr-10 mb-5 max-w-[140px]">
                            <a href="https://lineicons.com" target="_blank" rel="nofollow noopner">
                                <img src="{{ asset('front_assets/images/brands/lineicons.svg') }}" alt="lineicons"
                                    class="grayscale hover:filter-none duration-300" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Testimonials End ====== -->

<!-- ====== Team Section Start -->
<section id="team" class="pt-20 lg:pt-[120px] pb-10 lg:pb-20">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="text-center mx-auto mb-[60px] max-w-[620px]">
                    <span class="font-semibold text-lg text-primary mb-2 block">
                        Rooms
                    </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[42px] text-dark mb-4">
                        Latest Rooms
                    </h2>
                    <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed text-body-color">

                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap justify-center -mx-4">
            @foreach ($rooms as $room)
            <div class="w-full sm:w-1/2 lg:w-1/4 px-4">
                <div class="mb-10 wow fadeInUp" data-wow-delay=".1s">
                    <div class="relative w-[170px] h-[100px] rounded-full z-10 mx-auto mb-6">
                        <img src="{{ asset('uploads/rooms/'.$room->featured_photo) }}" alt="image"
                            class="w-full rounded-full" />
                        <span class="absolute top-0 left-0 z-[-1]">
                            <svg width="71" height="82" viewBox="0 0 71 82" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="1.29337" cy="80.7066" r="1.29337" transform="rotate(-90 1.29337 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="80.7066" r="1.29337" transform="rotate(-90 12.6747 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="80.7066" r="1.29337" transform="rotate(-90 24.0575 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="80.7066" r="1.29337" transform="rotate(-90 35.4379 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="80.7066" r="1.29337" transform="rotate(-90 46.8197 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="80.7066" r="1.29337" transform="rotate(-90 68.807 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="57.9443" cy="80.7066" r="1.29337" transform="rotate(-90 57.9443 80.7066)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="69.3249" r="1.29337" transform="rotate(-90 1.29337 69.3249)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="69.3249" r="1.29337" transform="rotate(-90 12.6747 69.3249)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="69.3249" r="1.29337" transform="rotate(-90 24.0575 69.3249)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="69.3249" r="1.29337" transform="rotate(-90 35.4379 69.3249)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="69.325" r="1.29337" transform="rotate(-90 46.8197 69.325)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="69.325" r="1.29337" transform="rotate(-90 68.807 69.325)"
                                    fill="#3056D3" />
                                <circle cx="57.9433" cy="69.325" r="1.29337" transform="rotate(-90 57.9433 69.325)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="57.9433" r="1.29337" transform="rotate(-90 1.29337 57.9433)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="24.0568" r="1.29337" transform="rotate(-90 1.29337 24.0568)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="57.9433" r="1.29337" transform="rotate(-90 12.6747 57.9433)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="24.0568" r="1.29337" transform="rotate(-90 12.6747 24.0568)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="57.9433" r="1.29337" transform="rotate(-90 24.0575 57.9433)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="24.0568" r="1.29337" transform="rotate(-90 24.0575 24.0568)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="57.9433" r="1.29337" transform="rotate(-90 35.4379 57.9433)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="24.0568" r="1.29337" transform="rotate(-90 35.4379 24.0568)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="57.9431" r="1.29337" transform="rotate(-90 46.8197 57.9431)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="24.0567" r="1.29337" transform="rotate(-90 46.8197 24.0567)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="57.9431" r="1.29337" transform="rotate(-90 68.807 57.9431)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="24.0567" r="1.29337" transform="rotate(-90 68.807 24.0567)"
                                    fill="#3056D3" />
                                <circle cx="57.9433" cy="57.9431" r="1.29337" transform="rotate(-90 57.9433 57.9431)"
                                    fill="#3056D3" />
                                <circle cx="57.9443" cy="24.0567" r="1.29337" transform="rotate(-90 57.9443 24.0567)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="46.5615" r="1.29337" transform="rotate(-90 1.29337 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="12.6751" r="1.29337" transform="rotate(-90 1.29337 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="46.5615" r="1.29337" transform="rotate(-90 12.6747 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="12.6751" r="1.29337" transform="rotate(-90 12.6747 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="46.5615" r="1.29337" transform="rotate(-90 24.0575 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="12.6751" r="1.29337" transform="rotate(-90 24.0575 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="46.5615" r="1.29337" transform="rotate(-90 35.4379 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="12.6751" r="1.29337" transform="rotate(-90 35.4379 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="46.5615" r="1.29337" transform="rotate(-90 46.8197 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="12.6751" r="1.29337" transform="rotate(-90 46.8197 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="46.5615" r="1.29337" transform="rotate(-90 68.807 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="12.6751" r="1.29337" transform="rotate(-90 68.807 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="57.9433" cy="46.5615" r="1.29337" transform="rotate(-90 57.9433 46.5615)"
                                    fill="#3056D3" />
                                <circle cx="57.9443" cy="12.6751" r="1.29337" transform="rotate(-90 57.9443 12.6751)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="35.1798" r="1.29337" transform="rotate(-90 1.29337 35.1798)"
                                    fill="#3056D3" />
                                <circle cx="1.29337" cy="1.2933" r="1.29337" transform="rotate(-90 1.29337 1.2933)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="35.1798" r="1.29337" transform="rotate(-90 12.6747 35.1798)"
                                    fill="#3056D3" />
                                <circle cx="12.6747" cy="1.2933" r="1.29337" transform="rotate(-90 12.6747 1.2933)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="35.1798" r="1.29337" transform="rotate(-90 24.0575 35.1798)"
                                    fill="#3056D3" />
                                <circle cx="24.0575" cy="1.29336" r="1.29337" transform="rotate(-90 24.0575 1.29336)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="35.1798" r="1.29337" transform="rotate(-90 35.4379 35.1798)"
                                    fill="#3056D3" />
                                <circle cx="35.4379" cy="1.29336" r="1.29337" transform="rotate(-90 35.4379 1.29336)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="35.18" r="1.29337" transform="rotate(-90 46.8197 35.18)"
                                    fill="#3056D3" />
                                <circle cx="46.8197" cy="1.29354" r="1.29337" transform="rotate(-90 46.8197 1.29354)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="35.18" r="1.29337" transform="rotate(-90 68.807 35.18)"
                                    fill="#3056D3" />
                                <circle cx="68.807" cy="1.29354" r="1.29337" transform="rotate(-90 68.807 1.29354)"
                                    fill="#3056D3" />
                                <circle cx="57.9443" cy="35.18" r="1.29337" transform="rotate(-90 57.9443 35.18)"
                                    fill="#3056D3" />
                                <circle cx="57.9443" cy="1.29354" r="1.29337" transform="rotate(-90 57.9443 1.29354)"
                                    fill="#3056D3" />
                            </svg>
                        </span>
                        <span class="absolute right-0 bottom-0">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21.5 21.5L0.505701 21.5C0.767606 10.023 10.023 0.767604 21.5 0.505697L21.5 21.5Z"
                                    stroke="#13C296" />
                            </svg>
                        </span>
                    </div>
                    <div class="text-center">
                        <h4 class="font-medium text-lg text-dark mb-2">
                            {{ $room->name }}
                        </h4>
                        <p class="font-medium text-sm text-body-color mb-5">
                            ${{ $room->price }} per night
                        </p>
                        <div class="flex items-center justify-center">
                            <a href="{{ route('room_detail',$room->id) }}"
                                class="text-base font-medium rounded-lg py-3 px-6 duration-300 ease-in-out" href="">
                                See detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>
<!-- ====== Team Section End -->

<!-- ====== Contact Start ====== -->
<section id="contact" class="py-20 md:py-[120px] relative">
    <div class="absolute z-[-1] w-full h-1/2 lg:h-[45%] xl:h-1/2 bg-[#f3f4fe] top-0 left-0"></div>
    <div class="container px-4">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="px-4 w-full lg:w-7/12 xl:w-8/12">
                <div class="ud-contact-content-wrapper">
                    <div class="ud-contact-title mb-12 lg:mb-[150px]">
                        <span class="text-dark font-semibold text-base mb-5">
                            CONTACT US
                        </span>
                        <h2 class="text-[35px] font-semibold">
                            Let's talk about <br />
                            Love to hear from you!
                        </h2>
                    </div>
                    <div class="flex flex-wrap justify-between mb-12 lg:mb-0">
                        <div class="flex max-w-full w-[330px] mb-8">
                            <div class="text-[32px] text-primary mr-6">
                                <svg width="29" height="35" viewBox="0 0 29 35" class="fill-current">
                                    <path
                                        d="M14.5 0.710938C6.89844 0.710938 0.664062 6.72656 0.664062 14.0547C0.664062 19.9062 9.03125 29.5859 12.6406 33.5234C13.1328 34.0703 13.7891 34.3437 14.5 34.3437C15.2109 34.3437 15.8672 34.0703 16.3594 33.5234C19.9688 29.6406 28.3359 19.9062 28.3359 14.0547C28.3359 6.67188 22.1016 0.710938 14.5 0.710938ZM14.9375 32.2109C14.6641 32.4844 14.2812 32.4844 14.0625 32.2109C11.3828 29.3125 2.57812 19.3594 2.57812 14.0547C2.57812 7.71094 7.9375 2.625 14.5 2.625C21.0625 2.625 26.4219 7.76562 26.4219 14.0547C26.4219 19.3594 17.6172 29.2578 14.9375 32.2109Z" />
                                    <path
                                        d="M14.5 8.58594C11.2734 8.58594 8.59375 11.2109 8.59375 14.4922C8.59375 17.7188 11.2187 20.3984 14.5 20.3984C17.7812 20.3984 20.4062 17.7734 20.4062 14.4922C20.4062 11.2109 17.7266 8.58594 14.5 8.58594ZM14.5 18.4297C12.3125 18.4297 10.5078 16.625 10.5078 14.4375C10.5078 12.25 12.3125 10.4453 14.5 10.4453C16.6875 10.4453 18.4922 12.25 18.4922 14.4375C18.4922 16.625 16.6875 18.4297 14.5 18.4297Z" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold mb-6">Our Location</h5>
                                <p class="text-base text-body-color">
                                    401 Broadway, 24th Floor, Orchard Cloud View, London
                                </p>
                            </div>
                        </div>
                        <div class="flex max-w-full w-[330px] mb-8">
                            <div class="text-[32px] text-primary mr-6">
                                <svg width="34" height="25" viewBox="0 0 34 25" class="fill-current">
                                    <path
                                        d="M30.5156 0.960938H3.17188C1.42188 0.960938 0 2.38281 0 4.13281V20.9219C0 22.6719 1.42188 24.0938 3.17188 24.0938H30.5156C32.2656 24.0938 33.6875 22.6719 33.6875 20.9219V4.13281C33.6875 2.38281 32.2656 0.960938 30.5156 0.960938ZM30.5156 2.875C30.7891 2.875 31.0078 2.92969 31.2266 3.09375L17.6094 11.3516C17.1172 11.625 16.5703 11.625 16.0781 11.3516L2.46094 3.09375C2.67969 2.98438 2.89844 2.875 3.17188 2.875H30.5156ZM30.5156 22.125H3.17188C2.51562 22.125 1.91406 21.5781 1.91406 20.8672V5.00781L15.0391 12.9922C15.5859 13.3203 16.1875 13.4844 16.7891 13.4844C17.3906 13.4844 17.9922 13.3203 18.5391 12.9922L31.6641 5.00781V20.8672C31.7734 21.5781 31.1719 22.125 30.5156 22.125Z" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold mb-6">How Can We Help?</h5>
                                <p class="text-base text-body-color">info@yourdomain.com</p>
                                <p class="text-base text-body-color">
                                    contact@yourdomain.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 w-full lg:w-5/12 xl:w-4/12">
                <div class="shadow-testimonial rounded-lg bg-white py-10 px-8 md:p-[60px] lg:p-10 2xl:p-[60px] sm:py-12 sm:px-10 lg:py-12 lg:px-10 wow fadeInUp"
                    data-wow-delay=".2s
          ">
                    <h3 class="font-semibold mb-8 text-2xl md:text-[26px]">
                        Send us a Message
                    </h3>
                    <form method="POST" action="{{ route('contact_submit') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="fullName" class="block text-xs text-dark">Full Name*</label>
                            <input type="text" name="name" placeholder="Adam Gelius"
                                class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-xs text-dark">Email*</label>
                            <input type="email" name="email" placeholder="example@yourmail.com"
                                class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                        </div>
                        <div class="mb-6">
                            <label for="phone" class="block text-xs text-dark">Phone*</label>
                            <input type="text" name="phone" placeholder="+885 1254 5211 552"
                                class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4" />
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-xs text-dark">Message*</label>
                            <textarea name="message" rows="1" placeholder="type your message here"
                                class="w-full border-0 border-b border-[#f1f1f1] focus:border-primary focus:outline-none py-4 resize-none"></textarea>
                        </div>
                        <div class="mb-0">
                            <button type="submit"
                                class="inline-flex items-center justify-center py-4 px-6 rounded text-white bg-primary text-base font-medium hover:bg-dark transition duration-300 ease-in-out">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Contact End ====== -->

<!-- ====== Pricing Section Start -->
<section id="pricing" class="bg-white pt-20 lg:pt-[120px] pb-12 lg:pb-[90px] relative z-20 overflow-hidden">
    <div class="container">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[620px]">
                    <span class="font-semibold text-lg text-primary mb-2 block">
                        Pricing Table
                    </span>
                    <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">
                        Our Pricing Plan
                    </h2>
                    <p class="text-lg sm:text-xl leading-relaxed sm:leading-relaxed text-body-color">
                        There are many variations of passages of Lorem Ipsum available
                        but the majority have suffered alteration in some form.
                    </p>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-center">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-20 shadow-pricing py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:p-12 mb-10 text-center wow fadeInUp"
                    data-wow-delay=".15s
          ">
                    <span class="text-dark font-medium text-base uppercase block mb-2">
                        STARTING FROM
                    </span>
                    <h2 class="font-semibold text-primary mb-9 text-[28px]">
                        $ 19.99/mo
                    </h2>

                    <div class="mb-10">
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            1 User
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            All UI components
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            Lifetime access
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            Free updates
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            Use on 1 (one) project
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            3 Months support
                        </p>
                    </div>
                    <div class="w-full">
                        <a href="javascript:void(0)"
                            class="inline-block text-base font-medium text-primary bg-transparent border border-[#D4DEFF] rounded-full text-center py-4 px-11 hover:text-white hover:bg-primary hover:border-primary transition duration-300 ease-in-out">
                            Purchase Now
                        </a>
                    </div>
                    <span class="absolute left-0 bottom-0 z-[-1] w-14 h-14 rounded-tr-full block bg-primary">
                    </span>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="bg-primary bg-gradient-to-b from-primary to-[#179BEE] rounded-xl relative z-10 overflow-hidden shadow-pricing py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:p-12 mb-10 text-center wow fadeInUp"
                    data-wow-delay=".1s
          ">
                    <span
                        class="inline-block py-2 px-6 border border-white rounded-full text-base font-semibold text-primary bg-white uppercase mb-5">
                        POPULAR
                    </span>
                    <span class="text-white font-medium text-base uppercase block mb-2">
                        STARTING FROM
                    </span>
                    <h2 class="font-semibold text-white mb-9 text-[28px]">
                        $ 19.99/mo
                    </h2>

                    <div class="mb-10">
                        <p class="text-base font-medium text-white leading-loose mb-1">
                            5 User
                        </p>
                        <p class="text-base font-medium text-white leading-loose mb-1">
                            All UI components
                        </p>
                        <p class="text-base font-medium text-white leading-loose mb-1">
                            Lifetime access
                        </p>
                        <p class="text-base font-medium text-white leading-loose mb-1">
                            Free updates
                        </p>
                        <p class="text-base font-medium text-white leading-loose mb-1">
                            Use on 1 (one) project
                        </p>
                        <p class="text-base font-medium text-white leading-loose mb-1">
                            4 Months support
                        </p>
                    </div>
                    <div class="w-full">
                        <a href="javascript:void(0)"
                            class="inline-block text-base font-medium text-dark bg-white border border-white rounded-full text-center py-4 px-11 hover:text-white hover:bg-dark hover:border-dark transition duration-300 ease-in-out">
                            Purchase Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 lg:w-1/3">
                <div class="bg-white rounded-xl relative z-10 overflow-hidden border border-primary border-opacity-20 shadow-pricing py-10 px-8 sm:p-12 lg:py-10 lg:px-6 xl:p-12 mb-10 text-center wow fadeInUp"
                    data-wow-delay=".15s
          ">
                    <span class="text-dark font-medium text-base uppercase block mb-2">
                        STARTING FROM
                    </span>
                    <h2 class="font-semibold text-primary mb-9 text-[28px]">
                        $ 70.99/mo
                    </h2>

                    <div class="mb-10">
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            1 User
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            All UI components
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            Lifetime access
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            Free updates
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            Use on unlimited project
                        </p>
                        <p class="text-base font-medium text-body-color leading-loose mb-1">
                            4 Months support
                        </p>
                    </div>
                    <div class="w-full">
                        <a href="javascript:void(0)"
                            class="inline-block text-base font-medium text-primary bg-transparent border border-[#D4DEFF] rounded-full text-center py-4 px-11 hover:text-white hover:bg-primary hover:border-primary transition duration-300 ease-in-out">
                            Purchase Now
                        </a>
                    </div>

                    <span class="absolute right-0 top-0 z-[-1] w-14 h-14 rounded-bl-full block bg-secondary">
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Pricing Section End -->

<!-- ====== About Section Start -->
<section id="about" class="pt-20 lg:pt-[120px] pb-20 lg:pb-[120px] bg-[#f3f4fe]">
    <div class="container">
        <div class="bg-white wow fadeInUp" data-wow-delay=".2s">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full px-4">
                    <div class="lg:flex items-center justify-between border overflow-hidden">
                        <div
                            class="lg:max-w-[565px] xl:max-w-[640px] w-full py-12 px-7 sm:px-12 md:p-16 lg:py-9 lg:px-16 xl:p-[70px]">
                            <span class="text-sm font-medium text-white py-2 px-5 bg-primary inline-block mb-5">
                                About Us
                            </span>
                            <h2 class="font-bold text-3xl sm:text-4xl 2xl:text-[40px] sm:leading-snug text-dark mb-6">
                                Brilliant Toolkit to Build Nextgen Website Faster.
                            </h2>
                            <p class="text-base text-body-color mb-9 leading-relaxed">
                                The main ‘thrust' is to focus on educating attendees on how
                                to best protect highly vulnerable business applications with
                                interactive panel discussions and roundtables led by subject
                                matter experts.
                            </p>
                            <p class="text-base text-body-color mb-9 leading-relaxed">
                                The main ‘thrust' is to focus on educating attendees on how
                                to best protect highly vulnerable business applications with
                                interactive panel.
                            </p>
                            <a href="javascript:void(0)"
                                class="inline-flex items-center justify-center py-4 px-6 rounded text-white bg-primary text-base font-medium hover:bg-opacity-90 hover:shadow-lg transition duration-300 ease-in-out">
                                Learn More
                            </a>
                        </div>
                        <div class="text-center">
                            <div class="relative inline-block z-10">
                                <img src="{{ asset('front_assets/images/about/about-image.svg') }}" alt="image"
                                    class="mx-auto lg:ml-auto" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== About Section End -->

@endsection