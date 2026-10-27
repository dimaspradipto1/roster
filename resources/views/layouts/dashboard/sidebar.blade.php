  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
        <a class="nav-link {{ Route::is('feature.*') || Route::is('testimonial.*') || Route::is('faq.*') || Route::is('about.*') || Route::is('layanan.*') || Route::is('struktur-organisasi.*') || Route::is('partner.*') || Route::is('visimisi.*') || Route::is('nilaiperusahaan.*') ? '' : 'collapsed' }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Company Profile</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ Route::is('banner.*') || Route::is('feature.*') || Route::is('testimonial.*') || Route::is('faq.*') || Route::is('about.*') || Route::is('layanan.*') || Route::is('struktur-organisasi.*') || Route::is('partner.*') || Route::is('visimisi.*') || Route::is('nilaiperusahaan.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('banner.index') }}" class="{{ Route::is('banner.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Banner</span>
            </a>
          </li>
          <li>
            <a href="{{ route('faq.index') }}" class="{{ Route::is('faq.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>FAQ</span>
            </a>
          </li>
          <li>
            <a href="{{ route('testimonial.index') }}" class="{{ Route::is('testimonial.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Testimoni</span>
            </a>
          </li>
          <li>
            <a href="{{ route('about.index') }}" class="{{ Route::is('about.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>About</span>
            </a>
          </li>
          <li>
            <a href="{{ route('visimisi.index') }}" class="{{ Route::is('visimisi.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Visi & Misi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('nilaiperusahaan.index') }}" class="{{ Route::is('nilaiperusahaan.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Nilai Perusahaan</span>
            </a>
          </li>
          <li>
            <a href="{{ route('feature.index') }}" class="{{ Route::is('feature.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Keunggulan</span>
            </a>
          </li>
          <li>
            <a href="{{ route('layanan.index') }}" class="{{ Route::is('layanan.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Layanan</span>
            </a>
          </li>
          <li>
            <a href="{{ route('struktur-organisasi.index') }}" class="{{ Route::is('struktur-organisasi.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Struktur Organisasi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('partner.index') }}" class="{{ Route::is('partner.*') ? 'active' : '' }}">
              <i class="bi bi-circle"></i><span>Partner</span>
            </a>
          </li>
        </ul>
      </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('news.*') ? '' : 'collapsed' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-newspaper"></i><span>Post</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="charts-nav" class="nav-content collapse {{ Route::is('news.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('news.index') }}" class="{{ Route::is('news.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>All Post</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('news.create') }}" class="{{ Route::is('news.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Add Post</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Charts Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-image   "></i><span>Media</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('gallery.index') }}">
                          <i class="bi bi-circle"></i><span>library</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('gallery.create') }}">
                          <i class="bi bi-circle"></i><span>add media file</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-heading">Pages</li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('profil.*') ? '' : 'collapsed' }}" href="{{ route('profil.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Profile</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('contact.*') ? '' : 'collapsed' }}" href="{{ route('contact.index') }}">
                  <i class="bi bi-telephone"></i>
                  <span>Kontak</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('user.*') ? '' : 'collapsed' }}" href="{{ route('user.index') }}">
                  <i class="bi bi-people"></i>
                  <span>Users</span>
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('inspeksi.*') ? '' : 'collapsed' }}" href="{{ route('inspeksi.index') }}">
                  <i class="bi bi-clipboard-check"></i>
                  <span>Inspeksi</span>
              </a>
          </li>

      </ul>

  </aside>
