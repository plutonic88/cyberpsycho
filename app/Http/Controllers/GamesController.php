<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;

use JavaScript;

//use Illuminate\Database\DatabaseManager\DB;





class GamesController extends Controller
{



	public static $gametypes = ['noinfo', 'fullinfo'];
	public static $deftypes = ['random_defender_type', 'max_defender_type'];
	public static $defordertypes = ['asc', 'dsc', 'rand'];
	public  static $defstratfullinfo;
	public  static $defstratnoinfo;



	public function  __construct()
	{
		 GamesController::$defstratfullinfo = $this->readFileDefStrategyFullInfo();
		 //dd(GamesController::$defstratfullinfo);

		 //if(array_key_exists("5,5,3",(GamesController::$defstratfullinfo["4,1,1"])))
		// {
		 //	dd("set", GamesController::$defstratfullinfo["4,1,1"]["5,5,3"]);

		// }
		// else
		// {
		// 	dd("not set");
		// }
		 GamesController::$defstratnoinfo = $this->readFileDefStrategyAllPoint();
		 //dd(GamesController::$defstratnoinfo);
		 $this->middleware('auth')->except(['index']);

	}



	public function index()
	{



			



			return view('instruction.index');
	}


	public function multiKeyExists(array $arr, $key) {

    // is in base array?
    if (array_key_exists($key, $arr)) {
        return true;
    }

    // check arrays contained in this array
    foreach ($arr as $element) {
        if (is_array($element)) {
            if (multiKeyExists($element, $key)) {
                return true;
            }
        }

    }

    return false;
}



	public function getDefStrategyFullinfo()
	{


			

			 $def_action_probs = [];
			 $numberofround = request('numberofround');
			 $defender_sequence = request('defender_sequence');
			 $attacker_sequence = request('attacker_sequence');
			 $way = -1;


			//var def_actions = [];

			if($numberofround==1)
			{
				//GamesController::$defstratfullinfo = $this->readFileDefStrategyFullInfo();
				//dd(GamesController::$defstratfullinfo["EMPTY"]["EMPTY"]);
				$def_action_probs = GamesController::$defstratfullinfo["EMPTY"]["EMPTY"];
				$way = "init";
				
			}
			else
			{
				// if undefined act randomly
				//console.log("BHVRLSTRAT : def seq : "+ vm.defender_sequence);
				//console.log("BHVRLSTRAT : attckr seq : "+ vm.attacker_sequence);
				 if ( (isset(GamesController::$defstratfullinfo[$defender_sequence][$attacker_sequence]))  || (array_key_exists($defender_sequence, GamesController::$defstratfullinfo ) &&  array_key_exists($attacker_sequence, GamesController::$defstratfullinfo[$defender_sequence] )  ) )
				 {
				 	
				 	$def_action_probs = (GamesController::$defstratfullinfo[$defender_sequence][$attacker_sequence]);
				 	$way = "defined";

				 	//dd($def_action_probs);
				 }
				 else
				 {
				 	//dd("Nope");
				 	$way = "random";
				 	// default strategy should be node 0
				 	return ["def"=>$defender_sequence, "att" => $attacker_sequence, "def_strat" => 0, "way" => $way];
				 }
				
			}


			


			

			
			$r = 0 + mt_rand() / mt_getrandmax() * (1 - 0);
			//console.log("r : " + r);
		    $a = 0;
			$cumulativeProbability =  0;

			//console.log("r : "+r+", cumulativeProbability : " + cumulativeProbability);
			while ($a < (sizeof($def_action_probs)) ) 
			{

				$cumulativeProbability += floatval($def_action_probs[$a][1]);
				//console.log("r : "+r+", cumulativeProbability : " + cumulativeProbability);
				if ($r < $cumulativeProbability)
				{
					//console.log( "breaking ****** r : "+r+", cumulativeProbability : " + cumulativeProbability);
					break;
				}
				$a++;
			}

			if($a >= sizeof($def_action_probs))
			{
				$a = sizeof($def_action_probs) - 1;
			}

			//console.log("a : " + a);
			//console.log("BHVRLSTRAT : returning action : " + def_action_probs[a][0]);
					
			//return $def_action_probs[$a][0];
			return ["def"=>$defender_sequence, "att" => $attacker_sequence, "probs" => $def_action_probs,"def_strat" => $def_action_probs[$a][0], "r" => $r, "cumuprob" => $cumulativeProbability];
	}


