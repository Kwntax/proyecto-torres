@extends('adminlte::page')

@section('title', 'Dashboard')


<script  src="/javascript/script.js" type="module"> </script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@section('content_header')

    <h1>UTT</h1>
@stop

@section('content')

  

  
    <!--Slides-->
    <div id="carouselExampleControls" class="carousel " data-bs-ride="carousel">

      <!--Controls-->
      <div class="controls-top">
      <a class="btn-floating" href="#carouselExampleControls" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
      <a class="btn-floating" href="#carouselExampleControls" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>



  <div class="carousel-inner">
  @foreach ($collection as $item)
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}"> 
    <div class="card">
      <div class="img-wrapper">
  <img src="{{$item['foto']}}"  alt="Alumno">
      </div>
  <div class="card-body">
    <h5 class="card-title">{{$item['nombreCompleto']}}</h5>
    <p class="card-text">{{$item['matricula']}}</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
  </div>
@endforeach
    
  
</div>

<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>


  
  <canvas id="myChart" width="400" height="400"></canvas>
  <script>
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop