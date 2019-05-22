<?php

namespace App\Http\Controllers;

use App\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TravelController extends Controller
{
    public function index()
    {
        $travels = Travel::orderBy('datum')
            ->get();


        return view('welcome', compact('travels'));
    }


    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required|min:4',
            'email' => 'email',
            'password'=>'required'


        ]);


        $user =\App\User()::all();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();
    }

    public function registerTravel(Request $request)
    {
        $request->validate([

            'title' => 'required|min:6',
            'content' => 'required'


        ]);


        $user =\App\User()::all();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = $request->get('password');

        $user->save();
    }

    public function show()
    {
        return view('sign');
    }

    public function create()
    {
        return view('newtravel');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|min:3',
            'content' => 'required'


        ]);


        $travel = new \App\Travel() ;
        $travel->name = $request->get('name');
        $travel->travelcontent = $request->get('travelcontent');

        $travel->save();


        return redirect('/');
    }

    public function add(Request $request, Travel $travel)
    {
        if ($travel->users()->count() < $travel->max) {
            if ($travel->users()->where('user_id', Auth::user()->id)->count() == 0) {
                $travel->users()->attach(Auth::user());
            } else {
                Session::flash('error', 'Már jelentkeztél!');
            }
        } else {
            Session::flash('error', 'Nincs hely!');
        }

        return redirect('/');
    }

    public function bovebben(Request $request, Travel $travel)
    {
        return view('more', compact('travel'));
    }

    public function hozzaad(Request $request)
    {

        $request->validate([

            'title' => 'required|min:6',
            'leiras' => 'required',
            'kezdet' => 'required',
            'hosszuleiras' => 'required',
            'letszam' => 'required',


        ]);

        $travel = new Travel();
        $travel->name = $request->title;
        $travel->travelcontent = $request->leiras;
        $travel->max = $request->letszam;
        $travel->datum = $request->kezdet;
        $travel->leiras = $request->hosszuleiras;
        $travel->save();

        return redirect('/');
    }
}
