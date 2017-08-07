@extends('layouts.master')





@section('content')

	<div id="regform"  class="col-md-8" >
		
	 <h1>Sign In</h1>



	 <form method="POST" action="/login">
	 	
	{{ csrf_field() }}

		


	  	  <div class="form-group">
	    	<label for="school">Elementary School</label>
	    	<input type="text" class="form-control" @change="createId"  v-model="school" name="school" id="school" required>
	  	  </div>

	  	  <div class="form-group">
	    	<label for="favpet">Favorite Pet Name</label>
	    	<input type="text" class="form-control" @change="createId" v-model="favpet" name="favpet" id="favpet" required>
	  	  </div>

	  	  <div class="form-group">
	    	<label for="age">Age</label>
	    	<input type="text" class="form-control" @change="createId" v-model="age" name="age" id="age" required>
	  	  </div>


	  	  <div class="form-group">
	    	
	    	<input type="hidden"  v-model="user_id" class="form-control" name="user_id" id="user_id" required>
	  	  </div>


	  	 

	  	  <div class="form-group">
	  	  	<button type="submit" class="btn btn-primary">Login</button>
	  	  </div>


	  	  <div>
	  	  	
	  	  	@include('layouts.errors')

	  	 </div>



	 </form>


	</div>


	<script src="https://unpkg.com/vue" ></script>
	<script src="{{ asset('js/main.js') }}" ></script>

@endsection('content')