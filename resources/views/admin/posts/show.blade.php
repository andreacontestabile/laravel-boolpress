@extends("layouts.app")

@section('content')
    <div class="container">
      <img src="{{asset("storage/$article->image")}}" alt="">
      <h1>{{$article->title}} - ID {{$article->id}}</h1>
      <small>{{$article->slug}}</small>
      <h4>{{$article->user->name}}</h4>
      <p>{{$article->content}}</p>
    </div>
@endsection