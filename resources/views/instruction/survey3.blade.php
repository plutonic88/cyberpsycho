@extends('layouts.master')





@section('content')




<div class="col-md-10 col-md-offset-2">


	



	<div class="card" style="width: 65rem; ">
  <div class="card-header">
    Survey
  </div>
  <div id="dir" class="card-block">
    <h4 class="card-title">Instructions</h4>
    <p class="card-text">Please indicate how much you agree with the following questions using the scale below:</p>
    <p class="card-text">Strongly Disagree(1)   Disagree(2) Neither Agree nor Disagree(3) Agree(4) Strongly Agree(5)</p>


    

    <form method="POST" action="/storesurvey3">
	 	
	 {{ csrf_field()}}


	 @foreach($questions as $question)


		@include('instruction.question')


	@endforeach	

	<p>Some additional questions:</p>

	<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">A bat and a ball cost $1.10 in total. The bat costs a dollar more than the ball. How much does the ball cost? ____ cents</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="ballcost" {{ old('ballcost')=="0.5 cents" ? 'checked='.'"'.'checked'.'"' : '' }} value="0.5 cents" required>
			            0.5 cents
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="ballcost" {{ old('ballcost')=="5 cents" ? 'checked='.'"'.'checked'.'"' : '' }} value="5 cents">
			            5 cents
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="ballcost" {{ old('ballcost')=="55 cents" ? 'checked='.'"'.'checked'.'"' : '' }} value="55 cents" >
			            55 cents
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="ballcost" {{ old('ballcost')=="0.5 dollar" ? 'checked='.'"'.'checked'.'"' : '' }} value="0.5 dollar" >
			            0.5 dollar
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="ballcost" {{ old('ballcost')=="0.05 cents" ? 'checked='.'"'.'checked'.'"' : '' }} value="0.05 cents" >
			            0.05 cents
			          </label>
			        </div>
			        
			      </div>
  		</fieldset>


  		<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">If it takes 5 machines 5 min to make 5 widgets, how long would it take 100 machines to make 100 widgets? ____ min</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="widgettime" {{ old('widgettime')=="1 min" ? 'checked='.'"'.'checked'.'"' : '' }} value="1 min" required>
			            1 min
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="widgettime" {{ old('widgettime')=="5 min" ? 'checked='.'"'.'checked'.'"' : '' }} value="5 min">
			            5 min
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="widgettime" {{ old('widgettime')=="10 min" ? 'checked='.'"'.'checked'.'"' : '' }} value="10 min" >
			            10 min
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="widgettime" {{ old('widgettime')=="25 min" ? 'checked='.'"'.'checked'.'"' : '' }} value="25 min" >
			            25 min
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="widgettime" {{ old('widgettime')=="50 min" ? 'checked='.'"'.'checked'.'"' : '' }} value="50 min" >
			            50 min
			          </label>
			        </div>
			        
			      </div>
  		</fieldset>

  		
  		<fieldset class="form-group row" >
			      <legend class="col-form-legend col-sm-10">In a lake, there is a patch of lily pads. Every day, the patch doubles in size. If it takes 48 days for the patch to cover the entire lake, how long would it take for the patch to cover half of the lake? ____ days</legend>
			      <div class="col-sm-10">
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="lakearea" {{ old('lakearea')=="24 days" ? 'checked='.'"'.'checked'.'"' : '' }} value="24 days" required>
			            24 days
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="lakearea" {{ old('lakearea')=="48 hours" ? 'checked='.'"'.'checked'.'"' : '' }} value="48 hours">
			            48 hours
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="lakearea" {{ old('lakearea')=="40 days" ? 'checked='.'"'.'checked'.'"' : '' }} value="40 days" >
			            40 days
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="lakearea" {{ old('lakearea')=="45 days" ? 'checked='.'"'.'checked'.'"' : '' }} value="45 days" >
			            45 days
			          </label>
			        </div>
			        <div class="form-check">
			          <label class="form-check-label">
			            <input class="form-check-input" type="radio" name="lakearea" {{ old('lakearea')=="47 days" ? 'checked='.'"'.'checked'.'"' : '' }} value="47 days" >
			            47 days
			          </label>
			        </div>
			        
			      </div>
  		</fieldset>

   		

    <div  class="form-group">
	  	  	<button type="submit" class="btn btn-primary">Submit</button>
	 </div>

	 	<div>
	  	 	
	  	 	@if(count($errors))
	  	 		<p>Do you want to skip? Click "Next Survey" button</p> 
	  	 		<a href='{{ url("/manisurvey") }}' id="nextbutton" @click="update" class="btn btn-primary" style="margin-bottom: : 20px;">Next Survey</a>
	  	 	@endif

	  	 </div>
	  	  


	  	  <div>
	  	  	
	  	  	@include('layouts.errors')

	  	 </div>






	 </form>




    
  </div>
</div>

  





</div>

<script src="https://unpkg.com/vue" ></script>
<script type="text/javascript">

	var vm = new Vue({
	  el: '#dir',

	  data: 
	  {
	    
	  },

	  methods : {

	  	update(){
	  		axios.post('/updateprogress', {
	  		                
	  		                stage : "survey",
	  		                 

	  		              }).then(response => this.returndata = response.data); 
	  	} 

	  }


	})

</script>



@endsection('content')