	public function getDefStrategyNoinfo()
	{


			

			 $def_action_probs = [];
			 $numberofround = request('numberofround');
			 $defender_sequence = request('defender_sequence');
			 $attacker_sequence = request('attacker_sequence');
			 $way = -1;


			//var def_actions = [];

			if($numberofround==1)
			{
				//GamesController::$defstratfullinfo = $this->readFileDefStrategyFullInfo();
				//dd(GamesController::$defstratfullinfo["EMPTY"]["EMPTY"]);
				$def_action_probs = GamesController::$defstratnoinfo["EMPTY"]["EMPTY"];
				$way = "init";
				
			}
			else
			{
				// if undefined act randomly
				//console.log("BHVRLSTRAT : def seq : "+ vm.defender_sequence);
				//console.log("BHVRLSTRAT : attckr seq : "+ vm.attacker_sequence);
				 if ( (isset(GamesController::$defstratnoinfo[$defender_sequence][$attacker_sequence]))  || (array_key_exists($defender_sequence, GamesController::$defstratnoinfo ) &&  array_key_exists($attacker_sequence, GamesController::$defstratnoinfo[$defender_sequence] )  ) )
				 {
				 	
				 	$def_action_probs = (GamesController::$defstratnoinfo[$defender_sequence][$attacker_sequence]);
				 	$way = "defined";

				 	//dd($def_action_probs);
				 }
				 else
				 {
				 	//dd("Nope");
				 	$way = "random";
				 	// default action should be 0th node
				 	return ["def"=>$defender_sequence, "att" => $attacker_sequence, "def_strat" => 0, "way" => $way];
				 }
				
			}


			


			

			
			$r = 0 + mt_rand() / mt_getrandmax() * (1 - 0);
			//console.log("r : " + r);
		    $a = 0;
			$cumulativeProbability =  0;

			//console.log("r : "+r+", cumulativeProbability : " + cumulativeProbability);
			while ($a < (sizeof($def_action_probs)) ) 
			{

				$cumulativeProbability += floatval($def_action_probs[$a][1]);
				//console.log("r : "+r+", cumulativeProbability : " + cumulativeProbability);
				if ($r < $cumulativeProbability)
				{
					//console.log( "breaking ****** r : "+r+", cumulativeProbability : " + cumulativeProbability);
					break;
				}
				$a++;
			}

			if($a >= sizeof($def_action_probs))
			{
				$a = sizeof($def_action_probs) - 1;
			}

			//console.log("a : " + a);
			//console.log("BHVRLSTRAT : returning action : " + def_action_probs[a][0]);
					
			//return $def_action_probs[$a][0];
			return ["def"=>$defender_sequence, "att" => $attacker_sequence, "probs" => $def_action_probs,"def_strat" => $def_action_probs[$a][0], "r" => $r, "cumuprob" => $cumulativeProbability];
	}


	public function readFileDefStrategyFullInfo()
	{
		// read file 

			$content = \File::get(storage_path('strategy/g5d5_FI.txt'));
			$strategy = explode("\n", $content);
			
			//dd($strategy);


			$node_array = array("" => "EMPTY", "N0" => "0", "N1" => "1", "N2" => "2", "N3" => "3", "N4" => "4", "PASS" => "5");

			//dd($node_array); 
			
			


			$defender_strategy[][][][] = array();

			//sizeof($strategy)


			for($i=0; $i<(sizeof($strategy)); )
			{


				$def_seq = "";
				$att_seq = "";


				if($strategy[$i] === "")
				{
					break;
				}



					while(1)
					{

							// get the current row
							$row = $strategy[$i];

							if($row[11] === "]") // empty sequence
							{
								if($row[0] === "D")
								{
									$def_seq = "";
								}
								else if($row[0] === "A")
								{
									$att_seq = "";
									$i++;
									break;
								}
							}
							else if($row[10] === "[")
							{
								//parse  action sequence
								$index1 = 11; // starting index for sequence
								
								$subs = explode(",",substr($row, $index1, strlen($row)-$index1-1));

								$seq = implode(",", $subs);

								//dd($index1,$subs, $seq, $row[$index1]);

								if($row[0] === "D")
								{
									$def_seq = $seq;
								}
								else if($row[0] === "A")
								{
									$att_seq = $seq;
									$i++; // move to next row
									break; // exit from loop
								}

							}
							$i++; // move to next row
						
					}
					//dd($def_seq,$att_seq);


					$def_seq = str_replace(' ', '', $def_seq);
					$att_seq = str_replace(' ', '', $att_seq);

					$def_seq_nodes = explode(",", $def_seq);
					$att_seq_nodes = explode(",", $att_seq);

					//dd($def_seq_nodes, $att_seq_nodes);


					for($s=0; $s<sizeof($def_seq_nodes); $s++)
					{
						$def_seq_nodes[$s] = $node_array[$def_seq_nodes[$s]];
					}

					for($s=0; $s<sizeof($att_seq_nodes); $s++)
					{
						$att_seq_nodes[$s] = $node_array[$att_seq_nodes[$s]];
					}
					



					$def_seq = implode(",", $def_seq_nodes);
					$att_seq = implode(",", $att_seq_nodes);




					$counter = 0;
					while(1)
					{

						// get the current row
						$row = $strategy[$i];

						if( ($row === "")   || ($row[0] === "D"))
						{
							break;
						}

						$row = str_replace(' ', '', $row);

						$arr = explode(":", $row);


						$action = substr($arr[0], 1);

						$prob = $arr[1];

						//dd($action, $prob);


						// convert nodes to node ids

						
						 //dd($def_seq_nodes, $att_seq_nodes);


						
						
						//dd($def_seq_nodes, $att_seq_nodes);
						

						$defender_strategy[$def_seq][$att_seq][$counter][0] = $node_array[$action];

						$defender_strategy[$def_seq][$att_seq][$counter][1] = $prob;


						$i++;
						$counter++;
					}

					//dd($defender_strategy, $row);
	
			}

			//dd($defender_strategy["EMPTY"]["EMPTY"]);

			return $defender_strategy;
	}


	public function readFileDefStrategyAllPoint()
	{
		// read file 

			$content = \File::get(storage_path('strategy/g5d5_AP.txt'));
			$strategy = explode("\n", $content);
			
			//dd($strategy);


			$node_array = array("" => "EMPTY", "N0" => "0", "N1" => "1", "N2" => "2", "N3" => "3", "N4" => "4", "PASS" => "5");

			//dd($node_array); 
			
			


			$defender_strategy[][][][] = array();

			//sizeof($strategy)


			for($i=0; $i<sizeof($strategy); )
			{


				$def_seq = "";
				$att_seq = "";


				if($strategy[$i] === "")
				{
					break;
				}



					while(1)
					{

							// get the current row
							$row = $strategy[$i];

							if($row[11] === "]") // empty sequence
							{
								if($row[0] === "D")
								{
									$def_seq = "";
								}
								else if($row[0] === "A")
								{
									$att_seq = "";
									$i++;
									break;
								}
							}
							else if($row[10] === "[")
							{
								//parse  action sequence
								$index1 = 11; // starting index for sequence
								
								$subs = explode(",",substr($row, $index1, strlen($row)-$index1-1));

								$seq = implode(",", $subs);

								//dd($index1,$subs, $seq, $row[$index1]);

								if($row[0] === "D")
								{
									$def_seq = $seq;
								}
								else if($row[0] === "A")
								{
									$att_seq = $seq;
									$i++; // move to next row
									break; // exit from loop
								}

							}
							$i++; // move to next row
						
					}
					//dd($def_seq,$att_seq);


					$def_seq = str_replace(' ', '', $def_seq);
					$att_seq = str_replace(' ', '', $att_seq);

					$def_seq_nodes = explode(",", $def_seq);
					$att_seq_nodes = explode(",", $att_seq);

					//dd($def_seq_nodes, $att_seq_nodes);


					for($s=0; $s<sizeof($def_seq_nodes); $s++)
					{
						$def_seq_nodes[$s] = $node_array[$def_seq_nodes[$s]];
					}

					for($s=0; $s<sizeof($att_seq_nodes); $s++)
					{
						$att_seq_nodes[$s] = $node_array[$att_seq_nodes[$s]];
					}
					



					$def_seq = implode(",", $def_seq_nodes);
					$att_seq = implode(",", $att_seq_nodes);




					$counter = 0;
					while(1)
					{

						// get the current row
						$row = $strategy[$i];

						if( ($row === "")   || ($row[0] === "D"))
						{
							break;
						}

						$row = str_replace(' ', '', $row);

						$arr = explode(":", $row);


						$action = substr($arr[0], 1);

						$prob = $arr[1];

						//dd($action, $prob);


						// convert nodes to node ids

						
						 //dd($def_seq_nodes, $att_seq_nodes);


						
						
						//dd($def_seq_nodes, $att_seq_nodes);
						

						$defender_strategy[$def_seq][$att_seq][$counter][0] = $node_array[$action];

						$defender_strategy[$def_seq][$att_seq][$counter][1] = $prob;


						$i++;
						$counter++;
					}

					//dd($defender_strategy, $row);
	
			}

			//dd($defender_strategy["EMPTY"]["EMPTY"]);

			return $defender_strategy;
	}





	public function config()
	{
		

		//GamesController::$defstratfullinfo = $this->readFileDefStrategyFullInfo();

		//dd(GamesController::$defstratfullinfo);


		 $rand_strategy = '';

		 for($i=0; $i<5; $i++)
		 {
		 	$rand_strategy .= mt_rand(0,4);

		 	if($i<4)
		 	{
		 		$rand_strategy .= ",";
		 	}
		 }




		 

		// dd($rand_strategy);



		return [
		'TIME_LIMIT'=> '15', 
		'ROUND_LIMIT'=>'5', 
		'timer'=> '15', 
		'rand_defenderteststrategy'=>$rand_strategy,
		'max_defenderteststrategy'=>'3,4,3,2,1',
		'possibleattackset' => '0,1,2,3,4,5',
		'public' => '0,1,2,3,4,5'		

		 ];
	}


	public function configprac()
	{
		return [
		'TIME_LIMIT'=> '10', 
		'ROUND_LIMIT'=>'2', 
		'timer'=> '10', 
		'rand_defenderteststrategy'=>'0,1,0',
		'max_defenderteststrategy'=>'0,1,0,',
		'possibleattackset' => '0,1,2',
		'public' => '0,1,2'		

		 ];
	}



	public function startsurvey()
	{






		$questions = Question::all();


		



		//dd($questions);



		return view('instruction.survey', compact('questions'));
	}



	public function storesurvey()
	{



		$answer = new \App\Answer;

		$answer->user_id =  session('user_id','');

		$answer->Question_1 = request('Question_1');
		$answer->Question_2 = request('Question_2');
		$answer->Question_3 = request('Question_3');
		$answer->Question_4 = request('Question_4');
		$answer->Question_5 = request('Question_5');
		$answer->Question_6 = request('Question_6');
		$answer->Question_7 = request('Question_7');
		$answer->Question_8 = request('Question_8');
		$answer->Question_9 = request('Question_9');
		$answer->Question_10 = request('Question_10');

		$answer->Question_11 = request('Question_11');
		$answer->Question_12 = request('Question_12');
		$answer->Question_13 = request('Question_13');
		$answer->Question_14 = request('Question_14');
		$answer->Question_15 = request('Question_15');
		$answer->Question_16 = request('Question_16');
		$answer->Question_17 = request('Question_17');
		$answer->Question_18 = request('Question_18');
		$answer->Question_19 = request('Question_19');
		$answer->Question_20= request('Question_20');

		$answer->Question_21 = request('Question_21');
		$answer->Question_22 = request('Question_22');
		$answer->Question_23 = request('Question_23');
		$answer->Question_24 = request('Question_24');
		$answer->Question_25 = request('Question_25');
		$answer->Question_26 = request('Question_26');
		$answer->Question_27 = request('Question_27');

		$answer->save();
		//session()->flash('message' , 'Thanks! for taking the survey');




		//dd(request()->all());
	$validator = $this->validate(request(), [


    		'Question_1' => 'required',

    		'Question_2' => 'required',

    		'Question_3' => 'required',

    		'Question_4' => 'required',

    		'Question_5' => 'required',

    		'Question_6' => 'required',

    		'Question_7' => 'required',

    		'Question_8' => 'required',

    		'Question_9' => 'required',

    		'Question_10' => 'required',

    		'Question_11' => 'required',

    		'Question_12' => 'required',

    		'Question_13' => 'required',

    		'Question_14' => 'required',

    		'Question_15' => 'required',

    		'Question_16' => 'required',

    		'Question_17' => 'required',

    		'Question_18' => 'required',
    		
    		'Question_19' => 'required',

    		'Question_20' => 'required',

    		'Question_21' => 'required',

    		'Question_22' => 'required',

    		'Question_23' => 'required',

    		'Question_24' => 'required',

    		'Question_25' => 'required',

    		'Question_26' => 'required',

    		'Question_27' => 'required'




    		]);


		



		

		return redirect('/instruction');

		





	}


