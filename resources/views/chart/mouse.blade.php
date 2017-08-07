@extends('layouts.master')





@section('content')


<div class="container" id="container">
	


<div id="chart" style=" width: 100%" >
	<mouse :labels="['Mouse Coords']" 
		   :values="[{{ $mousecords}}]"
		   

	></mouse>
</div>

</div>





<script src="{{ asset('js/mouse.js') }}" ></script>


@endsection('content')