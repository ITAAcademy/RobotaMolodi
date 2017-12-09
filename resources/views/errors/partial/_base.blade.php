<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{trans('errors/apologize.message')}}</h4>
    </div>
    <div class="modal-body">
        <div class="error-content">
            @yield('notification')
            {{--@include('errors.partial._goto')--}}
        </div>
    </div>
</div>
