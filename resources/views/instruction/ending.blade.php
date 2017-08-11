@extends('layouts.master')





@section('content')

	<div id="regform"  class="col-md-8" >



	<h3>Congratulations! Your total score is : {{$total_point}}</h3>
	<p style="margin-bottom: 50px;">Enter <span style="color: red;">{{$user_confirmation}}</span> when asked in MTurk</p>
		
	 <h3 >Survey questions about your experience:</h3>



	 <form method="POST" action="/instruction/gameend">
	 	
	{{ csrf_field() }}

			<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">What defender type you were playing against for first 3 game?</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype" id="11" value="random" required>
			            Uniform random : selects node randomly
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype" id="12" value="Maximizing">
			            Maximizing defender's own utility: selects node with maximum value and low cost
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype" id="13" value="Minimizing" >
			            Minimizing your utility: predicting your move and selects them
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype" id="14" value="None" >
			            None of the above
			          </label>
			        </div>
			        


			      </div>
  		</fieldset>

  		<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">What defender type you were playing against for last 3 games?</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype2" id="21" value="random" required>
			            Uniform random : selects node randomly
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype2" id="22" value="Maximizing">
			            Maximizing defender's own utility: selects node with maximum value and low cost
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype2" id="23" value="Minimizing" >
			            Minimizing your utility: predicting your move and selects them
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="deftype2" id="24" value="None" >
			            None of the above
			          </label>
			        </div>
			        


			      </div>
  		</fieldset>


	  	  <div class="form-group" id="comm">

	    	<label for="school">Any Comments(50 character minimum)</label>
	    	<textarea style="height: 200px" @keyup="countchar" v-model="message" class="form-control" name="comment" id="comment" required></textarea>
	    	<div id="text-feedback">Comment length: @{{commentlength}}</div>
	  	  </div>

	  	  

	  	 

	  	  <div class="form-group">
	  	  	<button type="submit" class="btn btn-primary">Submit</button>
	  	  </div>



	  	  <div>
	  	  	
	  	  	@include('layouts.errors')

	  	 </div>



	 </form>


	</div>
<script src="{{ asset('js/end.js') }}"> </script>

@endsection('content')