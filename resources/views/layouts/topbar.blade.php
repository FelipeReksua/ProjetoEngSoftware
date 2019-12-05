<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5 row" id="topbar">

	<div class="col-md-3">
	    <a class="navbar-brand" href="/">
	      <img class="logo" src="{{ asset('/images/logo.png') }}">
	    </a>
	</div>


    <div class="col-md-7">
  		<h4 class="text-20">{{ $page }}</h4>
	</div>

    <div class="col-md-2 text-right">
    	<ul class="navbar-nav ml-auto text">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="{{ route('register') }}">
                            Adicionar
                        </a>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>