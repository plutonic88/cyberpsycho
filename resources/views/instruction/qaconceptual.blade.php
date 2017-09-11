
@extends('layouts.master')





@section('content')

	<div  id="qaform"  class="col-sm-8">
		
	 <h1>Basic Questions</h1>

	 @if(Session::get('gametype') === 1)
	 	<img  style="width: 120%; height: 120%" src="{{URL::asset('/image/instruction-fullinfo/5.png')}}" alt="Fourth slide">
	 @endif

	 @if(Session::get('gametype') === 0)
	 	<img  style="width: 120%; height: 120%" src="{{URL::asset('/image/instruction-noinfo/5.png')}}" alt="Fourth slide">
	 @endif
	 


	 


	 <form method="POST" action="/instruction/concept">
	 	
	 {{ csrf_field()}}
						
		<fieldset class="form-group row">
						    <legend class="col-form-legend col-sm-10">1. Given Node A with a value of 10 and a cost of 2, how many points would you receive for attacking and gaining control of that node?</legend>
						    <div class="col-sm-10">
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_1"  value="1" >
						            8
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_1"  value="2">
						            4
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_1" value="3" >
						            10
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_1" value="4" >
						            14
						          </label>
						        </div>
						        
							</div>
		</fieldset>	

		<fieldset class="form-group row">
						    <legend class="col-form-legend col-sm-10">2. If the defender does not retake Node A, how many points would you get for controlling it in the next round?</legend>
						    <div class="col-sm-10">
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_2"  value="1" >
						            6
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_2"  value="2">
						            10
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_2" value="3" >
						            4
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_2" value="4" >
						            0
						          </label>
						        </div>
						        
							</div>
		</fieldset>	
		<fieldset class="form-group row">
						    <legend class="col-form-legend col-sm-10">3. 1.	If you start the game with 50 points and finish with 45, how much will your additional monetary reward be?</legend>
						    <div class="col-sm-10">
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_3"  value="1" >
						            0 cent
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_3"  value="2">
						            -5 cent
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_3" value="3" >
						            45 cents
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_3" value="4" >
						            50 cents
						          </label>
						        </div>
						        
							</div>
		</fieldset>		  	  
	  	  

	  	 


	  	  <div class="form-group">
	  	  	<button type="submit" class="btn btn-primary">Submit</button>
	  	  </div>


	  	  <div>
	  	  	
	  	  	@include('layouts.errors')

	  	 </div>



	 </form>


	</div>



	<script src="https://unpkg.com/vue" ></script>
	<script src="{{ asset('js/qa.js') }}" ></script>

	

@endsection('content')