<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Maker WordPress</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
    <script src="https://kit.fontawesome.com/bfa2a2c56b.js" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-1">
        <a class="navbar-brand" href="{{url("/posts")}}">
            <img src="assets/img/unirio-logo.png" width="40" height="40" alt="" loading="lazy">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @auth
            <ul class="navbar-nav mr-auto">

                <li class="nav-item @if(request()->is('posts')) active @endif">
                    <a class="nav-link" href="{{url("/posts")}}">Minhas Postagens<span class="sr-only">(current)</span></a>
                </li>
            
            </ul>

            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit()">Sair</a>
                        <form action="{{route('logout')}}" class="logout" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                    <li class="nav-item">
                        <span class="nav-link">{{auth()->user()->name}}</span>
                    </li>

                    <!-- <li class="nav-item @if(request()->is('posts')) 'style: display:none;' @endif">
                        <a class="nav-link" href="{{url("/posts")}}">Registre-se</a>
                    </li> -->
                </ul>
            </div>
            @endauth

        </div>
    </nav>

    @yield('content')
    <script src="{{url('assets/bootstrap/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('assets/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
</body>
</html>