<script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>

<!-- Libs JS -->
<script src="{{ asset('assets/libs/list.js/dist/list.min.js')}}?1668287865" ></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}?1668287865" ></script>

<!-- Alpine Plugins -->
{{-- <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script> --}}
<!-- Alpine Core -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Tabler Core -->
<script src="{{ asset('assets/dist/js/tabler.min.js')}}?1668287865" ></script>
{{-- <script src="{{ asset('assets/dist/js/demo.min.js')}}?1668287865" ></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<!-- Include jQuery (or your preferred JavaScript library) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>

<!-- Livewire Chart -->
@livewireChartsScripts

<script>
    Livewire.hook('request', ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault()

                confirm('La page à expiré. Veuillez la recharger.')
            }
        })
    })
</script>

<script>
    function checkStatus(checkbox) {
        if (checkbox.checked) {
            checkbox.style.backgroundColor = '#0E6163'; // Color when checked
        } else {
            checkbox.style.backgroundColor = '#FFFFFF'; // Default color
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
      var dropdown = document.getElementById('dropdownMenuButton');
      var dropdownMenu = document.querySelector('.dropdown-menu');

      // Prevent closing on click inside
      dropdownMenu.addEventListener('click', function (e) {
        e.stopPropagation();
      });
    });
</script>

@bukScripts(true)

@notifyJs

{{-- @include('sweetalert::alert') --}}

@yield('third_party_scripts')

<!-- Alpine Js -->

@stack('page_scripts')

@yield('scripts')
