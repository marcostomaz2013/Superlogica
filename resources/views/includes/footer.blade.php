<script src="{{ asset('js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/data-table.js') }}"></script>
<script src="{{ asset('js/owl-carousel.js') }}"></script>
<script src="{{ asset('js/tooltips.js') }}"></script>
<script src="{{ asset('js/tabs.js') }}"></script>
<script src="{{ asset('js/mask.js') }}"></script>
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('js/ui.datepicker-pt-BR.js')}}"></script>

@auth
    <!-- End custom js for this page-->
    <footer class="footer">
        <div class="w-100 clearfix">
            <span class=""><a href="{{route('tag', $tag)}}">{{ $tag }}</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Orgulhosamente desenvolvida por Marcos Paulo Barreto Silva</span>
        </div>
    </footer>
@endauth
