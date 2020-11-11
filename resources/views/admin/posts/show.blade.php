@extends("layouts.app")

@section('content')
    <div class="container">
      <img src="{{asset("storage/$article->image")}}" alt="">
      <h1>{{$article->title}} - ID {{$article->id}}</h1>
      <h4>{{$article->user->name}}</h4>
      <p>{{$article->content}}</p>
    <a href={{route("admin.posts.index")}} class="btn btn-primary btn-lg"><i class="fas fa-long-arrow-alt-left"></i> Indietro</a>
    <a href={{route("admin.posts.edit", $article->id)}} class="btn btn-primary btn-lg">Modifica</a>
    </div>
@endsection