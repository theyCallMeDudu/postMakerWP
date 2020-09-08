@extends('layouts.app')

@section('content')
    <h1 class="text-center">Postagens</h1>
    <hr class="hr-color">

    <div class="col-8 m-auto">

        <div class="text-right">
            <a href="{{url("posts/create")}}">
                <button class="btn btn-success mb-3">Nova postagem</button>
            </a>
        </div>

        <table class="table table-dark text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Registro</th>
                <th scope="col">Título</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                
            @foreach($post as $posts)

            <tr>
                <th scope="row">{{$posts->id}}</th>
                <td>{{$posts->title}}</td>
                <td> <?php date_default_timezone_set('America/Sao_Paulo'); ?> 
                     {{$posts->created_at->format('d-m-Y H:i:s')}}
                </td>
                <td>
                    <a href="#" target="_blank" data-toggle="tooltip" title="Visualizar">
                        <button class="btn btn-danger">
                            <i class="fas fa-external-link-square-alt"></i>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="{{url("posts/$posts->id/edit")}}" data-toggle="tooltip" title="Editar">
                        <button class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                </td>

                <td>
                    <a href="#" data-toggle="tooltip" title="Publicar">
                        <button class="btn btn-success">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
 
            </tbody>
        </table>

        {{$post->links()}}

    </div>
@endsection