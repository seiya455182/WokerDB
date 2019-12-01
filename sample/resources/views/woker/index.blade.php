@extends('layouts.app')
  @section('content')
    <div class="container">
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
