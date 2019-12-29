@extends('admin.master.app')

@section('content')

    <!-- Main Container -->
    {{-- <main id="main-container">
        <!-- Page Content -->
        <div class="content content-full">
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #1 -->
                <div class="col-6 col-xl-3">
                    <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="si si-bag fa-3x text-primary"></i>
                            </div>
                            <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo" data-speed="1000" data-to="1500">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Sales</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="si si-wallet fa-3x text-primary"></i>
                            </div>
                            <div class="font-size-h3 font-w600 text-primary-darker">$<span data-toggle="countTo" data-speed="1000" data-to="780">0</span></div>
                            <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Earnings</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="si si-envelope-open fa-3x text-primary"></i>
                            </div>
                            <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo" data-speed="1000" data-to="15">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Messages</div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                        <div class="block-content block-content-full clearfix">
                            <div class="float-left mt-10 d-none d-sm-block">
                                <i class="si si-users fa-3x text-primary"></i>
                            </div>
                            <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo" data-speed="1000" data-to="4252">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Online</div>
                        </div>
                    </a>
                </div>
                <!-- END Row #1 -->
            </div>
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #2 -->
                <div class="col-md-6">
                    <div class="block block-themed block-mode-loading-refresh">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                Sales <small>This week</small>
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="pull-all">
                                <!-- Lines Chart Container -->
                                <canvas class="js-chartjs-dashboard-lines"></canvas>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="row items-push">
                                <div class="col-6 col-sm-4 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                    <div class="font-size-h4 font-w600">720</div>
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +16%
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                    <div class="font-size-h4 font-w600">160</div>
                                    <div class="font-w600 text-danger">
                                        <i class="fa fa-caret-down"></i> -3%
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Average</div>
                                    <div class="font-size-h4 font-w600">24.3</div>
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +9%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="block block-themed block-mode-loading-refresh">
                        <div class="block-header bg-primary">
                            <h3 class="block-title">
                                Earnings <small>This week</small>
                            </h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div class="pull-all">
                                <!-- Lines Chart Container -->
                                <canvas class="js-chartjs-dashboard-lines2"></canvas>
                            </div>
                        </div>
                        <div class="block-content bg-white">
                            <div class="row items-push">
                                <div class="col-6 col-sm-4 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                                    <div class="font-size-h4 font-w600">$ 6,540</div>
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +4%
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                                    <div class="font-size-h4 font-w600">$ 1,525</div>
                                    <div class="font-w600 text-danger">
                                        <i class="fa fa-caret-down"></i> -7%
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4 text-center text-sm-left">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Balance</div>
                                    <div class="font-size-h4 font-w600">$ 9,352</div>
                                    <div class="font-w600 text-success">
                                        <i class="fa fa-caret-up"></i> +35%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Row #2 -->
            </div>
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #3 -->
                <div class="col-md-4">
                    <div class="block">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <i class="fa fa-envelope-open fa-4x text-primary"></i>
                                </div>
                                <div class="font-size-h4 font-w600">9.25k Subscribers</div>
                                <div class="text-muted">Your main list is growing!</div>
                                <div class="pt-20">
                                    <a class="btn btn-rounded btn-alt-primary" href="javascript:void(0)">
                                        <i class="fa fa-cog mr-5"></i> Manage list
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <i class="fa fa-twitter fa-4x text-info"></i>
                                </div>
                                <div class="font-size-h4 font-w600">+36 followers</div>
                                <div class="text-muted">You are doing great!</div>
                                <div class="pt-20">
                                    <a class="btn btn-rounded btn-alt-info" href="javascript:void(0)">
                                        <i class="fa fa-users mr-5"></i> Check them out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <div class="block-content block-content-full">
                            <div class="py-20 text-center">
                                <div class="mb-20">
                                    <i class="fa fa-check fa-4x text-success"></i>
                                </div>
                                <div class="font-size-h4 font-w600">Business Plan</div>
                                <div class="text-muted">This is your current active plan</div>
                                <div class="pt-20">
                                    <a class="btn btn-rounded btn-alt-success" href="javascript:void(0)">
                                        <i class="fa fa-arrow-up mr-5"></i> Upgrade to VIP
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Row #3 -->
            </div>
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #4 -->
                <div class="col-md-6">
                    <a class="block block-link-shadow overflow-hidden" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <i class="si si-briefcase fa-2x text-body-bg-dark"></i>
                            <div class="row py-20">
                                <div class="col-6 text-right border-r">
                                    <div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
                                        <div class="font-size-h3 font-w600">16</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Projects</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
                                        <div class="font-size-h3 font-w600">2</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a class="block block-link-shadow overflow-hidden" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="text-right">
                                <i class="si si-users fa-2x text-body-bg-dark"></i>
                            </div>
                            <div class="row py-20">
                                <div class="col-6 text-right border-r">
                                    <div class="invisible" data-toggle="appear" data-class="animated fadeInLeft">
                                        <div class="font-size-h3 font-w600 text-info">63250</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Accounts</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="invisible" data-toggle="appear" data-class="animated fadeInRight">
                                        <div class="font-size-h3 font-w600 text-success">97%</div>
                                        <div class="font-size-sm font-w600 text-uppercase text-muted">Active</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Row #4 -->
            </div>
            <div class="row gutters-tiny invisible" data-toggle="appear">
                <!-- Row #5 -->
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-link-shadow text-center" href="be_pages_generic_inbox.html">
                        <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                            <div class="ribbon-box">15</div>
                            <p class="mt-5">
                                <i class="si si-envelope-letter fa-3x"></i>
                            </p>
                            <p class="font-w600">Inbox</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-link-shadow text-center" href="be_pages_generic_profile.html">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-user fa-3x"></i>
                            </p>
                            <p class="font-w600">Profile</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-link-shadow text-center" href="be_pages_forum_categories.html">
                        <div class="block-content ribbon ribbon-bookmark ribbon-primary ribbon-left">
                            <div class="ribbon-box">3</div>
                            <p class="mt-5">
                                <i class="si si-bubbles fa-3x"></i>
                            </p>
                            <p class="font-w600">Forum</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-link-shadow text-center" href="be_pages_generic_search.html">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-magnifier fa-3x"></i>
                            </p>
                            <p class="font-w600">Search</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-link-shadow text-center" href="be_comp_charts.html">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-bar-chart fa-3x"></i>
                            </p>
                            <p class="font-w600">Live Stats</p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-xl-2">
                    <a class="block block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content">
                            <p class="mt-5">
                                <i class="si si-settings fa-3x"></i>
                            </p>
                            <p class="font-w600">Settings</p>
                        </div>
                    </a>
                </div>
                <!-- END Row #5 -->
            </div>
        </div>
        <!-- END Page Content -->
    </main> --}}
    <!-- END Main Container -->


