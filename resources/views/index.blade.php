<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="{{asset('/assets/css/style.css')}}" rel="stylesheet">
 <link href="{{asset('/assets/css/reset.css')}}" rel="stylesheet">

  <title>Document</title>
</head>
<body>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="todo">
  <div class="todo__list">
    <p class="todo__ttl">Todo List</p>
    <form action="/todo/create" method="post" class="form">
      @csrf
      <input type="text" name="content" class="create">
      <button class="create__btn">追加</button>
    </form>
    <table class="todotable">
      <tr>
        <th width="25%">作成日</th>
        <th width="50%">タスク名</th>
        <th width="10%">更新</th>
        <th width="10%">削除</th>
      </tr>
      @foreach($items as $item)
      <tr>
        <td > {{$item->created_at}}</td>
        <td >  
          <form action="/todo/update" method="post">
              @csrf
              <input type="text" value="{{$item->content}}" class="content" name="content">
              <input type="hidden" value="{{$item->id}}" name="id">
        </td>
        <td >
          <button class="update__btn">更新</button>
        </form>
        </td>
        <td>
          <form action="/todo/delete" method="post">
            @csrf
            <input type="hidden" value="{{$item->id}}" class="content" name="id">
            <button class="delete__btn">削除</button>
          </form>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
  
</body>
</html>