@extends("layouts.app")

@section('content')
<div class="container">
  <h1>Modifica del post ID {{$article->id}}</h1>
  <h2>{{$article->title}}</h2>
  <form action="{{route('admin.posts.update', $article->id)}}" method="POST">

    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" name="title" id="title" value="{{$article->title}} "placeholder="Inserisci il titolo del post">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" value="{{$article->slug}}" placeholder="Inserisci lo slug">
    </div>
    <div class="form-group">
      <label for="content">Contenuto</label>
      <textarea class="form-control" name="content" id="content" placeholder="Inserisci il contenuto del post">{{$article->content}}</textarea>
    </div>
    
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>
</div>
@endsection