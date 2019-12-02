<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'profile_image',
        'permission',
        'Introduce',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'permission' => 'integer',
    ];

    public function updateuser(array $params)
    {
      if (isset($params['profile_image'])) {
        $file_name = $params['profile_image']->store('public');   //store()で保存すると、戻り値にpublic/がつく
        $file_name = str_replace('public/', '', $file_name);    //シンボリックリンクの先がstorageから一気にpublicに飛ぶので文字列profile＿imageのpublic/を消した。


      $this::where('id', $this->id)
      ->update([
        'name'          => $params['name'],
        'gender'        => $params['gender'],
        'introduce'     => $params['introduce'],
        'profile_image' => $file_name,
      ]);
      } else {
        $this::where('id', $this->id)
        ->update([
          'name'          => $params['name'],
          'gender'        => $params['gender'],
          'introduce'     => $params['introduce'],
        ]);
      }
      return;
    }

}
