@extends('layouts.app')

  @section('content')
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>性別</th>
            <th>権限レベル</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $users)
          <tr>
              <td scope="row">{{ $users->id}}</td>
              <td>{{ $users->name }}</td>
              <td>
                @if($users->gender == 1)男性
                @elseif($users->gender == 2)女性
                @elseその他
                @endif
              </td>
              <td>
                {{ $users->permission }}
              </td>
              <td>
                <input id="gender-f" type="radio" name="gender" value=2>
                <label for="gender-f">閲覧編集</label>
                <input id="gender-o" type="radio" name="gender" value=3>
                <label for="gender-o">閲覧のみ</label>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endsection