	public function showending()
	{

		// generate a string 
		// show it in the interface
		// total point

		

		$user_confirmation = 'A' . substr(session('user_id') , 0, 30). '7';

		//update user_confirmation in assignedgame


		\DB::table('assignedgames')
			            ->where('user_id', session('user_id'))
			            ->update([ 'user_confirmation' => $user_confirmation ]);


		$gameplay = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('total_point', 'pick_def_order', 'game_played')
		            ->first();

		$total_point = $gameplay->total_point;            

		return view('instruction.ending', compact('user_confirmation', 'total_point'));
	}


	public function storeending()
	{
		//dd(request()->all());

		$this->validate(request(), [

    		'age' => 'required|numeric',

    		'country' => 'required|min: 3',


    		]);

			$endsurvey = new \App\endsurvey;

			$endsurvey->user_id = session('user_id');
			$endsurvey->gender = request('gender');
			$endsurvey->age = request('age'); 
			$endsurvey->country = request('country'); 
			$endsurvey->education = request('education'); 
			$endsurvey->income = request('income'); 
			$endsurvey->race = request('race'); 
			$endsurvey->device = request('device'); 
			$endsurvey->comment = request('comment');

			$endsurvey->save();

			session()->flash('message' , 'Thanks! for participating in our study');

			$user_confirmation = 'A' . substr(session('user_id') , 0, 30). '7';

		//update user_confirmation in assignedgame


		\DB::table('assignedgames')
			            ->where('user_id', session('user_id'))
			            ->update([ 'user_confirmation' => $user_confirmation ]);


		$gameplay = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('total_point', 'pick_def_order', 'game_played')
		            ->first();

		$total_point = $gameplay->total_point;   

		//auth()->logout();         

		return view('instruction.end', compact('user_confirmation', 'total_point'));



			//dd(request()->all());


	}




	public function showinstruction()
	{

		// store the form data


		//dd(request()->all());


		$game = new \App\Game;

		$game->gameid = 1;
		$game->userid = 1;
		$game->action = request('action');
		$game->time = 0;


		$game->save();



		return redirect('/instruction');

	}

	public function assigndefordertype()
	{
		$selectedgametype  = -1;
				$selecteddefenderordertype = -1;

				


				$gameass = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('game_type', 'pick_def_order', 'game_played')
		            ->first();

		            //dd($gameass);

		            

		            if($gameass === NULL)
		            {

		            		            		//assign both gametype and defender order type
		            		            	
		            				            for($gt = 0; $gt<session('n_game_type'); $gt= $gt+1)
		            				            {
		            				            	$countgt[$gt]  = \DB::table('assignedgames')
		            		            	            ->where('game_type', $gt)
		            		            	            ->count();
		            		   
		            				            }
		            				            //print_r($countgt);

		            				            uasort($countgt, function($a, $b) {
		            							    if ($a == $b) {
		            							        return 0;
		            							    }
		            							    return ($a < $b) ? -1 : 1;
		            							});

		            				           // dd($countgt);

		            				            // assign to the gametype with less number of users
		            				            $newArray = array_keys($countgt);

		            				            $selectedgametype = $newArray[0];

		            				            
		            				            //dd($newArray[0]);



		            				            // count defender type for the selected gametype
				            		            for($dt = 0; $dt<session('n_defender_order_type'); $dt= $dt+1)
				            		            {
				            		            	$countdt[$dt]  = \DB::table('assignedgames')
				                        	            ->where('game_type', $selectedgametype)
				            		            	    ->where('pick_def_order', $dt)
				                        	            ->count();
				               
				            		            }
				            		            //dd($countdt);

				            		            uasort($countdt, function($a, $b) {
				            		            			    if ($a == $b) {
				            		            			        return 0;
				            		            			    }
				            		            			    return ($a < $b) ? -1 : 1;
				            		            			});
				            		            //print_r($countdt);
				            		            $newArray = array_keys($countdt);

				            		            $selecteddefenderordertype = $newArray[0];
				            		           // dd($countdt);

				            		            

				            		           // dd($selecteddefenderordertype);

				            		            //create a new record with initial values

				            		            \DB::table('assignedgames')->insert(
					            	         	    ['user_id' => session('user_id'), 'game_played' => 0 ,'game_type' => $selectedgametype, 'pick_def_order' => $selecteddefenderordertype, 'random_defender_type' => 0,
					            	         	    'max_defender_type' => 0]
					            	         	);



		        	}
		        	else
		        	{
		        		$selectedgametype = $gameass->game_type;
		        		$selecteddefenderordertype = $gameass->pick_def_order;
		        		// also reset every entry 
		        		\DB::table('assignedgames')
		        		            ->where('user_id', session('user_id'))
		        		            ->update([ GamesController::$deftypes[0] => 0, GamesController::$deftypes[1] => 0 ]);

		        	}
		        	return $selecteddefenderordertype;

	}


