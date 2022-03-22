@extends('layouts.app')
@section('content')

<div class="card mb-4">
  <div class="card-header">
    <div class="text-muted small mr-3">
      {{$post->user->name}}
    </div>
    <h4>{{$post->title}}</h4>
    <span class="ml-auto">
      <a href="{{route('post.edit',$post)}}"><button class="btn btn-primary">編集</button></a>
    </span>
    <span class="ml-2">
      <form method="post" action="{{route('post.destroy',$post)}}" enctype="multipart/form-data">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>
      </form>
    </span>
  </div>
  <div class="card-body">
    <p class="card-text">
      {{$post->body}}
    </p>
    @if($post->image)
    <div>
      (画像ファイル：{{$post->image}})
    </div>
    <img src="{{asset('storage/images/'.$post->image)}}" 
    class="img-fluid mx-auto d-block" style="height: 300px">
    @endif
  </div>
  <div class="card-footer">
    <span class="mr-2 float-right">
      投稿日時 {{$post->created_at->format('Y/m/d H:i:s')}}
    </span>
  </div>
</div>

@endsection