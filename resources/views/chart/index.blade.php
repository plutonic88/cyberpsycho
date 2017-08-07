@extends('layouts.master')





@section('content')


<div class="container" id="container">
	


<div id="chart" style=" width: 80%" >
	<graph :labels="['Node 0', 'Node 1', 'Node 2', 'Node 3', 'Node 4']" 
		   :values="[{{ $histories[0]}} , {{ $histories[1]}}, {{ $histories[2]}}, {{ $histories[3]}}, {{ $histories[4]}}]"
		   

	></graph>
</div>

</div>





<script src="{{ asset('js/graph.js') }}" ></script>


@endsection('content')