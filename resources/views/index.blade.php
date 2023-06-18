@extends('app')
  
@section('content')
    <div class="index-page page">
        <h1 class="index-page__title">Новости</h1>

        <div class="index-page__posts posts-grid">
            @foreach($posts as $post)
                <div class="post">
                        <img src="{{ $post->image_path }}" class="post__image" alt="Post Image">
                        <div class="post__body">
                 <h5 class="post__title">{{ $post->title }}</h5>
           
                 <p class="post__date">{{ date("d.m.Y h:i", strtotime($post->updated_at)) }}</p>
                            <a class="post__link" href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Посмотреть</a>
                </div>
            </div>
            @endforeach
         </div>
    

    </div>
@endsection