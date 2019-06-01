<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
    </div>
    <ul class="nav navbar-nav">

      <li class="{{ Request::is('calendar') ? 'active' : '' }}" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Calendar<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Today</a></li>
          <li><a href="#">This Week</a></li>
          <li><a href="#">Scholastic Year 2019-20</a></li>
        </ul>
      </li>

      <li class="{{ Request::is('students') ? 'active' : '' }}">
        <a href="{{ route('students.index') }}">Students</a>
      </li>

      <li class="{{ Request::is('groups') ? 'active' : '' }}">
        <a href="{{ route('groups.index') }}">Groups</a>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
      @else
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endif
    </ul>
  </div>
</nav>
