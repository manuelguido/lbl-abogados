<!-- Alertas -->
<div id="alert-success" class="alert-fixed shadow-lg p-0">
    @if(Session::has('success'))
    <div class="alert card card-success-bottom alert-dismissible fade show m-0" role="alert">
            <strong class="black3"><i class="fas fa-check-circle mr-3 success fa-lg"></i>{!! Session::get('success') !!}</strong>
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<div id="alert-warning" class="alert-fixed shadow-lg p-0">
    @if(Session::has('warning'))
    <div class="alert card card-warning-bottom alert-dismissible fade show m-0" role="alert">
            <strong class="black3"><i class="fas fa-exclamation-circle mr-3 warning fa-lg"></i>{{ Session::get('warning') }}</strong>
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<div id="alert-danger" class="alert-fixed shadow-lg p-0">
    @if(Session::has('error'))
    <div class="alert card card-danger-bottom alert-dismissible fade show m-0" role="alert">
            <strong class="black3"><i class="fas fa-exclamation-circle mr-3 danger fa-lg"></i>{{ Session::get('error') }}</strong>
            <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
</div>
<!-- /.Alertas -->
