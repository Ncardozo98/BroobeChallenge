<nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
  <a class="navbar-brand" href="#">
    <x-application-logo size="36" height="36" width="100"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('run.create') }}">Run Metric</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('run.index') }}">Metric History</a>
      </li>
    </ul>
  </div>
</nav>