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


    

    <form method="POST" action="/storesurvey2">
	 	
	 {{ csrf_field()}}


	 @foreach($questions as $question)


		@include('instruction.question')


	@endforeach	

   		

    <div  class="form-group">
	  	  	<button type="submit" class="btn btn-primary">Submit</button>
	 </div>

	 	<div>
	  	 	
	  	 	@if(count($errors))
	  	 		<p>Do you want to skip? Click "Next Survey" button</p> 
	  	 		<a href='{{ url("/survey/3") }}' id="nextbutton"  class="btn btn-primary" style="margin-bottom: : 20px;">Next Survey</a>
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