@extends('layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card mb-4">
            <div class="card-header border-bottom">
                <a class="btn btn-primary" href='{{ route('home') }}' style="float:right">
                    <i class="fa fa-arrow-left"> </i>&nbsp; Back to search </a>
                <h5 class="card-title">Search Result for <strong>{{ $company->company_name }}({{ $company->symbol }})</strong> : in date range From {{$start_date}} to {{$end_date}}</h5>
                </p>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-result table border-top">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Open</th>
                            <th>High</th>
                            <th>Low</th>
                            <th>Close</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prices as $price)
                            <tr>
                                <td>{{ $price['date'] }}</td>
                                <td>{{ $price['open'] }}</td>
                                <td>{{ $price['high'] }}</td>
                                <td>{{ $price['low'] }}</td>
                                <td>{{ $price['close'] }}</td>
                                <td>{{ $price['volume'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title">{{ __('Chart') }}</h5>
            </div>
            <div class="card-action-element py-0">
                <div class="card-body">
                    <div id="barChart"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet"
        href="{{ asset('frest-assets') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('frest-assets') }}/vendor/libs/bootstrap-select/bootstrap-select.css">
@endpush

@push('scripts')
    <script src="{{ asset('frest-assets') }}/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="{{ asset('frest-assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('frest-assets') }}/js/search-result.js"></script>

    {{-- <script src="{{ asset('frest-assets') }}/js/charts-apex.js"></script> --}}
    <script>

        var dateRanges = @php echo json_encode($date_ranges) @endphp;
        var openData = @php echo json_encode($open_prices) @endphp;
        var closeData = @php echo json_encode($close_prices) @endphp;

        var options = {
            chart: {
                height: 400,
                fontFamily: 'IBM Plex Sans',
                type: 'bar',
                parentHeightOffset: 0,
                toolbar :{
                    show:false
                }
            },

            series: [{
                name : 'Open',
                data: openData
            }, {
                name : 'Close',
                data: closeData
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
            tooltip: {
                shared: true,
                intersect: false
            },
            xaxis: {
                categories: dateRanges,
                labels: {
                    style: {
                        colors: '#fff',
                        fontSize: '13px'
                    }
                }
            },
            yaxis: {
                decimalsInFloat:2,
                labels: {
                    style: {
                        colors: '#fff',
                        fontSize: '13px'
                    }
                }
            },
            labels: {
                style: {
                    colors: '#fff',
                    fontSize: '13px'
                }
            },
            grid: {
                borderColor: '#fff',
                xaxis: {
                    lines: {
                        show: false
                    }
                }
            },
            legend: {
            show: true,
            position: 'bottom',
            labels: {
                colors: '#fff',
                useSeriesColors: false
            }
        },
        };

        var chart = new ApexCharts(document.querySelector("#barChart"), options);
        chart.render();
    </script>
@endpush
