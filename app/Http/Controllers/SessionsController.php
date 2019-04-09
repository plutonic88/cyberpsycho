<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;




class SessionsController extends Controller
{
    //


    public function __construct()
    {
    	$this->middleware('guest')->except(['destroy']);
    }



    public function create()
    {
    	return view('sessions.create');
    }




    public function store()
    {

    	//dd(request()->all());

    	// attempt to auth the user
    	//if(! auth()->attempt(request(['user_id'])))
    	//{
    	//	return back()->withErrors([

    	//		'message' => 'pleasae check your credentials'

    	//		]);
    //	}

        //dd(auth()->user()->id);





        $users = User::all();

        $matched = false;


        $hash_user = hash('md5', request('user_id'));


        foreach ($users as $user) 
        {
            
            //echo $user->user_id;


            if(strcmp($user->user_id, $hash_user)===0)
            {
                // echo "Matched with one";
                 $matched = true;
                 auth()->login($user);

                 //session variable 

                 session('user_id', '');
                 session(['user_id' => $user->user_id]);
                 session(['n_game_type' => 2]);
                 session(['n_defender_type' => 2]);
                 session(['n_defender_order_type' => 2]);
                 session(['n_each_type_play_limit' => 3]);
                 session(['total_play_limit' => 6]);
                 session()->flash('message' , 'Welcome! You are now logged in');
                 //dd(session('user_id', ''));



                 

                 break;

            }


            // if(Hash::check(request('user_id'), $user->user_id))
            // {
            //    // echo "Matched with one";
            //     $matched = true;
            //     auth()->login($user);

            //     //session variable 

            //     session('user_id', '');
            //     session(['user_id' => $user->user_id]);
            //     session(['n_game_type' => 2]);
            //     session(['n_defender_type' => 2]);
            //     session(['n_defender_order_type' => 2]);
            //     session(['n_each_type_play_limit' => 3]);
            //     session()->flash('message' , 'Welcome! You are now logged in');
            //     //dd(session('user_id', ''));

            //     break;

            // }


        }

        if($matched==false)
        {
           

            return redirect()->back()->withErrors([

                'message' => 'Check your credentials'

                ]);


        }
        


   


    	return redirect('/');



    }



    public function destroy()
    {


    	auth()->logout();

        session()->flash('message' , 'You are successfully logged out');

    	return redirect('/');

    }

    public function username()
    {
        return 'user_id';
    }
}
