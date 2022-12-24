<nav class="navbar navbar-expand navbar-light bg-light px-5">
    {{-- title bar application logo --}}
    
{{-- if not admin then show below clietn menu --}}

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {{-- <li class="nav-item nav-link"  onclick="setMainTab('menulayout');">Home</li> --}}
            <div class="nav-item nav-link cursor-click" style="width:60px;" onclick="setMainTab('menulayout',true,'home');">
                <img src="{{asset('assets/imgs/light1.svg')}}" alt="Home" />
            </div>        
               
        </ul>
    </div>
    
     {{-- <!-- user Settings Dropdown  -->--}}
     <div class="">
       
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <div class="dropdown-item text-center" href="#">  
                <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{route('logout')}}" class="btn btn-danger"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('en.logout') }}
                </a>
            </form></div>
            </div>
          </div>
       
      


    </div>  
</nav>
