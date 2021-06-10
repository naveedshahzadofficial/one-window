@extends('_layouts.admin.app')
@push('title','All SMEs Admin Panel')
@section('content')

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Dashboard</h3>
            </div>

        </div>
        <div class="card-body">

            <div style="min-width: 310px; min-height: 400px; margin: 0 auto; margin-top: 30px;" id="smes_column_bar_graph" class="flot-chart"></div>

        </div>
    </div>
@endsection

@push('post-scripts')
    <script src="{{ asset('assets/plugins/highchart/highcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/highchart/exporting.js') }}"></script>

    <script>

    Highcharts.setOptions({
            lang: {
                thousandsSep: ','
            }
        });

        var smes_graph_obj = Highcharts.chart('smes_column_bar_graph', {
            chart: {
                type: 'column',
                style: {
                    color: "#000"
                },
                height: '400px'
            },
           // colors:['#716ACA','#95CEFF','#F76BC1','#4a813e','#F71610'],
            title: {
                text: 'SMEs Graph'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: <?php echo isset($smes_graph_data['provinces'])?$smes_graph_data['provinces']:'[]';?>,
                labels: {
//useHTML: true,
                    formatter: function () {
                        var index_url = 'javascirpt:;';
                        //index_url = index_url.replace('did', this.value.id);
                        return '<a href="' + index_url + '">' + this.value.province_name + '</a>';
                    }
                }
            },
            yAxis: {
                min: 0,
                tickInterval: 100,
                title: {
                    text: ''
                },
                labels: {
                    style: {
                        color: '#000'
                    }

                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: 0,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor:
                    Highcharts.defaultOptions.legend.backgroundColor || 'white',
// borderColor: '#CCC',
// borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x.name}</b><br/>',
                pointFormat: 'SMEs: <b>{point.stackTotal:,.0f}</b>'
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function () {
                                location.href = this.options.url;
                            }
                        }
                    },
                },
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        formatter: function() {
                            if (this.y > 0) {
                                return this.y;
                            }
                        },
                        enabled: false
                    }
                }
            },
            //colors:['#716ACA','#95CEFF','#F76BC1','#4a813e','#F71610'],
            series:<?php echo isset($smes_graph_data['series'])?json_encode($smes_graph_data['series']):'[]';?>
        });

    </script>

@endpush
