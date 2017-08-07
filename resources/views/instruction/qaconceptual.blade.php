
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
						    <legend class="col-form-legend col-sm-10">1. How many points would you receive for <strong>a successful attack</strong> on <strong>Node Id: A</strong> in round 2?</legend>
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
						            2
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_1" value="3" >
						            10
						          </label>
						        </div>
						        
							</div>
		</fieldset>	

		<fieldset class="form-group row">
						    <legend class="col-form-legend col-sm-10">2. Observe the picture above. You have the control on <strong>Node Id: B</strong>. How many points would you receive for retaining control of <strong>Node Id: B</strong> <strong>without attacking</strong> it and if defender does not take it back in round 2?</legend>
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
						            8
						          </label>
						        </div>
						        <div class="form-check">
						          <label class="form-check-label">
						            <input class="form-check-input" type="radio" name="question_2" value="3" >
						            2
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