@extends("layouts.app")

@section('content')
<div class="container">
  <h1>Crea un nuovo post</h1>
  <form action="{{route('admin.posts.store')}}" enctype="multipart/form-data" method="POST">

    @csrf
    @method("POST")

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Inserisci il titolo del post">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" name="slug" id="slug" placeholder="Inserisci lo slug">
    </div>
    <div class="form-group">
      <label for="image">Immagine</label>
      <input type="file" class="form-control" name="image" id="image" accept="image/*" placeholder="Inserisci un'immagine">
    </div>
    <div class="form-group">
      <label for="content">Contenuto</label>
      <textarea class="form-control" name="content" id="content" placeholder="Inserisci il contenuto del post"></textarea>
    </div>
    <div>
      <h4>Seleziona le tags</h4>
      <div class="form-check">
        @foreach($tags as $tag)
        <span>
          <input id="tag-{{$tag->id}}" name="tags[]" value="{{$tag->id}}" type="checkbox">
          <label for="tag-{{$tag->id}}">{{$tag->name}}</label>
        </span>
        @endforeach
      </div>
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

    <button type="submit" class="btn btn-primary btn-success">Crea</button>
    <a href={{route("admin.posts.index")}} class="btn btn-primary"><i class="fas fa-long-arrow-alt-left"></i> Indietro</a>
    
  </form>
</div>
@endsection