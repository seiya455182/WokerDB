<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('id', 'asc')->get();
      return view('woker.admin-index',['users' => $users]);
    }

    public function index2()
    {
      $users = User::orderBy('id', 'asc')->get();
      return view('woker.admin-index2',['users' => $users]);
    }

    public function change_permission($id)
    {
      $permission = User::where('id',$id)->value('permission');
      //value()メソッドで指定した1つのカラムのみを取得します。
      if($permission == 10){
        User::where('id',$id)->update([   //permissionが10(閲覧者)なら5(編集者)を付与
          'permission' => 5
        ]);
      }else{
        User::where('id',$id)->update([
          'permission' => 10
        ]);
      }
      return back();
    }
}
