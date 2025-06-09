@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center ">Platform Statistics</h1>

        <!-- Aggregated Stats Section with background -->
        <div class="bg-light rounded-3 p-4 mb-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ([
                    ['label'=>'Total Invested','value'=>$aggregatedStats['totalInvested'],'icon'=>'bi-cash-stack','color'=>'primary'],
                    ['label'=>'Total Interest','value'=>$aggregatedStats['totalInterest'],'icon'=>'bi-percent','color'=>'success'],
                    ['label'=>'Avg. Portfolio','value'=>$aggregatedStats['averagePortfolio'],'icon'=>'bi-graph-up','color'=>'info']
                  ] as $stat)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <!-- Icon in colored circle -->
                                <div class="rounded-circle bg-{{ $stat['color'] }} bg-opacity-10 p-3 mb-3">
                                    <i class="bi {{ $stat['icon'] }} fs-1 text-{{ $stat['color'] }}"></i>
                                </div>
                                <h5 class="card-title mb-2">{{ $stat['label'] }}</h5>
                                <p class="display-6 fw-bold mb-0">{{ $stat['value'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- Charts Section -->
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100 chart-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4" >Monthly Investments (EUR)</h5>
                        <div class="chart-container mb-3">
                            <canvas id="investmentsChart"
                                    data-labels='@json($monthlyInvestments["labels"])'
                                    data-values='@json($monthlyInvestments["data"])'>
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100 chart-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Portfolio Breakdown (Pie)</h5>
                        <div class="chart-container mb-3">
                            <canvas id="portfolioChart"
                                    data-labels='@json($portfolioBreakdown["labels"])'
                                    data-values='@json($portfolioBreakdown["data"])'
                                    data-colors='@json($portfolioBreakdown["colors"])'>
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100 chart-card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Portfolio Breakdown (Donut)</h5>
                        <div class="chart-container mb-3">
                            <canvas id="portfolioDonutChart"
                                    data-labels='@json($portfolioBreakdown["labels"])'
                                    data-values='@json($portfolioBreakdown["data"])'
                                    data-colors='@json($portfolioBreakdown["colors"])'>
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
