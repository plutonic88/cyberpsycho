@extends('layouts.master')





@section('content')

	<div   class="col-sm-8">
	
	<center>
	
  <h2>THE FOLLOWING GAMES WILL DETERMINE YOUR BONUS.
YOU WILL BE PLAYING FOR REAL MONEY</h2>


<p>Click the Game Instruction to learn about the rules of the games</p>

<a href='{{ url("/instruction") }}' id="nextbutton" class="btn btn-primary" style="margin-bottom: : 20px;">Game Instruction</a>

</center>




	

	</div>



	

	

@endsection('content')