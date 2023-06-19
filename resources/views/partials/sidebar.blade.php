     <div class="sidebar h-100">
        <div class="logo-details">
            <div class="logo_name">PANTAU SAMPAH</div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
        <ul class="nav-list">
            {{-- <li>
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search..." />
                <span class="tooltip">Search</span>
            </li> --}}
            <li>
                <a href="/dashboard">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="data">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Riwayat Data</span>
                </a>
                <span class="tooltip">Riwayat Data</span>
            </li>
            
            @if (auth()->check() && auth()->user()->is_admin == 1)
            <li>
                <a href="pekerja">
                    <i class="bx bx-folder"></i>
                    <span class="links_name">Data Pekerja</span>
                </a>
                <span class="tooltip">Data Pekerja</span>
            </li>
            @endif
            
            {{-- <li>
                <a href="#">
                    <i class="bx bx-bell"></i>
                    <span class="links_name">Notifikasi</span>
                </a>
                <span class="tooltip">Notifikasi</span>
            </li> --}}
            <div class="position-absolute bottom-0 ">
                
                
                <li class="">
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link"><i class="bx bx-log-out"></i>
                            <span class="links_name">Logout</span></button>
                        <span class="tooltip">Logout</span>
                        {{-- <a href="/login" role="button" type="submit">
                            <i class="bx bx-log-out"></i>
                            <span class="links_name">Logout</span>
                        </a> --}}
                        <span class="tooltip">Logout</span>
                    </form>
                </li>
            </div>
            {{-- <li class="profile">
                <div class="profile-details">
                    <img src="img/syauqi_foto.png" class="rounded" alt="profileImg" />
                    <div class="name_job">
                        <div class="name">Syauqi Mubarak</div>
                        <div class="job">Admin</div>
                    </div>
                </div>
            </li> --}}
        </ul>
    </div>
