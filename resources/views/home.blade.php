{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    {{ __('You are logged in!') }}
</div>
</div>
</div>
</div>
</div>
@endsection --}}

@extends('dashboard.layout')
@section('content')
<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div style="background: -webkit-linear-gradient(-45deg, rgba(61,202,237,1) 0%, rgba(21,119,143,1) 100%);"
                    class="small-box">
                    <div class="inner">
                        <h3 style="color: #004F84">{{$count_articulo}}</h3>

                        <p style="color: #034069">Articulos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('articulo')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div style="background: -moz-linear-gradient(top, rgba(48,201,81,1) 0%, rgba(14,92,31,1) 100%); box-shadow: 10px 17px 17px -11px rgba(0,0,0,0.75);"
                    class="small-box">
                    <div class="inner">
                        <h3 style="color: #0E571E">{{$count_ingreso}}</h3>

                        <p style="color: #0a4216">Ingresos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('ingreso')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div style="background: -moz-linear-gradient(top, rgba(255,193,7,1) 0%, rgba(255,193,7,1) 20%, rgba(196,148,18,1) 100%); box-shadow: 10px 17px 17px -11px rgba(0,0,0,0.75);"
                    class="small-box">
                    <div class="inner">
                        <h3 style="color: #8f6c0c">{{$count_cliente}}</h3>

                        <p style="color: #83630b">Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('cliente/index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div style="background: -moz-linear-gradient(top, rgba(220,53,69,1) 0%, rgba(220,53,69,1) 18%, rgba(156,25,43,1) 94%, rgba(156,25,43,1) 100%); box-shadow: 10px 17px 17px -11px rgba(0,0,0,0.75);"
                    class="small-box">
                    <div class="inner">
                        <h3 style="color: #5c101a">{{$count_proveedor}}</h3>

                        <p style="color: #5a0f19">Proveedores</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('proveedor/index')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        {{-- cositos --}}

        <!-- /.content -->
    </div>
    {{-- ANYCHART --}}
    <style>


    </style>

    
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6">

            {{-- ARE CHARTTTTT --}}

            {{-- GO --}}

            <div class="card card-danger " >
                <div class="card-header">
                    <h3 class="card-title">Barras</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="bar-chart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    {{-- <canvas id="bar-chart" width="100" height="100"> </canvas> --}}


                    <script>
                        // Bar chart
                        new Chart(document.getElementById("bar-chart"), {
                            type: 'bar',
                            data: {
                                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                datasets: [{
                                    label: "Population (millions)",
                                    backgroundColor: ["#004E82", "#4D298E", "#1D8D35", "#DC3545","#f40e89"],
                                    data: [2478, 3000, 734, 784, 433]
                                }]
                            },
                            options: {
                                legend: {
                                    display: false
                                },
                                
                            }
                        });

                    </script>
                      </div>
                </div>

            </div>
            {{-- END --}}
            
            {{-- GO --}}
                <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">pie</h3>
                    
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                            class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                            class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="pie-chart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <script>
                        new Chart(document.getElementById("pie-chart"), {
                            type: 'pie',
                            data: {
                                labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                datasets: [{
                                    label: "Population (millions)",
                                    backgroundColor: ["#4D1882", "#019822", "#FFC107", "#DC3545",
                                        "#EB007D"
                                    ],
                                    data: [589, 400, 734, 784, 433]
                                }]
                            },
                            options: {
                                
                            }
                        });

                    </script>
                </div>
            </div>

            </div>
            {{-- END --}}
            
            {{-- GO --}}
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Linea</h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="line-chart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    
                    <script>
                        new Chart(document.getElementById("line-chart"), {
                            type: 'line',
                            data: {
                                labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
                                datasets: [{
                                    data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                                    label: "Africa",
                                    borderColor: "#3e95cd",
                                    fill: false
                                }, {
                                    data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],
                                    label: "Asia",
                                    borderColor: "#8e5ea2",
                                    fill: false
                                }, {
                                    data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],
                                    label: "Europe",
                                    borderColor: "#3cba9f",
                                    fill: false
                                }, {
                                    data: [40, 20, 10, 16, 24, 38, 74, 167, 508, 784],
                                    label: "Latin America",
                                    borderColor: "#e8c3b9",
                                    fill: false
                                }, {
                                    data: [6, 3, 2, 2, 7, 26, 82, 172, 312, 433],
                                    label: "North America",
                                    borderColor: "#c45850",
                                    fill: false
                                }]
                            },
                            options: {
                               
                            }
                        });

                    </script>
                    </div>
                </div>
            </div>
            {{-- END --}}




      
    </div>
    </div>
</section>

@endsection
