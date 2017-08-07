<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamehistory extends Model
{
    //



    public function user()
	{
		return $this->belongsTo(User::class);
	}


	public function nodes()
    {
        return $this->belongsToMany('App\Node', gamehistory_node, 'user_id', 'game_id');
    }
}
