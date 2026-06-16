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
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>frontend</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li>

          <li class="nav-item">
              <a class="nav-link {{ Route::is('booking.*') ? '' : 'collapsed' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-journal-text"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="forms-nav" class="nav-content collapse {{ Route::is('booking.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('booking.index') }}" class="{{ Route::is('booking.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>All Booking</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('booking.create') }}" class="{{ Route::is('booking.create') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Create Booking</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Booking Nav -->

          <li class="nav-item">
              <a class="nav-link {{ Route::is('product.*') || Route::is('product-image.*') ? '' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                  <i class="bi bi-layout-text-window-reverse"></i><span>Produk</span><i
                      class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="tables-nav" class="nav-content collapse {{ Route::is('product.*') || Route::is('product-image.*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('product.index') }}" class="{{ Route::is('product.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>All Produk</span>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('product-image.index') }}" class="{{ Route::is('product-image.index') ? 'active' : '' }}">
                          <i class="bi bi-circle"></i><span>Product Image</span>
                      </a>
                  </li>
              </ul>
          </li><!-- End Tables Nav -->

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
              <a class="nav-link {{ Route::is('kategori.*') ? '' : 'collapsed' }}"
                  href="{{ route('kategori.index') }}">
                  <i class="bi bi-bookmark"></i>
                  <span>Kategori Produk</span>
              </a>
          </li>
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
              <a class="nav-link collapsed" href="{{ route('user.index') }}">
                  <i class="bi bi-person"></i>
                  <span>Users</span>
              </a>
          </li>

      </ul>

  </aside>
