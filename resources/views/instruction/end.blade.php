@extends('layouts.master')


@section('content')





<h3>Congratulations! You are done.</h3>
<h3>Your total score is : {{$total_point}}</h3>
<p style="margin-bottom: 50px;">Enter <span style="color: red;">{{$user_confirmation}}</span> when asked in MTurk</p>





@endsection('content')