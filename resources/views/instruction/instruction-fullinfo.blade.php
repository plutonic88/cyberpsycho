@extends('layouts.master')


@section('content')





<a href='{{ url("/instruction/concept") }}' style="margin-left: 440px; margin-bottom: 10px;" id="nextbutton" class="btn btn-primary">Basic Questions and answers</a>


<div id="app">




<div  style="background-color: gray;">




<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" ></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3" ></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4" ></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5" ></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item item active" style="margin: 100px;">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/1.png')}}" alt="First slide">
    </div>
    <div class="carousel-item item" style="margin: 100px;">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/2.png')}}" alt="Second slide">
    </div>
    <div class="carousel-item  item" style="margin: 100px;">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/3.png')}}" alt="Third slide">
    </div>
    <div class="carousel-item item" style="margin: 100px;">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/4.png')}}" alt="Fourth slide">
    </div>
    <div class="carousel-item item" style="margin: 100px;">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/5.png')}}" alt="Fifth slide">
    </div>
    <div class="carousel-item  item" style="margin: 100px;">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/6.png')}}" alt="Sixth slide">
    </div>
  </div>
  
 
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>




</div>






<script src="{{ asset('js/instruction.js') }}"> </script>

<script type="text/javascript">
  
$(document).ready(function() { 

  alert("After completing reading the instructions, please click on 'Basic questions and answers");

});


</script>

  <!-- Carousel -->

@endsection('content')