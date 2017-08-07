@extends('layouts.master')





@section('content')




<div class="col-md-10 col-md-offset-2">


	
<div class="card" style="width: 65rem; height: auto;">
  <div class="card-header">
    Game Instructions: NO Info/NO Timing (Simplest Game)
  </div>
  <div class="card-block">
    <h4 class="card-title">Basic Rules</h4>
    <p class="card-text">You will be playing multiple rounds of a two-player game called StrataFlip. In this game, you are playing as the attacker, and your opponent is the defender. The goal of this game is to gain and maintain possession of as much of the game board as possible. The game board is comprised of multiple “nodes” in a network, all with different reward and cost values. The only action you have available to you is to take control of a single node at a time. Every round you have 15 seconds to take an action. If you do not take an action in that time, the game will move on to the next round. 
    </p>

<p class="card-text">When you take control of a node, you will take possession of that node and gain its rewards. For each round you maintain control of that node, you will continue to gain its rewards. You lose control of a specific node when the defender takes it back. However, you cannot observe if and when the defender regains control of a node: you can only try and maximize your control over the game board and your total points. </p>
<p class="card-text"> Below, we break down the rules in more detail.</p>


<h4 class="card-title">Detailed Rules</h4>
<ul>
	
<li><strong>Rounds</strong></li>
<p class="card-text">This game will have 5 rounds, and you will make a single move in each round. The defender will also make a single move every round, but you will not know what move the defender makes. In the first round, all nodes are controlled by the defender.
</p>

<li>Moves</li>
<p class="card-text">Every round, you have 15 seconds to make a single move. You make a move by clicking on a node, and then confirming your move. When you click on a node, it will turn purple to indicate you have selected it. At this time, you may choose to change your move to a different node. You will click the “Confirm” button at the bottom to finalize your move for that round. If the timer runs out before you click “Confirm”, the game will consider any selected node as your final move. You may also choose to pass your turn and not attack any nodes. You will not pay any costs for doing so, but neither will you be able to get any more points. You will also pass by default if the timer runs out without you clicking a node.</p>
<p class="card-text">You must wait 3 seconds before moving or passing. 
</p>
<li>Nodes</li>
<p class="card-text">
	Each node has two aspects to it: a reward value and a cost. 

</p>
<ul>
	<li>Reward Value: </li>
	<p class="card-text">
	This is the number of points that the node is worth. You will receive these points for each round that you control the node. It is the top number within the node and designated “V”.

	</p>
	<li>Cost:</li>
	<p class="card-text">
	This is the number of points that it costs to take control of the node. If you want use your move to possess a node, you must forfeit this number of points to do so. If you do not have enough points, you will be unable to take control of the node. It is the bottom number within the node and designated “C”.


	</p>
</ul>
<li>Points</li>
<p class="card-text">You will begin the game with 0 points that you can use to make moves every round. If your total number of points ever drops below a move cost, you will be unable to attack that node without first gaining more points. However, you will never know your current points until the end of the game. </p>
<p class="card-text">
If you and the defender make the same move in a round, both of you will pay the cost associated with that move, but the control of the node will remain as it was in the previous round. </p>

<li>Boards and Layout</li>
<p class="card-text">
Here is a picture of the board screen: </p>

<p class="card-text">
The board displays the current known information about the game. In addition, a game log will update your move history per round. It will let you know what node you attacked in each round, but not the result. See below for an example of a 3 round game log.</p>

<p class="card-text"><span style="color: red">Round 1: You  1.</span></p>
<p class="card-text"><span style="color: red">Round 2: You  4.</span></p>
<p class="card-text"><span style="color: red">Round 3: You  1.</span></p>




<li>Payment</li>
<p class="card-text">You will be paid a reward based on the total number of points you are able to finish with in the game. Rewards will be paid on a 1:1 point to cent basis. For example, if you finish the game with 115 points, you will be paid an additional $1.15 for your participation in this game. 
</p>


</ul>

    
  </div>
