@extends('app')
      
@section('content')
    <div class="page post-page">
            <img src="{{ $post->image_path }}" class="post-page__image" alt="Post Image" style="max-width: 100%;">
                         <h2 class="post-page__title">{{ $post->tile }}</h2>
                <p class="">{{ $post->content }}</p>
                <p class="">{{ date("d.m.Y h:i", strtotime($post->updated_at)) }}</p>
                   @auth
            @if ($post->isFavorited(Auth::id()))
                 <form class="post-page__form" action="{{ route('posts.favorite.remove', $post->id) }}" method="POST">
                     @csrf
                    <button type="submit" class="post-page__button">Удалить из избранного</button>
                </form>
            @else
                <form class="post-page__form" action="{{ route('posts.favorite.add', $post->id) }}" method="POST">
                     @csrf
                     <button type="submit" class="post-page__button">Добавить в избранное</button>
                </form>
        @endif
    @endauth
    <a href="{{ route('posts.index')}}" class="post-page__button">Назад</a>
     </div>



 
    

 
    

 
    

 
    





 
    

     
     
    




@endsection