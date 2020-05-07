@if(Session::has('success'))
<!-- Alerta -->
<div id="alert-success" class="alert-fixed shadow p-0">
    <div class="alert card card-success-bottom alert-dismissible fade show m-0" role="alert">
        <strong class="w400 black3"><i class="fas fa-check-circle mr-3 success fa-lg"></i>{!! Session::get('success') !!}</strong>
        <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if(Session::has('warning'))
<div id="alert-warning" class="alert-fixed shadow p-0">
    <div class="alert card card-warning-bottom alert-dismissible fade show m-0" role="alert">
        <strong class="w400 black3"><i class="fas fa-exclamation-circle mr-3 warning fa-lg"></i>{{ Session::get('warning') }}</strong>
        <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

@if(Session::has('error'))
<div id="alert-danger" class="alert-fixed shadow p-0">
    <div class="alert card card-danger-bottom alert-dismissible fade show m-0" role="alert">
        <strong class="w400 black3"><i class="fas fa-exclamation-circle mr-3 danger fa-lg"></i>{{ Session::get('error') }}</strong>
        <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif

<script>
    $(".alert-fixed").fadeTo(3100, 500).slideUp(500, function(){
        $(".alert-fixed").slideUp(500);
    });
</script>