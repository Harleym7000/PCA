<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <div class="navbar-brand pl-5">
                <a href="/"><img src="/img/pcaLogo.png"></a>
            </div>

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/events">Events</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/news">News</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/contact-us">Contact Us</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">{{ __('Login') }}</a>
                    </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="/register">{{ __('Register') }}</a>
                        </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('manage-users')
                            <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                             User Management
                         </a>
                         @endcan

                         @can('manage-events')
                            <a class="dropdown-item" href="/event/index">
                             Manage Events
                         </a>
                         @endcan

                         @can('manage-events')
                            <a class="dropdown-item" href="/events/create">
                             Add New Event
                         </a>
                         @endcan
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            

                         

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>