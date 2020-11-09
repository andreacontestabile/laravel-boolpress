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
                        <a href="#">Visualizza</a>
                        <a href="#">Modifica</a>
                        <a href="#">Elimina</a>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection