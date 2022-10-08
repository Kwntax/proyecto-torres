@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>UTT</h1>
@stop

@section('content')

  <!--Carousel Wrapper-->
  <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

    <!--Controls-->
    <div class="controls-top">
      <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
      <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
    </div>


    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
      <li data-target="#multi-item-example" data-slide-to="1"></li>

    </ol>


    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        @foreach ($collection as $item)
        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="{{$item['foto']}}" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">{{$item['nombreCompleto']}}</h4>
              <p class="card-text">{{$item['matricula']}}</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>
        @endforeach
        
      </div>


      <!--Second slide-->
      <div class="carousel-item">

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

        <div class="col-md-1" alt="100x100" style="float:left ">
          <div class="card mb-1">
            <img class="card-img-top rounded-circle"
                 src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title">Card title</h4>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
              <a href="#" class="btn btn-primary">Button</a>
            </div>
          </div>
        </div>

      </div>




    </div>


  </div>
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop