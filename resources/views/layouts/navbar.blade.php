<header id="header" class="p-3 @if(Auth::user()->hasRole('auditor')) bg-dark @elseif(Auth::user()->hasRole('auditee'))
    bg-primary @else bg-danger @endif text-dark shadow">
    @include('sweetalert::alert')

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
            <a class="d-flex align-items-center mb-lg-0 text-dark text-decoration-none">
                <img src="{{url('/img/unipma.png')}}" width="50" height="50" role="img">
            </a>

            <p class="col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 ms-3">Sistem Penjaminan Mutu Internal
                <br> UNIVERSITAS PGRI MADIUN </p>

            @guest

            @else

                <div class="text-end">
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle text-capitalize" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                                 class="bi bi-person-circle me-1" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                      d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @if (Auth::user()->hasRole('admin'))
                                <li>
                                    <a class="dropdown-item unstyled" href="{{ route('admin.dashboard') }}">{{ __('Beranda') }}</a>
                                </li>
                            @elseif (Auth::user()->hasRole('auditee'))
                                <li>
                                    <a class="dropdown-item unstyled" href="{{ route('auditee.dashboard') }}">{{ __('Beranda') }}</a>
                                    <a class="dropdown-item unstyled" href="{{ route('auditee.profile') }}">{{ __('Profile') }}</a>
                                </li>
                            @elseif (Auth::user()->hasRole('auditor'))
                                <li>
                                    <a class="dropdown-item unstyled" href="{{ route('auditor.dashboard') }}">{{ __('Beranda') }}</a>
                                    <a class="dropdown-item unstyled" href="{{ route('auditor.profile') }}">{{ __('Profile') }}</a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item unstyled" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            </li>
                        </ul>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>
</header>
