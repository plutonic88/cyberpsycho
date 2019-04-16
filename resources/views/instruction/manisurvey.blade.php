@extends('layouts.master')





@section('content')




<div class="col-md-10 col-md-offset-2">


	



	<div class="card" style="width: 65rem;">
  <div class="card-header">
    Survey
  </div>
  <div class="card-block">
    <h4 class="card-title">Instructions</h4>
    <p>We have all tried to convince someone of something that may not be entirely true. Perhaps it is for selfish gain, desperate need, or for the greater good. As such, we have all committed a deception in life; it is part of being human. For the following questions, please think back to a time where you deceived someone. For the following questions, please indicate HOW you behaved. There are no right or wrong answers. 
<b>Example of greater good:</b> Taking resources from someone who is using those resources to hurt others.
<b>Example of desperate need:</b> Taking resources from a corrupt organization so you can survive. 
<b>Example of selfish good:</b>  Taking resources to improve your own situation.</p>
    <p class="card-text">Please indicate how much you agree with the following questions using the scale below:</p>
    <p class="card-text">Strongly Disagree(1)   Disagree(2) Neither Agree nor Disagree(3) Agree(4) Strongly Agree(5)</p>


    <form method="POST" action="/storesurvey2">
	 	
	 {{ csrf_field()}}


	 @foreach($questions as $question)


		@include('instruction.question')


	@endforeach	

   		

    <div class="form-group">
	  	  	<button type="submit" class="btn btn-primary">Submit</button>
	 </div>

	 	<div>
	  	 	
	  	 	@if(count($errors))
	  	 		<p>Do you want to skip? Click "Game Instruction" button</p> 
	  	 		<a href='{{ url("/instruction") }}' id="nextbutton" class="btn btn-primary" style="margin-bottom: : 20px;">Game Instruction</a>
	  	 	@endif

	  	 </div>
	  	  


	  	  <div>
	  	  	
	  	  	@include('layouts.errors')

	  	 </div>






	 </form>




    
  </div>
</div>

  





</div>



@endsection('content')