	public function assigngametype()
	{
				$selectedgametype  = -1;
				$selecteddefenderordertype = -1;

				


				$gameass = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('game_type', 'pick_def_order', 'game_played')
		            ->first();

		            //dd($gameass);

		            

		            if($gameass === NULL)
		            {

		            		            		//assign both gametype and defender order type
		            		            	
		            				            for($gt = 0; $gt<session('n_game_type'); $gt= $gt+1)
		            				            {
		            				            	$countgt[$gt]  = \DB::table('assignedgames')
		            		            	            ->where('game_type', $gt)
		            		            	            ->count();
		            		   
		            				            }
		            				            //print_r($countgt);

		            				            uasort($countgt, function($a, $b) {
		            							    if ($a == $b) {
		            							        return 0;
		            							    }
		            							    return ($a < $b) ? -1 : 1;
		            							});

		            				           // dd($countgt);

		            				            // assign to the gametype with less number of users
		            				            $newArray = array_keys($countgt);

		            				            $selectedgametype = $newArray[0];

		            				            
		            				            //dd($newArray[0]);



		            				            // count defender type for the selected gametype
				            		            for($dt = 0; $dt<session('n_defender_order_type'); $dt= $dt+1)
				            		            {
				            		            	$countdt[$dt]  = \DB::table('assignedgames')
				                        	            ->where('game_type', $selectedgametype)
				            		            	    ->where('pick_def_order', $dt)
				                        	            ->count();
				               
				            		            }
				            		            //dd($countdt);

				            		            uasort($countdt, function($a, $b) {
				            		            			    if ($a == $b) {
				            		            			        return 0;
				            		            			    }
				            		            			    return ($a < $b) ? -1 : 1;
				            		            			});
				            		            //print_r($countdt);
				            		            $newArray = array_keys($countdt);

				            		            $selecteddefenderordertype = $newArray[0];
				            		           // dd($countdt);

				            		            

				            		           // dd($selecteddefenderordertype);

				            		            //create a new record with initial values

				            		            \DB::table('assignedgames')->insert(
					            	         	    ['user_id' => session('user_id'), 'game_played' => 0 ,'game_type' => $selectedgametype, 'pick_def_order' => $selecteddefenderordertype, 'random_defender_type' => 0,
					            	         	    'max_defender_type' => 0]
					            	         	);



		        	}
		        	else
		        	{
		        		$selectedgametype = $gameass->game_type;
		        		$selecteddefenderordertype = $gameass->pick_def_order;
		        		// also reset every entry 
		        		\DB::table('assignedgames')
		        		            ->where('user_id', session('user_id'))
		        		            ->update([ GamesController::$deftypes[0] => 0, GamesController::$deftypes[1] => 0, 'total_point' => 0]);

		        	}

		        	return $selectedgametype;
	}




	//shows instructions
	public function show()
	{
		// depending on game type return instruction and practice game
		// 0 no info, 1 fullinfo



		$gametype = $this->assigngametype();


		// update start time here for instruction log
		//dd(session('user_id'));



		//dd($gametype);

		if($gametype === 1)
		{
			session(['gametype' => $gametype]);
			return view('instruction.instruction-fullinfo');
		}
		else if($gametype === 0)
		{
			session(['gametype' => $gametype]);
			return view('instruction.instruction-noinfo');
		}



		

	}


	// public function storestart()
	// {


	// }



	public function storeend()
	{
		$ins_dur = new \App\Instructionduration;


		$ins_dur->user_id = session('user_id');
		$ins_dur->slide = request('slide');
		$ins_dur->duration = request('duration');

		$ins_dur->save();

	}



	


	public function selectgame1()
	{
		// check if there is any assignment for the user for game assignment and picking way of defender 

				//dd([GamesController::$gametypes]);

				$selectedgametype  = -1;
				$selecteddefenderordertype = -1;

				


				$gameass = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('game_type', 'pick_def_order', 'game_played')
		            ->first();

		            //dd($gameass);

		            

		            if($gameass === NULL)
		            {

		            		            		//assign both gametype and defender order type
		            		            	
		            				            for($gt = 0; $gt<session('n_game_type'); $gt= $gt+1)
		            				            {
		            				            	$countgt[$gt]  = \DB::table('assignedgames')
		            		            	            ->where('game_type', $gt)
		            		            	            ->count();
		            		   
		            				            }
		            				            //print_r($countgt);

		            				            uasort($countgt, function($a, $b) {
		            							    if ($a == $b) {
		            							        return 0;
		            							    }
		            							    return ($a < $b) ? -1 : 1;
		            							});

		            				           // dd($countgt);

		            				            // assign to the gametype with less number of users
		            				            $newArray = array_keys($countgt);

		            				            $selectedgametype = $newArray[0];

		            				            
		            				            //dd($newArray[0]);



		            				            // count defender type for the selected gametype
				            		            for($dt = 0; $dt<session('n_defender_order_type'); $dt= $dt+1)
				            		            {
				            		            	$countdt[$dt]  = \DB::table('assignedgames')
				                        	            ->where('game_type', $selectedgametype)
				            		            	    ->where('pick_def_order', $dt)
				                        	            ->count();
				               
				            		            }
				            		            //dd($countdt);

				            		            uasort($countdt, function($a, $b) {
				            		            			    if ($a == $b) {
				            		            			        return 0;
				            		            			    }
				            		            			    return ($a < $b) ? -1 : 1;
				            		            			});
				            		            //print_r($countdt);
				            		            $newArray = array_keys($countdt);

				            		            $selecteddefenderordertype = $newArray[0];
				            		           // dd($countdt);

				            		            

				            		           // dd($selecteddefenderordertype);

				            		            //create a new record with initial values

				            		            \DB::table('assignedgames')->insert(
					            	         	    ['user_id' => session('user_id'), 'game_played' => 0 ,'game_type' => $selectedgametype, 'pick_def_order' => $selecteddefenderordertype, 'random_defender_type' => 0,
					            	         	    'max_defender_type' => 0]
					            	         	);



		        	}
		        	else
		        	{
		        		$selectedgametype = $gameass->game_type;
		        		$selecteddefenderordertype = $gameass->pick_def_order;
		        		// also reset every entry 
		        		\DB::table('assignedgames')
		        		            ->where('user_id', session('user_id'))
		        		            ->update([ GamesController::$deftypes[0] => 0, GamesController::$deftypes[1] => 0, 'total_point' => 0 ]);

		        	}

		        	return redirect('/games/'.$selectedgametype.'/'.$selecteddefenderordertype);
	}


