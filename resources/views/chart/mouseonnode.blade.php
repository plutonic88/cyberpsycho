@extends('layouts.master')





@section('content')


<div class="container" id="container">
	


<div id="chart" style=" width: 100%" >
	<mouseonnode :labels="['Node 0', 'Node 1', 'Node 2', 'Node 3', 'Node 4', 'Node 5']" 
		   :values="[{{ $histories[0]}} , {{ $histories[1]}}, {{ $histories[2]}}, {{ $histories[3]}}, {{ $histories[4]}}, {{ $histories[5]}}]"
		   

	></mouseonnode>



	<mouseonnode2 :labels="['Node 0', 'Node 1', 'Node 2', 'Node 3', 'Node 4', 'Node 5']" 
		   :values="[{{ $freq[0]}} , {{ $freq[1]}}, {{ $freq[2]}}, {{ $freq[3]}}, {{ $freq[4]}}, {{ $freq[5]}}]"
		   

	></mouseonnode2>
</div>

</div>





<script src="{{ asset('js/mouseonnode.js') }}" ></script>


@endsection('content')