</div>




		
<div class="card" style="width: 65rem; height: auto;">
  <div class="card-header">
    Game Instructions: Instructions for: ALL Info/NO Timing 
  </div>
  <div class="card-block">
    <h4 class="card-title">Basic Rules</h4>
    <p class="card-text">You will be playing multiple rounds of a two-player game called StrataFlip. In this game, you are playing as the attacker, and your opponent is the defender. The goal of this game is to gain and maintain possession of as much of the game board as possible. The game board is comprised of multiple “nodes” in a network, all with different reward and cost values. The only action you have available to you is to take control of a single node at a time. Every round you have 15 seconds to take an action. If you do not take an action in that time, the game will move on to the next round.</p> 

<p class="card-text">When you take control of a node, you will take possession of that node and gain its rewards. For each round you maintain control of that node, you will continue to gain its rewards. You lose control of a specific node when the defender takes it back. Your goal is to try and maximize your control over the game board and your total points.</p> 

<p class="card-text">Below, we break down the rules in more detail.</p>




<h4 class="card-title">Detailed Rules</h4>
<ul>
	
<li><strong>Rounds</strong></li>
<p class="card-text">This game will have 5 rounds, and you will make a single move in each round. The defender will also be making a single move every round. In the first round, all nodes are controlled by the defender.
</p>

<li>Moves</li>
<p class="card-text">Every round, you have 15 seconds to make a single move. You make a move by clicking on a node, and then confirming your move. When you click on a node, it will turn purple to indicate you have selected it. At this time, you may choose to change your move to a different node. You will click the “Confirm” button at the bottom to finalize your move for that round. If the timer runs out before you click “Confirm”, the game will consider any selected node as your final move. You may also choose to pass your turn and not attack any nodes. You will not pay any costs for doing so, but nor will you be able to get any more points. 
</p>
<p class="card-text">You must wait 3 seconds before moving or passing. </p>

<li>Nodes</li>
<p class="card-text">
	Each node has two aspects to it: a reward value and a cost. 

</p>
<ul>
	<li>Reward Value: </li>
	This is the number of points that the node is worth. You will receive these points for each round that you control the node. It is the top number within the node and designated “V”.
	</p>
	<li>Cost:</li>
	<p class="card-text">
	This is the number of points that it costs to take control of the node. If you want use your move to possess a node, you must forfeit this number of points to do so. If you do not have enough points, you will be unable to take control of the node. It is the middle number within the node and designated “C”.
	</p>

	<p class="card-text">Nodes under defender control will be in red. Nodes under your control will be in green.</p> 

</ul>


<li>Points</li>
<p class="card-text">You will begin the game with 0 points that you can use to make moves every round. If your total number of points ever drops below a move cost, you will be unable to attack that node without first gaining more points. However, you will never know your current points until the end of the game. </p>
<p class="card-text">
If you and the defender make the same move in a round, both of you will pay the cost associated with that move, but the control of the node will remain as it was in the previous round. 
 </p>

<li>Boards and Layout</li>
<p class="card-text">
Here is a picture of the board screen: </p>

<p class="card-text">
The board displays the current known information about the game, including your points and the state of node possession. In addition, a game log will update your move history per round. It will let you know what node you attacked in each round, what node was defended, and the results of each. See below for an example of a 3 round game log.
</p>

<p class="card-text"><span style="color: red;">Round 1: You  1</span>, <span style="color: green;">defender 3</span>.
	    
</p>
<p class="card-text"><span style="color: red;">Round 2: You 4</span>, <span style="color: green;">defender 4.</span>
	    
</p>
<p class="card-text"><span style="color: red;">Round 3: You 4</span>, <span style="color: green;">defender 1.</span></p>




<li>Payment</li>
<p class="card-text">You will be paid a reward based on the total number of points you are able to allocate in the game. Rewards will be paid on a 1:1 point to cent basis. For example, if you finish the game with 115 points, you will be paid an additional $1.15 for your participation in this game. 
</p>


</ul>




  </div>
</div>







	<div class="card" style="width: 65rem; height: auto;">
 
  <div class="card-block">
   
    <p class="card-text">Now start answering some questions</p>
 
    <button type="button" onclick="window.location='{{ url("instruction/concept") }}'"  class="btn btn-outline-primary"">Basic QA About Game</button>
 
  </div>
</div>

  







</div>

@endsection('content')