<!-- Navbar -->

<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item px-2">
                    <a href="{{ route('dashboard') }}" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('contacts.index') }}" class="nav-link active">Contacts</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i> Welcome {{ Auth::user()->toArray()['fname'] }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('address', ['id' => Auth::user()->id]) }}" class="dropdown-item">
                            <i class="fas fa-user-circle"></i>
                            My address
                        </a>
                        <a href="{{ url('user_infos') }}/{{ Auth::user()->id }}" class="dropdown-item">
                            <i class="fas fa-cog"></i> My Informations
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link"><i class="fas fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
