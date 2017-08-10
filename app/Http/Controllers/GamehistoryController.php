<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamehistoryController extends Controller
{
    //

    public function store()
    {

    	//dd(request()->all());


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
