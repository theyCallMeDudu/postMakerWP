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
        <form name="formEdit" id="formEdit" method="post" action="{{url("posts/$post->id")}}">
        @method('PUT')
    @else
        <form name="formCad" id="formCad" method="post" action="{{url('posts')}}">
    @endif
        
            @csrf

            <input name="title" id="title" class="form-control mb-3" type="text" value="{{$post->title ?? ''}}" placeholder="Título" required>
            
            <div class="mb-1">
                <button type="button" class="btnClearText btn btn-light" data-toggle="tooltip" title="Limpar texto">
                    <i class="fas fa-eraser"></i>    
                </button>
            </div>

            <textarea name="content" id="content" class="form-control mb-3" cols="30" rows="10" placeholder="Texto da postagem" required>{{$post->content ?? ''}}</textarea>
            <input name="" id="" class="form-control mb-3" type="file" disabled>

            

            <input class="btn btn-primary mb-3" type="submit" value="@if(isset($post)) Salvar alterações @else Cadastrar @endif">
        </form>
    </div>
@endsection