@extends('layouts.app')
  @section('content')
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="card" style="width:18rem;">
            @foreach($users as $users)

              @if($users->profile_image == NULL)
                <img src="/storage/noimage.jpg" style="height:18rem" class="card-img-top">
                @else
                <img src="/storage/{{ $users->profile_image}}" style="height:18rem" class="card-img-top">
              @endif

              <div class="card-body">
                <h4 class="card-title">
                  <p>{{ $users->name }}</p>
                  <p>性別　　@if($users->gender == 1)
                          男
                      @elseif($users->gender == 2)
                          女
                      @else
                          その他
                      @endif
                  </p>
                </h4>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">自己紹介</li>
                <li class="list-group-item">{{ $users->Introduce }}</li>
              </ul>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  @endsection
