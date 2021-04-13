<div id="sidebar-nav" class="sidebar">
  <div class="sidebar-scroll">
    <nav>
      <ul class="nav">
        <li><a href="{{ url('/dashboard') }}" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
        @if (auth()->user()->role == 'admin')
          <li><a href="{{ url('/siswa') }}" class=""><i class="lnr lnr-user"></i> <span>Data Siswa</span></a></li>
          <li><a href="{{ url('/posts') }}" class=""><i class="lnr lnr-user"></i> <span>Post</span></a></li>
        @endif
      </ul>
    </nav>
  </div>
</div>