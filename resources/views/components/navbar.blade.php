  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (Auth::check())
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('allProjects')}}">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{route('myProjects')}}">Meus Projetos</a></li>
              <li><a class="dropdown-item" href="{{route('newCommission')}}">Cadastrar Comissão</a></li>
              <li><a class="dropdown-item" href="{{route('newCouncilor')}}">Cadastrar Vereador</a></li>
            </ul>
          </li>
          @else
          <a class="nav-item nav-link disabled text-dark" href="#">Câmara Municipal</a>
          @endif
        </ul>
        <form class="d-flex">
          @if (Auth::check())
          <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Sair</a>
          @else
            <a href="{{route('login')}}"><i class="fas fa-user-tie"></i> Área de Login</a>
          @endif
        </form>
      </div>
    </div>
  </nav>