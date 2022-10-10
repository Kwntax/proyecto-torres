@extends('adminlte::page')

@section('title', 'Dashboard')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<!-- Flag sprites service provided by Martijn Lafeber,
  https://github.com/lafeber/world-flags-sprite/blob/master/LICENSE -->
<link rel="stylesheet" type="text/css" href="https://github.s3.amazonaws.com/downloads/lafeber/world-flags-sprite/flags32.css">
<script  src="/javascript/script.js" type="module"> </script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content_header')

    <h1>UTT</h1>
@stop

@section('content')
    <!--Slides-->
    <div id="carouselControls" class="carousel " data-bs-ride="carousel">

      <!--Controls-->
      <div class="controls-top">
        <a class="btn-floating" href="#carouselControls" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
        <a class="btn-floating" href="#carouselControls" data-slide="next"><i class="fas fa-chevron-right"></i></a>
      </div>

    <div class="col-12 row">
        <div class="col-2 ">
          @foreach ($collection as $item)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}"> 
            <div class="card">
              <div class="img-wrapper">
                <img src="{{$item['foto']}}"  alt="Alumno">
                    </div>
                <div class="card-body">
                  <h5 class="card-title">{{$item['nombreCompleto']}}</h5>
                  <p class="card-text">{{$item['matricula']}}</p>
                  <a href="{{route('post.edit', $item['matricula'])}}" class="btn btn-primary">informacion </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="col-10">
          <div class="container card">
            @foreach($collectionGroup as $itemGrupo)
            <h6>{{}}</h6>
            <h6></h6>
            <h6></h6>
          @endforeach
          </div>
        </div>
    </div>
  <div class="container card">
    @yield('second_content')
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop