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
            <div class="container" style="position: relative;">
                <div id="mloader" class="m-loader m-loader--lg m-loader--success" style="z-index: 999999; height: 300px; width: 100px; position: absolute; left: 50%; margin-left: -50px; top: 50%; margin-top: -50px;"></div>
            </div>
            <div style="min-width: 310px; min-height: 400px; margin: 0 auto; margin-top: 30px;" id="smes_column_bar_graph" class="flot-chart"></div>

        </div>
    </div>
@endsection

@push('post-scripts')
    <script src="{{ asset('assets/plugins/highchart/highcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/highchart/exporting.js') }}"></script>

    <script>
        function mLoaderHide() {
            setTimeout(function () {
                $('#mloader').css('display','none');
            }, 600);
        }

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
                text: 'SMEs Province Graph'
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: <?php echo isset($province_graph_data['provinces'])?$province_graph_data['provinces']:'[]';?>,
                labels: {
//useHTML: true,
                    formatter: function () {
                        var index_url = 'javascirpt:;';
                        //index_url = index_url.replace('did', this.value.id);
                        return '<a onclick="filterGraphData('+this.value.id+')" href="javascript:;" >'+ this.value.province_name + '</a>';
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
                                //location.href = this.options.url;
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
            series:<?php echo isset($province_graph_data['series'])?json_encode($province_graph_data['series']):'[]';?>
        });

    function filterGraphData(province_id) {
        $('#mloader').css('display','block');

        $.post('{{ route('admin.dashboard.district-graph-ajax') }}',{province_id:province_id},function(response){
            var chart = $('#bar_chart_div').highcharts();
            if (response.status) {
                chart.series[0].setData(response.data[0]);
                chart.series[1].setData(response.data[1]);
                mLoaderHide();
            }else{
                smes_graph_obj.series[0].setData([]);
                mLoaderHide();
            }

        },"json");
    }

    </script>

@endpush