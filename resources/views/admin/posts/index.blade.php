@extends('layouts.app')

@section('content')
    <div class="container">
      <a class="btn btn-primary btn-lg" href="{{route("admin.posts.create")}}">Crea un nuovo post</a>
        <table class="table">
            <thead>
              <tr>
                <th>Titolo</th>
                <th>Contenuto</th>
                <th>Slug</th>
                <th>Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($articles as $article)
                  <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->content}}</td>
                    <td>{{$article->slug}}</td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="{{route("admin.posts.show", $article->id)}}">Visualizza</a>
                        <a class="btn btn-secondary btn-sm" href="{{route("admin.posts.edit", $article->id)}}">Modifica</a>
                        <form action="{{route("admin.posts.destroy", $article->id)}}" method="POST">
                          @csrf
                          @method("DELETE")
                          <input class="btn btn-danger btn-sm" type="submit" value="Elimina">
                        </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection