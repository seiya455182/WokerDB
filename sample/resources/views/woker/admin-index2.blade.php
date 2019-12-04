@extends('layouts.app')

  @section('content')
    <div class="container" style="background-color:#ffff00">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>名前</th>
            <th>性別</th>
            <th>権限レベル</th>
            <th></th>
            <th>編集権限付与</th>
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
                @if($users->permission == 1)管理者
                @elseif($users->permission == 5)編集可
                @else閲覧可
                @endif
              </td>
              <td>
                <form style="display:inline; float:right" action="{{ route('users.destroy',['id' => $users->id ]) }}"
                  method="post" enctype="multipart/form-data">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">
                    削除
                  </button>
                </form>
                <a class="btn btn-primary" style="display:inline-block; float:right"
                href="{{ route('users.edit',['id' => $users->id ]) }}">詳細編集</a>
              </td>
              <td>
                @if($users->permission >= 6)
                 <form action="{{ route('permission', ['id' => $users->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">権限付与</button>
                </form>
                @elseif($users->permission == 5)
                <form action="{{ route('permission', ['id' => $users->id]) }}" method="POST">
                   {{ csrf_field() }}
                   <button type="submit" class="btn btn-danger">権限取り消し</button>
                </form>
                @else変更できません。
                @endif

              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endsection
