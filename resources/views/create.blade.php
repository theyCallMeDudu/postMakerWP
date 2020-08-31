@extends('layouts.app')

@section('content')
    <h1 class="text-center">Nova postagem</h1>
    <hr class="hr-color">

    <div class="col-8 m-auto">

    @if(isset($errors) && count($errors) > 0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach($errors as $erro)
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
        <form name="formCad" id="formCad" method="post" action="{{url('posts')}}">
            @csrf
            <select name="id_user" id="id_user" class="form-control mb-3">
                <option value="">Autor</option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <input name="title" id="title" class="form-control mb-3" type="text" placeholder="Título" required>
            
            <div>
                
                <div class="mb-1">
                    <button type="button" class="btnClearText btn btn-light" data-toggle="tooltip" title="Limpar texto">
                        <i class="fas fa-eraser"></i>    
                    </button>
                </div>
                
                <textarea name="content" id="content" class="form-control mb-3" cols="30" rows="10" placeholder="Texto da postagem." required></textarea>
            </div>

            <input name="" id="" class="form-control mb-3" type="file" disabled>

            

            <input class="btn btn-primary mb-3" type="submit" value="Cadastrar">
        </form>
    </div>
@endsection