	public function playgame1($gametype, $defordertype)
	{
		

		// check if there is any record
		// if none, redirect to home page or to games/play
				$gameass = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('game_type', 'game_played', 'pick_def_order', 'game_played')
		            ->first();

		            //dd($gameass);

		            

		            if($gameass === NULL)
		            {
		            	return redirect('/games/play');
		            }


		// check if gametype and defordertype is within limit
		if($gametype <0 || $gametype > session('n_game_type')  || $defordertype <0 || $defordertype > session('n_defender_order_type'))
		{
			return redirect()->home();
		}
		// increment gameplayed
		\DB::table('assignedgames')
		->where('user_id', session('user_id'))
		->increment('game_played');


		// keep the instance of the game_id
		$game_id_instance = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('game_type', 'pick_def_order', 'game_played')
		            ->first();

		 


		

		// depending on the order(asc, dsc, rand) of picking def, pick a defender 

		$dtypes = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('random_defender_type','max_defender_type')
		            ->first();

		//dd($dtypes);

		 $dtypes_arr = array();
		 $index = 0;
		foreach ($dtypes as $k=>$v)
		{
			$dtypes_arr[$index++] = $v;

		}

		//dd($arr);	

		$selecteddefender = -1;	
		$done = 'no';	
		$current_play_freq = -1; 

		if($defordertype == 0)  // asc
		{
			// start traversing from index 0
			for($d = 0; $d<session('n_defender_type'); $d++)
			{
				if($dtypes_arr[$d] < session('n_each_type_play_limit'))
				{
					$selecteddefender = $d;
					$current_play_freq = $dtypes_arr[$d];
					if( ($d == (session('n_defender_type')-1)) && ($dtypes_arr[$d] == (session('n_each_type_play_limit')-1) ) )  // add another condition
					{
						$done = 'yes';
					}
					break; 
				}
			}
			

		}
		else if($defordertype == 1) // dsc
		{
			// traverse from index = number of defender types - 1
			for($d = (session('n_defender_type')-1); $d>=0; $d--)
			{
				if($dtypes_arr[$d] < session('n_each_type_play_limit'))
				{
					$selecteddefender = $d;
					$current_play_freq = $dtypes_arr[$d];
					if( ($d == 0) && ($dtypes_arr[$d] == (session('n_each_type_play_limit')-1) ) ) // add another condition 
					{
						$done = 'yes';
					}
					break;
				}
			}

		}
		else if($defordertype == 2) // random
		{
			//choose anything which is not played yet
		}

 
		$current_play_freq = $current_play_freq + 1; // increment for played games defender type 
		\DB::table('assignedgames')
			            ->where('user_id', session('user_id'))
			            ->update([ GamesController::$deftypes[$selecteddefender] => ($current_play_freq) ]);


		if($done === 'yes') // if done , reset everything
		{
			\DB::table('assignedgames')
			            ->where('user_id', session('user_id'))
			            ->update([ GamesController::$deftypes[0] => 0, GamesController::$deftypes[1] => 0 ]);

		}

		$id = $selecteddefender;



		$def_alert = "";

		if($current_play_freq == 1)
		{
			if($selecteddefender == 0)
			{
				$def_alert = "You are now playing against a purely RANDOM DEFENDER.  This means that there is an equal chance that the defender any node on any given round." ;
			}
			if($selecteddefender == 1)
			{
				$def_alert = "You are playing against a STRATEGIC DEFENDER.  This means that the defender is using a computer-generated optimal strategy.  The defender will try to take as many points away from you as possible." ;
			}

		}


		//dd($game_id_instance->game_played);


		$game_instance = $game_id_instance->game_played;

		if($gametype == 0)
		{
			// no info

					//$def_strat = $this->readFileDefStrategyAllPoint();

					//GamesController::$defstratnoinfo = $def_strat;

					

			
					JavaScript::put([
					//'def_strategy'	=> $def_strat,
			        'defendertype' => $selecteddefender,
			        'defordertype' => $defordertype,
			        'user_id' => session('user_id'),
			        'done' => $done,
			        'def_alert' => $def_alert,
			        'game_id_instance' => $game_instance
			    	]);

			    	return view('games.two', compact('game_instance'));

		}
		else if($gametype == 1)
		{
			//full info


					//$def_strat = $this->readFileDefStrategyFullInfo();

					//GamesController::$defstratfullinfo = $def_strat;

					//dd(GamesController::$defstratfullinfo["EMPTY"]["EMPTY"]);

			
					JavaScript::put([
					//'def_strategy'	=> GamesController::$defstratfullinfo,
			        'defendertype' => $selecteddefender,
			        'defordertype' => $defordertype,
			        'user_id' => session('user_id'),
			        'done' => $done,
			        'def_alert' => $def_alert,
			        'game_id_instance' => $game_instance
			    	]);

			    	return view('games.one', compact('game_instance'));

		}


		dd([$gametype, $defordertype, $selecteddefender, $done]);

	}


	public function playgame($gametype, $done)
	{
		//dd($defendertype);

		$dtype = -1;


		\DB::table('playedgames')
		->where('user_id', session('user_id'))
		->increment('game_played');

		          
		


		$defendertype = \DB::table('playedgames')
		->where('user_id', session('user_id'))
		->select('defender_type')
		->value('defender_type');


		if($defendertype === NULL)
		{
			if(mt_rand(1,100)>50)
			{
				// choose random defeneder
				$dtype = 0;
				\DB::table('playedgames')
			            ->where('user_id', session('user_id'))
			            ->update(['defender_type' => $dtype ]);
			}
			else
			{
				$dtype = 1; // maximize utility
				\DB::table('playedgames')
			            ->where('user_id', session('user_id'))
			            ->update(['defender_type' => $dtype ]);
			}


		}
		else
		{
			$dtype = (intval($defendertype xor 1));
			//dd($dtype, $defendertype);
		}

		//dd($dtype);

		$gameplayed = \DB::table('playedgames')
		->where('user_id', session('user_id'))
		->value('game_played');

		if( ($gameplayed) % 2 === 0)
		{
			$done = 'yes';



			// reset defender type

			\DB::table('playedgames')
			            ->where('user_id', session('user_id'))
			            ->update(['defender_type' => NULL ]);
		}


	//	dd($gametype);



		
		

		//echo "hhhh   1   ".$gameplayed. "  ";


		$id = 1;
		//$gameplayed = $gameplayed + 1;

		//echo "hhhh   2   ".$gameplayed. "  ";

		//dd([$gameplayed, $done]);

		if($gametype==='1')
		{
			// no info
			
					JavaScript::put([
			        'defendertype' => $dtype,
			        'user_id' => session('user_id'),
			        'done' => $done
			    	]);

			    	return view('games.two', compact('id'));

		}
		else if($gametype==='2')
		{
			//full info
			
					JavaScript::put([
			        'defendertype' => $dtype,
			        'user_id' => session('user_id'),
			        'done' => $done
			    	]);

			    	return view('games.one', compact('id'));

		}
	}

	



	public function selectgame()
	{
				// using session id find out what type of game he will be assigned to play
				$gameass = \DB::table('playedgames')
		            ->where('user_id', session('user_id'))
		            ->select('game_type', 'game_played')
		            ->value('game_type');



		            //dd($gameass);

		            $gametype = -1;
		            $defendertype = -1;

		            if($gameass===NULL)  // check if there is any assignment
		            {

		            	//dd("NULL");
		            	// if no assignemnt found then make an assignment
		            	// count number of zero and number of 1
		            	// then asign which is less
		            	// if equal then assign any one

		            			$countone = \DB::table('playedgames')
		            	            //->where('assignedgames.user_id', session('user_id'))
		            	            ->where('game_type','1')
		            	            ->count();


		            	 		$counttwo = \DB::table('assignedgames')
		            	            // ->where('assignedgames.user_id', session('user_id'))
		            	             ->where('game_type','2')
		            	             ->count();



		            	         if($countone>$counttwo)
		            	         {
		            	         	\DB::table('playedgames')->insert(
		            	         	    ['user_id' => session('user_id'), 'game_played' => 0 ,'game_type' => 2 ]
		            	         	);
		            	         	$gametype = 2; // fullinfo
		            	         } 
		            	         elseif ($countone<$counttwo) {
		            	            	\DB::table('playedgames')->insert(
		            	            	    ['user_id' => session('user_id'), 'game_played' => 0,'game_type' => 1 ]
		            	            	);
		            	            	$gametype = 1; // noinfo
		            	            } 
		            	            else
		            	            {
		            	            	\DB::table('playedgames')->insert(
		            	         	    ['user_id' => session('user_id'), 'game_played' => 0,'game_type' => 2]
		            	         		);
		            	         		$gametype = 2; // fullinfo

		            	            }  



		            }
		            else
		            {
		            	$gametype = $gameass;

		            }

		            // choose defender type randomly


		            

		            //dd(session('game_played'));


		            
		            $done = false;
		            //dd($done);
		            return redirect('/games/'.$gametype.'/'.'no');

	}




	
	



	public function practicegame()
	{
		if(session('gametype') === 1 )
		{
			return redirect('/games/pracfullinfo');
		}
		else if(session('gametype') === 0 )
		{
			return redirect('/games/pracnoinfo');
		}
	}



	public function practicegamefullinfo()
	{

					$id = 1;
		 	
		 			JavaScript::put([
		 	        'defendertype' => 1,
		 	        'defordertype' => 0,
		 	        'user_id' => session('user_id'),
		 	        'done' => 'yes'
		 	    	]);

		 	    	return view('games.practicefullinfo', compact('id'));

	}

	public function practicegamenoinfo()
	{
		
					$id = 1;

		 			JavaScript::put([
		 	        'defendertype' => 1,
		 	        'defordertype' => 0,
		 	        'user_id' => session('user_id'),
		 	        'done' => 'yes'
		 	    	]);

		 	    	return view('games.practicenoinfo', compact('id'));

	}


	public function startgame($id)
	{


		JavaScript::put([
        'user_id' => session('user_id')
    	]);


    	//dd(session('user_id'));


		session()->flash('message' , 'Welcome to the Risk vs Reward game!');

		if($id==0)
		{
			session()->flash('message' , 'Welcome to the Risk vs Reward Practice game!');
			return view('games.practice');
		}
		else if($id==1)
		{

			return view('games.one', compact('id'));
		}
		else if($id==2)
		{
			return view('games.two', compact('id'));
		}
		else
		{
			return view('games.three', compact('id'));
		}


	}

	public function startpracticegame()
	{
		

		JavaScript::put([
        'user_id' => session('user_id','')
    	]);


		session()->flash('message' , '');

		
		
		return view('games.practice');
		


	}


	public function showmouseonnode($game_id)
	{
				

				//$nodevals = [10,10,4,4,10, 0];


	            for($nodeid = 0; $nodeid<=5; $nodeid++)
	            {



		            $history0 = \DB::table('mouseonnodes')
		            ->where('user_id', session('user_id'))
		            ->where('game_id', $game_id)
		            ->where('node_id', $nodeid)
		            ->select('mouse_x as x','mouse_y as y')
		            ->get();

		            $histories[$nodeid] = $history0;

	        	}	

	        	//dd($histories);

	            for($nodeid = 0; $nodeid<=5; $nodeid++)
	            {

	            	
	            	$index = 0;
	            	for($t = 0; $t<=75000; $t = $t + 500)
	            	{	

			            $history0 = \DB::table('mouseonnodes')
			            ->where('user_id', session('user_id'))
			            ->where('game_id', $game_id)
			            ->where('node_id', $nodeid)
			            ->where('timer','<',$t)
			            ->count();
			            $x[$index++] = ['x'=>$t, 'y' => $history0];
			            //dd($x);
		        	}

		            $freq[$nodeid] = collect($x);

	        	}	        	            



		       // dd($freq);


		        return view('chart.mouseonnode', compact('histories','freq' ));


	}




	public function showmouse($game_id)
	{
				$mousecords = \DB::table('mousecords')
		            ->where('user_id', session('user_id'))
		            ->where('game_id', $game_id)
		            ->select('mouse_x as x','mousef_y as y')
		            ->get();


		            //dd($mousecords);


		            return view('chart.mouse', compact('mousecords'));


	}





	public function showcharts($game_id)
	{
		// query user data for game id = 1, user_id = session('user_id')   Attacker action,

		// need to join two tables game_histories and nodes


		$gamehistory = \DB::table('gamehistories')
            ->join('nodes', 'gamehistories.game_id', '=', 'nodes.game_id')
            //->where('gamehistories.user_id', session('user_id'))
            ->where('gamehistories.game_id', $game_id)
            ->select('gamehistories.user_id', 'gamehistories.attacker_action', 'gamehistories.time_attacker_moved','nodes.node_id','nodes.node_value', 'nodes.node_cost', 'nodes.node_time_required');


            //dd($gamehistory);




            for($nodeid = 0; $nodeid<=5; $nodeid++)
            {



	            $history0 = \DB::table( \DB::raw("({$gamehistory->toSql()}) as gamehistory") )
	            ->mergeBindings($gamehistory)
	            ->where('gamehistory.attacker_action', '=' , \DB::raw('gamehistory.node_id'))
	            ->where('gamehistory.attacker_action', '=' , $nodeid)
	            ->orderBy('gamehistory.time_attacker_moved', 'ASC')
	            ->select('gamehistory.time_attacker_moved as x', 'gamehistory.node_cost as r' ,'gamehistory.node_value as y')
	            ->get();

	            $histories[$nodeid] = $history0;

        	}

		//dd($histories);


		return view('chart.index', compact('histories'));
	}




	public function showinsduration()
	{
		// query user data for game id = 1, user_id = session('user_id')   Attacker action,

		// need to join two tables game_histories and nodes


		
			$histories = array();


            for($slide = 0; $slide<=5; $slide++)
            {
				$history0 = \DB::table('instructiondurations')
	            ->where('slide', '=' , $slide)
	            ->avg('duration');	           

	            $histories[$slide] = $history0;

        	}


       // $his = implode(",", $histories);
		//dd($his);


		return view('chart.insduration', compact('histories'));
	}





	public function showqaconceptual()
	{
		session()->flash('message' , '');

		return view('instruction.qaconceptual');
	}


	public function storeqaconceptual()
	{
		//return view('instruction.qaconceptual');
		//dd(request()->all());



		$this->validate(request(), [


    		'question_1' => 'required|min:1|max:1',
    		'question_2' => 'required|min:1|max:1',
    		'question_3' => 'required|min:1|max:1',

    	

    		]);


		$wrongques1 = '';
		$wrongques2 = '';
		$wrongques3 = '';
		$flag = true;
		


		if(request('question_1') !== "1")
		{
			$wrongques1 = $wrongques1 . 'Question 1: Wrong! Correct answer is 8, because you pay cost 2.'; 
			$flag = false;
		}
		else
		{
			$wrongques1 = $wrongques1 .'Question 1: Correct answer';

		}
		// else if(request('question_1') === "1")
		// {
		// 	$wrongques1 = $wrongques1 . 'Question 1: Correct!'; 
		// }

		

		if(request('question_2') !== "2")
		{
			$wrongques2 = $wrongques2 . ' Question 2: Wrong! Correct answer is 10, because you do not pay any cost if you have control of a node and defender does not take it back.'; 
			$flag = false;
		}
		else
		{
			$wrongques2 = $wrongques2 .'Question 2: Correct answer';

		}

		if(request('question_3') !== "3")
		{
			$wrongques3 = $wrongques3 . ' Question 3: Wrong! Correct answer is 45 cents. Your monetary reward is based off of how many points you finish with. It does not matter how many you start with.'; 
			$flag = false;
		}
		else
		{
			$wrongques3 = $wrongques3 .'Question 3: Correct answer';

		}


		// else if(request('question_2') === "2")
		// {
		// 	$wrongques2 = $wrongques2 . 'Question 2: Correct!'; 
		// }







		if($flag == false)
		{

			return redirect()->back()->withErrors([

                'message' => $wrongques1, 
                'message2' => $wrongques2, 
                'message3' => $wrongques3, 


                ]);

		}


		

		session()->flash('message', 'Everything is correct. Thanks!');
		return view('instruction.qasuccess');

	}



}
