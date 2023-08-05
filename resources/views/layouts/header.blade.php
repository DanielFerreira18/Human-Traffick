<nav class="navbar navbar-expand-lg navbar-dark bg-dark-grad">
    <a class="navbar-brand" href="/" style="cursor:pointer"><img src="/mat/Logotipo.png" style="height:70px;"></a>
    <button class="navbar-toggler" type="button" onclick="toggleList()">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="/perfil">Conta Pessoal</a>
                </li>
                @if(auth()->user()->idUserType <= 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/reportAdmin">Gestão de Ocorrencias</a>
                    </li>
                    @if(auth()->user()->idUserType == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/userAdmin">Administração de Utilizador</a>
                        </li>
                    @endif
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/settings">Definições</a>
                </li>
            @endauth
        </ul>
        @guest
            <form id="signin-form" action="{{ route('login') }}" method="GET" style="">
                @csrf
                <button type="submit" style="display: inline-flex;" class="btn btn-secondary">Entrar</button>
            </form>
        @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                @csrf
                <button type="submit" style="display: inline-flex;" class="btn btn-secondary">Sair</button>
            </form>
        @endguest
    </div>
</nav>
