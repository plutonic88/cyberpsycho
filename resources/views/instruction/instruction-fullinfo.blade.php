@extends('layouts.master')


@section('content')





<a href='{{ url("/instruction/concept") }}' style="margin-left: 440px; margin-bottom: 10px;" id="nextbutton" class="btn btn-primary disable">You are Done! Click here</a>


<div id="app">




<div class="container" style="background-color: gray;">




<div id="Carousel" class="carousel slide carousel-fade" data-ride="carousel">
  

  <ol class="carousel-indicators ">
      <li data-target="#Carousel" data-slide-to="0" class="active"></li>
      <li data-target="#Carousel" data-slide-to="1" ></li>
      <li data-target="#Carousel" data-slide-to="2" ></li>
      <li data-target="#Carousel" data-slide-to="3" ></li>
      <li data-target="#Carousel" data-slide-to="4" ></li>
      <li data-target="#Carousel" data-slide-to="5" ></li>
    </ol>

  <div class="carousel-inner" role="listbox">
    <div class="carousel-item item active" style="margin: 100px;" id="0">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/1.png')}}" alt="First slide">
    </div>
    <div class="carousel-item item" style="margin: 100px;" id="1">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/2.png')}}" alt="Second slide">
    </div>
    <div class="carousel-item  item" style="margin: 100px;" id="2">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/3.png')}}" alt="Third slide">
    </div>
    <div class="carousel-item item" style="margin: 100px;" id="3">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/4.png')}}" alt="Fourth slide">
    </div>
    <div class="carousel-item item" style="margin: 100px;" id="4">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/5.png')}}" alt="Fifth slide">
    </div>
    <div class="carousel-item  item" style="margin: 100px;" id="5">
      <img class="d-block img-fluid" style="width: 80%; height: 100%" src="{{URL::asset('/image/instruction-fullinfo/6.png')}}" alt="Sixth slide">
    </div>
  </div>
  
 
  <a class="carousel-control-prev" href="#Carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#Carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>




</div>






  <script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


  

  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



  
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">


var slides = [1, 0, 0, 0, 0, 0];
var curslide = 0;
var prevslide = -1;
var d = new Date();
var n = d.getTime();

var starttime = d.getTime();
var duration = 0.0;





  
$(document).ready(function() { 


  $("#nextbutton").click(function(){


    d = new Date();
    n = d.getTime();

    duration = (n - starttime)/1000.0;


      axios.post('/instruction/storeend', {
                
                slide : curslide,
                duration : duration, 

              }).then(response => this.returndata = response.data);

        
    });


      
  }); 




$('#Carousel').carousel({
     interval: false
  });

var slides = [1, 0, 0, 0, 0, 0];



$('#Carousel').on('slid.bs.carousel', function (e) {
  
  var currentItem = $(e.relatedTarget);

  var index = parseFloat($(currentItem).attr('id'));

  slides[index%6] = 1;

  //console.log("slide "+ parseFloat($(currentItem).attr('id')));

  //if($(currentItem).attr('id') === "5")
 // {
    //$("#nextbutton").removeClass("disable");
 // }
 //// else
 // {



    d = new Date();
    n = d.getTime();

    duration = (n - starttime)/1000.0;

    starttime = n;


    prevslide = curslide;
    curslide = index;







    axios.post('/instruction/storeend', {
              
              slide : prevslide,
              duration : duration, 

            }).then(response => this.returndata = response.data);

    

     console.log("curslide "+ curslide + ", prevslide "+prevslide + ", duration "+ duration);





    var flag = true;
    for(var i=0; i<6; i++)
    {
      if(slides[i] === 0)
      {
        flag=false;
        break;
      }
    }
    if(flag==true)
    {
      $("#nextbutton").removeClass("disable");
    }

 // }

  
});



</script>







  <!-- Carousel -->

@endsection('content')
