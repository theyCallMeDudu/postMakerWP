@extends('layouts.app')

@section('content')
    <h1 class="text-center">Postagens</h1>
    <hr class="hr-color">

    <div class="col-8 m-auto">

        <div>

            <span class="text-left">Total de postagens: <strong>{{$quantity}}</strong></span>

            <a class="text-right" style="float: right !important;" href="{{url("posts/create")}}">
                <button class="btn btn-success mb-3">Nova postagem</button>
            </a>
            
        </div>

        <table class="table table-dark text-center">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Registro</th>
                <th scope="col">Título</th>
                <th scope="col">Criado em</th>
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
                    <a href="#" target="_blank" title="Visualizar">
                        <button class="btn btn-danger">
                            <i class="fas fa-external-link-square-alt"></i>
                        </button>
                    </a>

                    <a href="{{url("posts/$posts->id/edit")}}" title="Editar">
                        <button class="btn btn-primary">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>

                    <button type="button" class="btn btn-success" data-toggle="modal" title="Publicar" data-target="#modalPublicacao<?php echo $posts->id ?>">
                        <i class="fas fa-paper-plane"></i>
                    </button>

                    <!-- Inicio Modal publicação -->
                    <div class="modal fade" data-backdrop="static" id="modalPublicacao<?php echo $posts->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-left" id="exampleModalLabel" style="color: #000 !important;">Publicação de postagem</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                    
                                <div class="modal-body text-center text-dark">
                                    <p><strong>Deseja realmente publicar?</strong></p>
                                        
                                    <div class="text-left">
                                        <label for="">Título</label>
                                        <input type="text" class="form-control mb-1" value="{{$posts->title}}" disabled="disabled">

                                        <label for="">Conteúdo</label>
                                        <textarea class="form-control mb-1" name="" id="" cols="30" rows="10" disabled="disabled">{{$posts->content}}</textarea> 

                                        <label for="">Imagem</label>
                                        <div class="card mb-1">
                                        @if(isset($posts->relPhotos->image))
                                            <img src="{{asset('storage/' . $posts->relPhotos->image)}}" alt="" class="img-fluid">
                                        @endif
                                        </div>

                                            <label style="display: block !important;">Publicar em:</label>
                                            <input style="width: 36% !important; display: inline-block !important;" type="date" class="form-control m-auto" name="post_date" id="post_date" value="{{$posts->post_date ?? ''}}" disabled="disabled">
                                            <input style="width: 25% !important; display: inline-block !important;" type="time" class="form-control m-auto" name="post_time" id="post_time" value="{{$posts->post_time ?? ''}}" disabled="disabled">
                                    </div>

                                </div>
                                    
                                <div class="modal-footer text-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>

                                    <!-- Botão confirmação de publicação -->
                                        <a href="{{url("posts/publish/$posts->id")}}">
                                            <button type="submit" class="btn btn-danger">Sim</button>
                                        </a>
                                    <!-- Fim Botão confirmação de publicação -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal publicação -->

                </td>
            </tr>
            @endforeach
 
            </tbody>
        </table>

        {{$post->links()}}

    </div>
@endsection