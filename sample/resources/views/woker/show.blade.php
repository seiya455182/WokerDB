@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    <div class="p-5 d-flex flex-column">
                        <img src="{{ asset('storage/'.$user->profile_image) }}"  width="200" height="200">
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">名前:{{ $user->name }}</h4>
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">性別:
                            @if($user->gender == 1)男性
                            @elseif($user->gender == 2)女性
                            @elseその他
                            @endif
                            </h4>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">自己紹介</p>
                                <span>{{ $user->introduce }}</span>
                            </div>
                            @if(auth()->user()->id == $user->id || 5 >= auth()->user()->permission)
                            <!-- ログイン中のユーザーIDが同じ、もしくはpermissionが5以下なら編集可 -->
                            <form style="display: inline-block; float:right" action="{{ route('users.edit',['user'=>$user])}}">
                              @csrf
                            <button class="btn btn-primary">編集</button>
                            </form>
                            @endif
                            @if(auth()->user()->id == $user->id || 5 >= auth()->user()->permission)
                            <!-- ログイン中のユーザーIDが同じ、もしくはpermissionが5以下なら削除可 -->
                            <form style="display:inline" action="{{ route('users.destroy',$id = $user->id) }}" method="post" enctype="multipart/form-data">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-danger">
                                  削除
                              </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
