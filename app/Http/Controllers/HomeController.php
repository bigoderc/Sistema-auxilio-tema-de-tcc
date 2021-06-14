<?php

namespace App\Http\Controllers;
use App\Tema;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Tema $model)
    {
       //dd($model);
        return view('dashboard', ['temas' => $model->paginate(15)]);
    }
}
