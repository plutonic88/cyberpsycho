@extends('layouts.master')


@section('content')




<div id="app"></div>

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


                    
                  
                      <node  :id="0"  class=" buton node0-pos " v-bind:neighbors="[]"  v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]"  v-bind:nodevalues= "[10, 8, 1]"></node>
                      <node :id="1" class="  buton node1-pos " v-bind:neighbors="[]" v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]" v-bind:nodevalues= "[10, 2, 1]"></node> 
                      <node :id="2"  class="buton node2-pos" v-bind:neighbors="[]"  v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]" v-bind:nodevalues= "[4, 2, 1]"></node>
                      <node :id="3" class="buton node3-pos " v-bind:neighbors="[]" v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]" v-bind:nodevalues= "[4, 8, 1]" ></node>
                      <node :id="4" class="buton node4-pos " v-bind:neighbors="[]" v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]" v-bind:nodevalues= "[10, 5, 1]" ></node>
                      <node :id="5" class="buton node5-pos " v-bind:neighbors="[]" v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]" v-bind:nodevalues= "[0, 0, 0]" ></node>
                      

                    
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










<script src="{{ asset('js/webgazer.js') }}" type="text/javascript"> </script>


<script src="{{ asset('js/app-fullinfo.js') }}"> </script>

<script type="text/javascript">
  
  if(window.screen.availWidth<1024)
  {
    alert("Set your screen resolution to atleast 1024X640, for best experience set the screen resolution to 1280X800 ");
  }
  
</script>





@endsection('content')