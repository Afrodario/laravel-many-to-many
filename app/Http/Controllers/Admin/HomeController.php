<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Importazione della classe esterna AUTH
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //Ritorno alla vista creata automaticamente da Laravel in views quando ho lanciato --auth
    public function index() {

        //L'istanza AUTH e la funzione user recuperano le informazioni sull'utente attualmente loggato
        $user = Auth::user();

        return view('admin.home', compact('user'));
    }
}
