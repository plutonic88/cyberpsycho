@extends('layouts.master')





@section('content')


<div class="container" id="container">
	


<div id="chart" style=" width: 80%" >
	<insduration :labels="['Slide 1', 'Slide 2', 'Slide 3', 'Slide 4', 'Slide 5', 'Slide 6']" 
		   :values="[{{ $histories[0]}} , {{ $histories[1]}}, {{ $histories[2]}}, {{ $histories[3]}}, {{ $histories[4]}}, {{ $histories[5]}}]"
		   

	></insduration>
</div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>




<script src="{{ asset('js/graph.js') }}" ></script>


@endsection('content')