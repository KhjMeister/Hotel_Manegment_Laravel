@extends('customer.layout.app')

@section('heading','Dashboard')


@section('page_scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('js/chart.sample.js') }}"></script>
@endsection

@section('main_content')


<section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            connections
                        </h3>
                        <h1>
                            {{ $total_completed_orders }}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-blue-500"><i
                            class="mdi mdi-account-multiple mdi-48px"></i></span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Completed Orders
                        </h3>
                        <h1>
                            {{ $total_completed_orders }}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-green-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                        <h3>
                            Pending Orders
                        </h3>
                        <h1>
                            {{ $total_pending_orders }}
                        </h1>
                    </div>
                    <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-finance"></i></span>
                Performance
            </p>
            <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
            </a>
        </header>
        <div class="card-content">
            <div class="chart-area">
                <div class="h-full">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div></div>
                        </div>
                    </div>
                    <canvas id="big-line-chart" width="2992" height="1000" class="chartjs-render-monitor block"
                        style="height: 400px; width: 1197px;"></canvas>
                </div>
            </div>
        </div>
    </div>




</section>




@endsection