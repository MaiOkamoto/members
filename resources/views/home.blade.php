@extends('layouts.app')
@section('content')
{{$user->name}}さん、こんにちは！
@foreach ($posts as $post)
<div class="container-fuid mt-20" style="margin-left:-10px;">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">

                <div class="card-header">
                  <div class="media flex-warp w-100 align-items-center">
                    <div class="media-body ml-3">{{$post->title}}
                      <div class="text-muted small">{{$post->user->name}}</div>
                    </div>
                    <div class="text-muted small ml-3">
                      <div>投稿日</div>
                      <div><strong>{{$post->created_at->diffForHumans()}}</strong></div>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <p>{{$post->body}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
