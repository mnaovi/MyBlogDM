<!-- bootstarap navbar -->
     
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MyBlog</a>
        

        <div class="collapse navbar-collapse" id="<navbarSupportedContent></navbarSupportedContent>">
          <ul class="navbar-nav mr-auto col-lg-10 ">
            <li class=" nav-item {{Request::is('/') ? "active" : ""}}">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class=" nav-item {{Request::is('blog') ? "active" : ""}}">
              <a class="nav-link" href="{{ route('blog.index')}}">Blog</a>
            </li>
            <li class=" nav-item {{Request::is('about') ? "active" : ""}}">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class=" nav-item {{Request::is('contact') ? "active" : ""}}">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
           </ul>
           <ul class="navbar-nav ml-auto col-lg-2">
            <li class="nav-item dropdown ">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                
                        <!-- Authentication Links -->
                        @guest
                            
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            

                            @if (Route::has('register'))
                                
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            @endif
                            @else
                            
                                <a class="nav-link">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div>
                                  <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
                                </div>

                                <div>
                                  <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
                                </div>

                                <div>
                                  <a class="nav-link" href="{{route('tags.index')}}">Tags</a>
                                </div>

                                <div>
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            
                        @endguest
                    
              </div> 
            </li>
          </ul>
        </div>
      </nav>