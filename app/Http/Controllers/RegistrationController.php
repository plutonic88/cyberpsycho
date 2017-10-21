<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;

use Illuminate\Support\Facades\Hash;



class RegistrationController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('guest');
    }


    public function create()
    {
    	return view('registration.create');
    }



    public function store()
    {

       // dd(request()->all());

       // $userid =  hash("sha256",request('user_id'));


    	//validate the user
    	$this->validate(request(), [


    		'school' => 'required',

    		'favpet' => 'required',

    		'age' => 'required|numeric',



    		]);

        $users = User::all();

        $matched = false;

        $start = microtime(true);

        $hash_user = hash('md5', request('user_id'));

        foreach ($users as $user) 
        {
            
            //echo $user->user_id;

            //if(password_verify(request('user_id'), $user->user_id))
            if(strcmp($user->user_id, $hash_user)===0)
            {
             //   echo "matched";
                //dd($user->user_id);
                $matched = true;
                break;

            }

          //  if(Hash::check(request('user_id'), $user->user_id))
            //{
            //    echo "Matched with one";
             //   $matched = true;
              //  break;

            //}


        }

       // echo hash('md5', request('user_id'));


        $time_elapsed_secs = microtime(true) - $start;

        //dd($time_elapsed_secs);


        if($matched==false)
        {
            // create the user and save

            $user = User::create(request(['user_id']));


            //sign the user in
            auth()->login($user);

            // session variable

            //dd($user->user_id);
            
            session('user_id', '');
            session(['user_id' => $user->user_id]);
            session(['n_game_type' => 2]);
            session(['n_defender_type' => 2]);
            session(['n_defender_order_type' => 2]);
            session(['n_each_type_play_limit' => 3]);
             session()->flash('message' , 'Thank you so much for registering');
            //dd(session('user_id', ''));


            return redirect('/');


        }
        else
        {
            return redirect()->back()->withErrors([

                'message' => 'You are already registered'

                ]);
        }

       // dd($users);






    	
    	// redirect to the instructions page


    	




    }
}
