<div class="d-flex flex-column flex-shrink-0 sidebar p-3 text-bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img src="{{ URL::asset('assets/images/icon.png') }}" id="icon-utama" alt="Image"/>
      <span class="fs-4 ms-4">Home</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ url('/dashboard') }}" class="nav-link text-white {{ (request()->is('dashboard')) ? 'active' : '' }}" aria-current="page">
          <i class="bi bi-house-door-fill me-2" style="font-size: 1rem; color: white;"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="{{ url('/votes') }}" class="nav-link text-white {{ (request()->is('votes*')) ? 'active' : '' }}">
          <i class="bi bi-flag-fill me-2" style="font-size: 1rem; color: white;"></i>
          Pemilihan
        </a>
      </li>
      <li>
        <a href="{{ url('/candidates') }}" class="nav-link text-white {{ (request()->is('candidates*')) ? 'active' : '' }}">
          <i class="bi bi-person-fill me-2" style="font-size: 1rem; color: white;"></i>
          Calon
        </a>
      </li>
      <li>
        <a href="{{ url('/users') }}" class="nav-link text-white {{ (request()->is('user*')) ? 'active' : '' }}">
          <i class="bi bi-person-vcard-fill me-2" style="font-size: 1rem; color: white;"></i>
          Kartu Keluarga
        </a>
      </li>
      <li>
        <a href="{{ url('/voterData') }}" class="nav-link text-white {{ (request()->is('voterData*')) ? 'active' : '' }}">
          <i class="bi bi-check-circle-fill me-2" style="font-size: 1rem; color: white;"></i>
          Status
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
