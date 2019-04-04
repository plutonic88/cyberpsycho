@extends('layouts.master')


@section('content')




<div id="app" class="container">
  

<!-- Button trigger modal -->

<button type="button"  class="btn btn-primary" style="margin-left: 358px;" data-toggle="modal" data-target="#exampleModalLong">
  Quick Tips
</button>
            

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Need a refresher on the rules?
</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <ul>
          <li>In round 1, the defender controls all nodes.</li>
          <li>You and the defender both make one move per round.</li>
         <li>Defender controlled nodes are in <span style="color: blue;">BLUE</span>, and nodes you control are in <span style="color: red;">RED</span>.</li>
           <li>To attack a node, you pay the cost associated.</li>
          <li>Whenever you control a node, you gain its value points. If you hold a node for multiple rounds, you gain the points of that node every single one of those rounds.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>





<div id="app2" >

      <!<button class="eye-buton eye-buton-pos" v-bind:style="eyecord">
      <!</button>

      <div class="row" id="cardrow" style="width: auto; height: auto;">
        <div class="col-sm-9">
          <div class="card card-outline-primary" style="width: 100%; height: 21.5rem;">
            <div class="card-block">

              <h5 class="card-title">Game {{ $game_instance }}</h5>

                  

                  <a id="startbutton" class="btn btn-primary startbutton"  @click="startTimer">Click to start</a>
              
                  <a href='{{ url("/instruction/gameend") }}' id="nextbutton" class="btn btn-primary visible disable nextbutton">Your total score</a>

                  <a href='#' @click="gotonextgame" id="nextgamebutton" class="btn btn-primary visible disable nextgamebutton">Next Game</a>




                  <button id="confirmbutton" class="btn btn-primary confirmbutton visible" @click="confirmAttack">Confirm</button>


                  <div id="nodebuttons" class="visible">


                      
                    @foreach ($node_ids as $id)
                  

                         <node  :id="{{$id}}"  class=" {{$node_pos[$id]}}" v-bind:neighbors="[]"  v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]"  v-bind:nodevalues= "{{  json_encode($nodevalues[$id]) }}"></node>
                      
                      
                    @endforeach
                    
                    
                      </div>

              
            </div>
          </div>
        </div>


        <div class="col-sm-3">
          <div class="card card-outline-primary " style="width: auto;">
            <div class="card-block">
              <h3 class="card-title"> </h3>
              
              
              
              
             <h5 class="timerclass">Timer : @{{ timer }}</h5>
              
              <h5>Round : @{{ numberofround }} (@{{ROUND_LIMIT}})</h5>
              <h5>Points : @{{attackerpoints}}</h5>

              <div style="background-color: gray"><p style="color: blue;">Log</p></div>
              <div id="log">

              </div>
              

              
            </div>
          </div>
        </div>


        
      </div>





</div>








<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>




<script src="{{ asset('js/webgazer.js') }}" type="text/javascript"> </script>

<script src="{{ asset('js/app-fullinfov2.js') }}"> </script>

<script type="text/javascript">
  

  alert("Please, do not reload page or use the back button while playing game. You will not be paid if you do so.");

  if(window.screen.availWidth<1024)
  {
    alert("Set your screen resolution to atleast 1024X640, for best experience set the screen resolution to 1280X800 ");
  }
  
</script>





@endsection('content')