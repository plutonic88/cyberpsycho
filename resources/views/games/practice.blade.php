@extends('layouts.master')


@section('content')






<div id="prac">



      <div class="row" id="cardrow">
        <div class="col-sm-9">
          <div class="card card-outline-primary" style="width: 52rem; height: 21.5rem;">
            <div class="card-block">

              <h5 class="card-title">Practice Game</h5>

                  

                  <a id="startbutton" class="btn btn-primary startbutton"  @click="startTimer">Click to start</a>
              
                  <a href='{{ url("games/play") }}' id="nextbutton" class="btn btn-primary visible disable nextbutton">Play Real Game</a>

                  <button id="confirmbutton" class="btn btn-primary confirmbutton visible" @click="confirmAttack">Confirm</button>


                  <div id="nodebuttons" class="visible">


                    
                  
                      <node :id="0"  class=" buton node0-pos " v-bind:neighbors="[]"  v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]"  v-bind:nodevalues= "[15, 5, 1]"></node>
                      <node :id="1" class="  buton node1-pos " v-bind:neighbors="[]" v-on:applied="onCouponApplied(id)" v-bind:cla="[true, false, false, false]" v-bind:nodevalues= "[12, 6, 1]"></node> 
                      
                      

                    
                      </div>

              
            </div>
          </div>
        </div>


        <div class="col-sm-3">
          <div class="card card-outline-primary ">
            <div class="card-block">
              <h3 class="card-title"> </h3>
              
              
              
              
             <h5 class="timerclass">Timer : @{{ timer }}</h5>
              
              <h5>Round : @{{ numberofround }} (@{{ROUND_LIMIT}})</h5>
              <h5>Points : @{{attackerpoints}}</h5>
              
              <div id="log">

              </div>
              
            </div>
          </div>
        </div>
      </div>





</div>











<script src="{{ asset('js/prac.js') }}" ></script>





@endsection('content')