@endsection



@section('js')


<script type="text/javascript">


    var BePagesDashboard = function() {
        // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
        var initDashboardChartJS = function () {
            // Set Global Chart.js configuration
            Chart.defaults.global.defaultFontColor              = '#555555';
            Chart.defaults.scale.gridLines.color                = "transparent";
            Chart.defaults.scale.gridLines.zeroLineColor        = "transparent";
            Chart.defaults.scale.display                        = false;
            Chart.defaults.scale.ticks.beginAtZero              = true;
            Chart.defaults.global.elements.line.borderWidth     = 2;
            Chart.defaults.global.elements.point.radius         = 5;
            Chart.defaults.global.elements.point.hoverRadius    = 7;
            Chart.defaults.global.tooltips.cornerRadius         = 3;
            Chart.defaults.global.legend.display                = false;

            // Chart Containers
            var chartDashboardLinesCon  = jQuery('.js-chartjs-dashboard-lines');
            var chartDashboardLinesCon2 = jQuery('.js-chartjs-dashboard-lines2');

            // Chart Variables
            var chartDashboardLines, chartDashboardLines2;

            // Lines Charts Data
            var chartDashboardLinesData = {
                labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                datasets: [
                    {
                        label: 'This Week',
                        fill: true,
                        backgroundColor: 'rgba(66,165,245,.25)',
                        borderColor: 'rgba(66,165,245,1)',
                        pointBackgroundColor: 'rgba(66,165,245,1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(66,165,245,1)',
                        data: [25, 21, 23, 38, 36, 35, 39]
                    }
                ]
            };

            var chartDashboardLinesOptions = {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMax: 50
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return ' ' + tooltipItems.yLabel + ' Sales';
                        }
                    }
                }
            };

            var chartDashboardLinesData2 = {
                labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                datasets: [
                    {
                        label: 'This Week',
                        fill: true,
                        backgroundColor: 'rgba(156,204,101,.25)',
                        borderColor: 'rgba(156,204,101,1)',
                        pointBackgroundColor: 'rgba(156,204,101,1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(156,204,101,1)',
                        data: [190, 219, 235, 320, 360, 354, 390]
                    }
                ]
            };

            var chartDashboardLinesOptions2 = {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMax: 480
                        }
                    }]
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return ' $ ' + tooltipItems.yLabel;
                        }
                    }
                }
            };

            // Init Charts
            if ( chartDashboardLinesCon.length ) {
                chartDashboardLines  = new Chart(chartDashboardLinesCon, { type: 'line', data: chartDashboardLinesData, options: chartDashboardLinesOptions });
            }

            if ( chartDashboardLinesCon2.length ) {
                chartDashboardLines2 = new Chart(chartDashboardLinesCon2, { type: 'line', data: chartDashboardLinesData2, options: chartDashboardLinesOptions2 });
            }
        };

        return {
            init: function () {
                // Init Chart.js Charts
                initDashboardChartJS();
            }
        };
    }();

    // Initialize when page loads
    jQuery(function(){ BePagesDashboard.init(); });

</script>

@endsection
