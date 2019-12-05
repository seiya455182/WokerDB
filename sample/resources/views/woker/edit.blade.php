@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-3">
            <div class="card">
              <form method="POST" action="{{ route('users.update',['user'=>$user]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="d-inline-flex">
                    <div class="p-5 d-flex flex-column">
                        <img src="{{ asset('storage/'.$user->profile_image) }}"  width="200" height="200">
                        <input type="file" name="profile_image" autocomplete="profile_image">
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">名前:<input id="name" type="text" name="name" value="{{ $user->name }}"></h4>
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">現在:
                            @if($user->gender == 1)男性
                            @elseif($user->gender == 2)女性
                            @elseその他
                            @endif
                            </h4>
                            <div class="col-md-10" style="padding-top: 4px">
                            <input id="gender-m" type="radio" name="gender" value=1
                            @if($user->gender == 1)
                            checked
                            @endif>
                            <label for="gender-m">男性</label>
                            <input id="gender-f" type="radio"  name="gender" value=2
                            @if($user->gender == 2)
                            checked
                            @endif>
                            <label for="gender-f">女性</label>
                            <input id="gender-o" type="radio" name="gender" value=3
                            @if($user->gender == 3)
                            checked
                            @endif>
                            <label for="gender-o">その他</label>
                          </div>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">自己紹介</p>
                                <textarea id="introduce" name="introduce" rows="10" cols="60">
                                  {{ old('introduce') ?: $user->introduce }}
                                </textarea>
                            </div>
                        </div>
                        <button class="btn btn-success">更新</button>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
