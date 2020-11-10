@extends("layouts.app")

@section('content')
<div class="container">
  <h1>Crea un nuovo post</h1>
  <form action="{{route('admin.posts.store')}}" method="POST">

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
      <label for="content">Contenuto</label>
      <textarea class="form-control" name="content" id="content" placeholder="Inserisci il contenuto del post"></textarea>
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