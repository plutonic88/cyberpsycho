<!DOCTYPE html>
<html>
<head>
	<title>StrataFlip Game</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link rel="stylesheet"  media="screen and (color)" href="{{ URL::asset('css/res.css') }}"/>



	<style type="text/css">


input[type=radio] {
  display: inline;
  margin: 5px;
}


.visible {
    visibility: hidden;
}


		
.disable {
    pointer-events: none;
    opacity: 0.4;
}


.normal {
	background-color: white;
}


.attacked {
	background-color: red;
}

.possible {
	background-color: yellow;
}

.public {
	background-color: blue;
}



.tentative_attacked{
	background-color: purple;

}


.eye-buton{
    border-radius: 50%; 
    width: 20px;
    height: 20px;
    background-color: red;

}

.eye-buton-pos {
    position: absolute;
    left: 20px;
    top: 20px;
    z-index: 1;
}




.buton {
	border-radius: 50%; 
    width: 50px;
    height: 50px;
    color: black;
}



.nextbutton {

    position: absolute;
    left: 365px;
    top: 290px;

}


.nextgamebutton {

    position: absolute;
    left: 365px;
    top: 290px;

}


.startbutton {

    position: absolute;
    left: 365px;
    top: 120px;
    background-color: white;

}





.confirmbutton {

    position: absolute;
    left: 365px;
    top: 290px;
    height: 50px;
    width: 100px;


}





.timerclass {

    
    background-color: gray;
    padding: 5px;
    color: blue;


}


	</style>



</head>
<body>


	@include('layouts.header')


@if($flash = session('message'))

    <div class="alert alert-success" role="alert" id="flashmessage">
        
    {{$flash}}

    </div>

 @endif   

	<div class="container">

		@yield('content')

	</div>



	@include('layouts.footer')



</body>
</html>