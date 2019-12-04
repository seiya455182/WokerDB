@extends('layouts.app')
  @section('content')
    <div class="container">

      <div class="mx-auto" style="width:1000px;">
        <form method="get" action="{{ route('users.index')}}">
        @csrf
        <div class="input-group mb-3">
          <div class="col-md-10">
          <input type="text" class="form-control" name="search">
        </div>
          <div class="form-group col-mb-3">
            <select type="text" class="form-control" name="gender">
              <option value="">指定なし</option>
              <option value=1>男性</option>
              <option value="2">女性</option>
              <option value="3">その他<option>
            </select>
          </div>
          <button type="submit"  class="btn btn-primary mb-4">検索</button>
        </div>
      </form>
      </div>

      <div class="row">
        @foreach($users as $users)
        <div class="col-3">
          <div class="card" style="width:18rem;">
              @if($users->profile_image == NULL)
                <img src="/storage/noimage.jpg" style="height:18rem" class="card-img-top">
                @else
                <img src="/storage/{{ $users->profile_image}}" style="height:18rem" class="card-img-top">
              @endif

              <div class="card-body">
                <h4 class="card-title">
                  <p>{{ $users->name }}</p>
                </h4>
                <a class="btn btn-primary" style="display: inline-block; float:right"
                href="{{ route('users.show',['id' => $users->id ]) }}">詳細</a>
              </div>
              <div class="card-footer">
              </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
@endsection
