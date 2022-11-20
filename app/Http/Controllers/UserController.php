<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Bridge\UserRepository;

class UserController extends Controller
{
    public function index() {
       // return view('users.index');

        $user = User::all(); 
        
        //$user = DB::table('users')->first();
        //dd($user);

        return view('users.index', [
            'users' => DB::table('users')->orderBy('id')->cursorPaginate(15)
        ]);
    }

    public function create() {

        return view('auth.register');
    }

    public function store(User $users, Request $request){  

       $users->create( $request->all());
  
        return redirect()->
        route('users.index')->
        withSuccess("El Usuario de id: {$users->name} fue creado");
        
      }

    public function edit(User $user) {

        //return $user;
        return view("users.edit")->with([
            'users' => $user,
    
        ]);
    }

    public function update( UserRequest $request, User $user) {
/*      $users = User::find($user);
        $users->name = request("name");
        $users->email = request("email");
        $users->save();*/

        $user->update( $request->all());
        return redirect()->
        route('users.index')->
        withSuccess("El Usuario de : {$user->name} fue editado");


      
    }

    public function show( $user) {
     //   return view('users.show');
     
     
      $users = User::findOrFail($user);
      return view('users.show')->with([
        'users' => $users,
      
 
    ]);     
    }

    public function destroy(Request $request, User $user){
        // $user = User::findOrFail($product);
 
       $user->delete( $request->all());
 
       return redirect()->
       route('users.index')->
       withSuccess("El Usuario de id: {$user->name} fue eliminado");
 
      }

      public function logout(Request $request, Redirector $redirector){
        
        Auth::logout();

        //Linea para invalidar la sesion del usuario y generar un nuevo token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        //Linea para Redireccionar al usuario al inicio
        return redirect('/');

      }


}
