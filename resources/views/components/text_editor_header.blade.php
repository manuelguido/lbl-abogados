<!-- include libraries(jQuery, bootstrap) -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js-->
<link href="{{ asset('summernote/summernote-lite.min.css') }}" rel="stylesheet">
<link href="{{ asset('summernote/summernote-lite.min.css') }}" rel="stylesheet">
<script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>

<style>
    .note-toolbar .btn-default {
        background: #ccc !important;
        box-shadow: none !important;
        border: 1px solid #aaa !important;
    }
    .note-fontname, .note-view, .note-group-image-url {
        display: none !important;
    }
    .note-editable {
        min-height: 200px !important;
    }
    .note-modal-footer {
        padding: 0px 0 100px 0;
        background: 0 none;
        z-index: 10 !important;
    }
    .note-editable, .note-editable *, #summernote, #summernote * {
        font-family: 'Raleway', sans-serif !important;
    }
</style>
