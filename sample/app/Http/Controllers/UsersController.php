<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $login_user_id = Auth::user()->id;
      $users = User::orderBy('created_at', 'desc')->get();
      // dd($loginuserid);
      return view('woker.index')->with([
        'users' => $users,
        'login_user_id'    =>$login_user_id
      ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('woker.show',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)//編集用画面へ(GET)
    {
        return view('woker.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) //editの編集画面をDBに格納
    {

        //Userモデルをインスタンス化して、
      $data = $request->all();

      $validator= Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'gender' => ['required'],
          'introduce' => ['required','string','max:255'],
          'profile_image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
      ]);
      $validator->validate();
      $user->updateuser($data);

      return redirect('users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
