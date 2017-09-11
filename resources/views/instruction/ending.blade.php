@extends('layouts.master')





@section('content')

	<div id="regform"  class="col-md-8" >



	<h3>Congratulations! Your total score is : {{$total_point}}</h3>
	<p style="margin-bottom: 50px;">Enter <span style="color: red;">{{$user_confirmation}}</span> when asked in MTurk</p>
		
	 <h3 >Survey questions about your experience:</h3>



	 <form method="POST" action="/instruction/gameend">
	 	
	{{ csrf_field() }}

			<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">What is your gender?</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="gender"  value="male" {{ old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : '' }} required>
			            Male
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="gender" {{ old('gender')=="female" ? 'checked='.'"'.'checked'.'"' : '' }} value="female">
			            Female
			          </label>
			        </div>
			      </div>
  		</fieldset>

  		<div class="form-group">
	    	<label for="age">What is your age?</label>
	    	<input type="text" class="form-control" name="age" value="{{ old('age') }}" id="age" required>
	  	</div>

	  	<div class="form-group">
	    	<label for="country">What country do you currently live in?</label>
	    	<input type="text" class="form-control" name="country" value="{{ old('country') }}" id="country" required>
	  	</div>

  		<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">What is your race/ethnicity?</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race"  value="black" {{ old('race')=="black" ? 'checked='.'"'.'checked'.'"' : '' }} required>
			            Black
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race" {{ old('race')=="native north american" ? 'checked='.'"'.'checked'.'"' : '' }} value="native north american">
			            Native North American
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race" {{ old('race')=="white" ? 'checked='.'"'.'checked'.'"' : '' }} value="white" >
			            White/Caucasian
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race" {{ old('race')=="asian" ? 'checked='.'"'.'checked'.'"' : '' }} value="asian" >
			            Asian
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race" {{ old('race')=="south asian" ? 'checked='.'"'.'checked'.'"' : '' }} value="south asian" >
			            South Asian (Indian/Pakistani)
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race" {{ old('race')=="latino/a" ? 'checked='.'"'.'checked'.'"' : '' }} value="latino/a" >
			            Latino/a
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="race" {{ old('race')=="other" ? 'checked='.'"'.'checked'.'"' : '' }} value="other" >
			            Other
			          </label>
			        </div>
			        


			      </div>
  		</fieldset>


  		



  		<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">What is your highest level of education?</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Some high school" ? 'checked='.'"'.'checked'.'"' : '' }} value="Some high school" required>
			            Some high school
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="High School Diploma / GED" ? 'checked='.'"'.'checked'.'"' : '' }} value="High School Diploma / GED">
			            High School Diploma / GED
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Some college" ? 'checked='.'"'.'checked'.'"' : '' }} value="Some college" >
			            Some college
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Associate’s Degree" ? 'checked='.'"'.'checked'.'"' : '' }} value="Associate’s Degree" >
			            Associate’s Degree
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Bachelor’s Degree" ? 'checked='.'"'.'checked'.'"' : '' }} value="Bachelor’s Degree" >
			            Bachelor’s Degree
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Some Graduate education" ? 'checked='.'"'.'checked'.'"' : '' }} value="Some Graduate education" >
			            Some Graduate education
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Master’s Degree" ? 'checked='.'"'.'checked'.'"' : '' }} value="Master’s Degree" >
			            Master’s Degree
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="education" {{ old('education')=="Ph.D." ? 'checked='.'"'.'checked'.'"' : '' }} value="Ph.D." >
			            Ph.D.
			          </label>
			        </div>
			        


			      </div>
  		</fieldset>



  		<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">What is your annual income level?</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="income" {{ old('income')=="0-15,000" ? 'checked='.'"'.'checked'.'"' : '' }} value="0-15,000" required>
			            0-15,000
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="income" {{ old('income')=="15,000-30,000" ? 'checked='.'"'.'checked'.'"' : '' }} value="15,000-30,000">
			            15,000-30,000
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="income" {{ old('income')=="30,000-50,000" ? 'checked='.'"'.'checked'.'"' : '' }} value="30,000-50,000" >
			            30,000-50,000
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="income" {{ old('income')=="50,000-75,000" ? 'checked='.'"'.'checked'.'"' : '' }} value="50,000-75,000" >
			            50,000-75,000
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="income" {{ old('income')=="75,000-100,000" ? 'checked='.'"'.'checked'.'"' : '' }} value="75,000-100,000" >
			            75,000-100,000
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="income" {{ old('income')=="Above 100,000" ? 'checked='.'"'.'checked'.'"' : '' }} value="Above 100,000" >
			            Above 100,000
			          </label>
			        </div>
			      
			      </div>
  		</fieldset>

  					<fieldset class="form-group row" >
  					      <legend class="col-form-legend col-sm-10">How did you fill out this survey?</legend>
  					      <div class="col-sm-10">
  					        <div class="form-check">
  					          <label class="form-check-label">
  					            <input class="form-check-input" type="radio" name="device" {{ old('device')=="Mobile phone" ? 'checked='.'"'.'checked'.'"' : '' }} value="Mobile phone" required>
  					            Mobile phone
  					          </label>
  					        </div>
  					        <div class="form-check">
  					          <label class="form-check-label">
  					            <input class="form-check-input" type="radio" name="device" {{ old('device')=="Computer" ? 'checked='.'"'.'checked'.'"' : '' }} value="Computer">
  					            Computer
  					          </label>
  					        </div>
  					        <div class="form-check">
  					          <label class="form-check-label">
  					            <input class="form-check-input" type="radio" name="device" {{ old('device')=="Tablet" ? 'checked='.'"'.'checked'.'"' : '' }} value="Tablet">
  					            Tablet
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	
<script src="{{ asset('js/end.js') }}"> </script>

@endsection('content')