<?php namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;


use Cinema\Http\Controllers\Controller;
use Session;
use Redirect;

use Illuminate\Http\Request;

class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $users=\Cinema\User::paginate(2);
		return view('usuario.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuario.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest $request)
	{
		\Cinema\User::create([
		   'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>$request['password'],
        ]);
        Session::flash('message','Usuario creado correctamente');
        return Redirect::to('/usuario');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user=\Cinema\User::find($id);
        return view('usuario.edit',['user'=>$user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserUpdateRequest $request)
	{
		$user=\Cinema\User::find($id);
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario actualizado correctamente');
        return Redirect::to('/usuario');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $user=\Cinema\User::find($id);
        $user->delete();
        Session::flash('message','Usuario eliminado correctamente');
        return redirect('/usuario');
	}

}
