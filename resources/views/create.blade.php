@extends('layouts.app')

@section('content')
    <h1 class="text-center">@if(isset($post)) Editar postagem @else Nova postagem @endif</h1>
    <hr class="hr-color">

    <div class="col-8 m-auto">

    @if(isset($errors) && count($errors) > 0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors->all() as $erro)
                {{$erro}}<br>
            @endforeach
        </div>
    @endif

    <div class="text-left">
        <a href="{{url("/posts")}}">
            <button class="btn btn-danger mb-3">Voltar</button>
        </a>
    </div>

    <div>

    @if(isset($post))
        <form name="formEdit" id="formEdit" method="post" action="{{url("posts/$post->id")}}" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form name="formCad" id="formCad" method="post" action="{{url('posts')}}" enctype="multipart/form-data">
    @endif
        
            @csrf

            <label>Título</label>
            <input name="title" id="title" class="form-control mb-3" type="text" value="{{$post->title ?? ''}}" required>
            
            <label>Texto da postagem</label>
            <div class="mb-1">
                <button type="button" class="btnClearText btn btn-light" data-toggle="tooltip" title="Limpar texto">
                    <i class="fas fa-eraser"></i>    
                </button>
            </div>

            <textarea name="content" id="content" class="form-control mb-3" cols="30" rows="10" required>{{$post->content ?? ''}}</textarea>
            
            <div class="form-group">
                <label>Imagem da postagem</label>
                <input type="file" class="form-control" name="image">
            </div>

            <input class="btn btn-primary mb-3" type="submit" value="@if(isset($post)) Salvar alterações @else Cadastrar @endif">
        </form>

        <div class="form-group">
            @if(isset($post->relPhotos->image))
            <img src="{{asset('storage/' . $post->relPhotos->image)}}" alt="" class="img-fluid">

            <form action="{{url('/photos/remove')}}" method="post">
                @csrf
                <input type="hidden" name="photoName" value="{{$post->relPhotos->image}}">
    
                <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Remover imagem">
                            <i class="fas fa-trash"></i>
                </button>
            </form>
            @endif
        </div>
        
    </div>
@endsection