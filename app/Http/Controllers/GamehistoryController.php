<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamehistoryController extends Controller
{
    //


    public function updateGamePlayed()
    {


    	$user_id = request('user_id');
		$def_type = request('def_type');

    	// increment gameplayed
		\DB::table('assignedgames')
		->where('user_id', session('user_id'))
		->increment('game_played');


		// if($def_type==0)
		// {
		// 	\DB::table('assignedgames')
		//  	            ->where('user_id', session('user_id'))
		//  	            ->increment('random_defender_type');
		// }
		// else if($def_type==1)
		// {
		// 	\DB::table('assignedgames')
		//  	            ->where('user_id', session('user_id'))
		//  	            ->increment('max_defender_type');
		// }

		$def = 'def'.$def_type;

		\DB::table('assignedgames')
		 	            ->where('user_id', session('user_id'))
		 	            ->increment($def);




		




    }


    public function checkForEnd()
    {
    	$game_count= \DB::table('assignedgames')
		            ->where('user_id', request('user_id'))
		            ->select('game_played')
		            ->first();


		$game_count_compact= \DB::table('compact_game_histories')
		            ->where('user_id', request('user_id'))
		            ->select('game_type', 'def_order', 'game_played')
		            ->count();            

		if(($game_count->game_played>=session('total_play_limit')) || ($game_count_compact>session('total_play_limit')))
		 {
		 	return [
				"END"=> "1", 
				

		 ];


		 }
    }






    public function store()
    {

    	//dd(request()->all());


    	            


  //   	$game_count_compact= \DB::table('compact_game_histories')
		//             ->where('user_id', session('user_id'))
		//             ->select('game_type', 'def_order', 'game_played')
		//             ->count();

		// if($game_count>=session('total_play_limit')) 
		// {
		// 	$game= \DB::table('compact_game_histories')
		//             ->where('user_id', session('user_id'))
		//             ->select('game_type', 'def_order', 'game_played')
		//             ->orderBy('upload_time', 'desc')->first();
		// }  '





		$game_count= \DB::table('assignedgames')
		            ->where('user_id', request('user_id'))
		            ->select('game_played')
		            ->first();


		$game_count_compact= \DB::table('compact_game_histories')
		            ->where('user_id', request('user_id'))
		            ->select('game_type', 'def_order', 'game_played')
		            ->count();            

		if(($game_count->game_played>=session('total_play_limit')) || ($game_count_compact>session('total_play_limit')))
		 {
		 	return [
				"END"=> "1"
				

		 ];


		 }        




		 



    	$gamehistory = new \App\Gamehistory;

		$gamehistory->game_id = request('gameid');
		$gamehistory->user_id = request('user_id');
		$gamehistory->round = request('round');
		$gamehistory->defender_action = request('defender_action');
		$gamehistory->attacker_action = request('attacker_action');
		$gamehistory->time_defender_moved = request('time_defender_moved');
		$gamehistory->time_attacker_moved = request('time_attacker_moved');
		$gamehistory->defender_points = request('defender_points');
		$gamehistory->attacker_points = request('attacker_points');
		$gamehistory->game_id_instance = request('game_id_instance');

		
		
		$gamehistory->save();


		if(request('round') == 5) // the last round
		{
			// update total points in assigned games table


			// get total points
			$game_id_instance = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('total_point', 'pick_def_order', 'game_played')
		            ->first();

		    $total_point = $game_id_instance->total_point + request('attacker_points');


		    \DB::table('assignedgames')
		    	            ->where('user_id', session('user_id'))
		    	            ->update([ 'total_point' => $total_point ]);
		}



		return request()->all();



    }



     public function storeCompact()
    {


    	// Schema::create('compact_game_histories', function (Blueprint $table) {
     //        $table->increments('id');
     //        $table->string('user_id');
     //        $table->integer('game_id');
     //        $table->integer('game_id_instance');
     //        $table->integer('def_type'); // new or old
     //        $table->integer('def_order');
     //        $table->integer('cur_round');
     //        $table->integer('a1');
     //        $table->integer('a2');
     //        $table->integer('a3');
     //        $table->integer('a4');
     //        $table->integer('a5');
     //        $table->integer('d1');
     //        $table->integer('d2');
     //        $table->integer('d3');
     //        $table->integer('d4');
     //        $table->integer('d5');
     //        $table->integer('defender_cur_points');
     //        $table->integer('attacker_cur_points');
     //        $table->timestamps();

    	//dd(request()->all());


    	//\DB::table('assignedgames')
		// 	            ->where('user_id', session('user_id'))
		// 	            ->update([ GamesController::$deftypes[$selecteddefender] => ($current_play_freq) ]);



    	if(request('round')==1)
    	{

    	$gamehistory = new \App\CompactGameHistory;

		$gamehistory->game_id = request('gameid');
		$gamehistory->game_type = request('game_type');//partila or fullinfo
		$gamehistory->user_id = request('user_id');
		$gamehistory->game_id_instance = request('game_id_instance');
		$gamehistory->def_type = request('def_type'); // new or old
		$gamehistory->def_order = request('def_order'); // new or old		

		$gamehistory->cur_round = request('round');
		
		$gamehistory->a1 = request('attacker_action');
		$gamehistory->d1 = request('defender_action');

		$gamehistory->defender_cur_points = request('defender_points');
		$gamehistory->attacker_cur_points = request('attacker_points');
		

		
		
		$gamehistory->save();
	}
	else
	{

		$acarray = array('a1', 'a2', 'a3', 'a4', 'a5'); 
		$dcarray = array('d1', 'd2', 'd3', 'd4', 'd5'); 


		\DB::table('compact_game_histories')
		 	            ->where('user_id', request('user_id'))
		 	            ->where('game_id', request('gameid'))
		 	            ->where('game_id_instance', request('game_id_instance'))
		 	            ->update([ $acarray[request('round')-1] => request('attacker_action'),  $dcarray[request('round')-1] => request('defender_action'), 'defender_cur_points' => request('defender_points'),  'attacker_cur_points' => request('attacker_points'), 'cur_round' => request('round')]);

	}


		if(request('round') == 5) // the last round
		{
			// update total points in assigned games table


			// get total points
			$game_id_instance = \DB::table('assignedgames')
		            ->where('user_id', session('user_id'))
		            ->select('total_point', 'pick_def_order', 'game_played')
		            ->first();

		    $total_point = $game_id_instance->total_point + request('attacker_points');


		    \DB::table('assignedgames')
		    	            ->where('user_id', session('user_id'))
		    	            ->update([ 'total_point' => $total_point ]);
		}



		return request()->all();



    }


     public function storeinit()
    {

    	//return request()->all();


    	$gameinit = new \App\gameinit;

		$gameinit->game_id = request('game_id');
		$gameinit->user_id = request('user_id');
		$gameinit->start_time = request('start_time');

		$gameinit->game_id_instance = request('game_id_instance');
		
		
		
		$gameinit->save();

		return request()->all();



    }


     public function storemouseonnode()
    {
    	$mouseonnode = new \App\Mouseonnode;

		$mouseonnode->game_id = request('game_id');
		$mouseonnode->user_id = request('user_id');
		$mouseonnode->node_id = request('node_id');
		
		$mouseonnode->round = request('round');
		$mouseonnode->timer = request('timer');
		$mouseonnode->mouse_x = request('mouse_x');
		$mouseonnode->mouse_y = request('mouse_y');
		
		
		$mouseonnode->save();

		return request()->all();
    }



    public function storemouse()
    {
    	$mousecord = new \App\Mousecord;

		$mousecord->game_id = request('game_id');
		$mousecord->user_id = request('user_id');
		$mousecord->round = request('round');
		$mousecord->timer = request('timer');
		$mousecord->mouse_x = request('mouse_x');
		$mousecord->mouse_y = request('mouse_y');
		
		
		$mousecord->save();

		return request()->all();
    }



        public function storeeye()
        {
        	$eyecord = new \App\Eyecord;

    		$eyecord->game_id = request('game_id');
    		$eyecord->user_id = request('user_id');
    		$eyecord->round = request('round');
    		$eyecord->timer = request('timer');
    		$eyecord->eye_x = request('eye_x');
    		$eyecord->eye_y = request('eye_y');
    		
    		
    		$eyecord->save();

    		return request()->all();
        }



    public function storetentative()
    {

    	//return request()->all();


    	$gametentativehistory = new \App\GameTentativeHistory;

		$gametentativehistory->game_id = request('gameid');
		$gametentativehistory->user_id = request('user_id');
		$gametentativehistory->round = request('round');
		$gametentativehistory->defender_action = request('defender_action');
		$gametentativehistory->attacker_action = request('attacker_action');
		$gametentativehistory->time_defender_moved = request('time_defender_moved');
		$gametentativehistory->time_attacker_moved = request('time_attacker_moved');
		$gametentativehistory->defender_points = request('defender_points');
		$gametentativehistory->attacker_points = request('attacker_points');
		$gametentativehistory->game_id_instance = request('game_id_instance');


		
		$gametentativehistory->save();

		return request()->all();



    }
}
