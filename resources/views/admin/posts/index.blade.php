@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <a href="{{route("admin.posts.show", $article->id)}}">Visualizza</a>
                        <a href="{{route("admin.posts.edit", $article->id)}}">Modifica</a>
                        <a href="{{route("admin.posts.destroy", $article->id)}}">Elimina</a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection