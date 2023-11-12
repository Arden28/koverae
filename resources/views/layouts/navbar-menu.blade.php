<div class="navbar-expand-md d-print-none">
    <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
        <div class="container-xl">
          <ul class="navbar-nav">

            <li class="nav-item" data-turbolinks>
                <a class="btn" style="margin-right: 5px;" href="" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <img class="custom-image" src="{{ asset('assets/images/apps/settings.png') }}" alt="">
                  </span>
                  <span class="nav-link-title">
                      {{ __('Paramètres') }}
                  </span>
                </a>
            </li>


          </ul>
          {{-- Search --}}
          <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="./" method="get" autocomplete="off" novalidate>
              <div class="input-icon">
                <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                </span>
                <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
