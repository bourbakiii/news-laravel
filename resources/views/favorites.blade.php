@extends('app')
 
@section('content')

@section('content')
    <div class="index-page page">
        <h1 class="index-page__title">Избранные новости</h1>
    @if ($favorites->count() > 0)
        <div class="index-page__posts posts-grid">
            @foreach($favorites as $favorite)
                <div class="post">
                        <img src="{{ $favorite->post->image_path }}" class="post__image" alt="Post Image">
                        <div class="post__body">
                 <h5 clss="post__title">{{ $favorite->post->title }}</h5>
           
                 <p class="post__date">{{ date("d.m.Y h:i", strtotime($favorite->post->updated_at)) }}</p>
                           <a class="post__link" href="{{ route('posts.show', $favorite->post->id) }}" class="btn btn-primary">Посмотреть</a>
                </div>
            </div>
            @endforeach
         </div>
    @else <p>Нет избранных постов.</p>
        @endif
 
    </div>
@endsection