<!-- Modal -->
<div class="modal fade user-edit bs-example-modal-lg modal-print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                        @yield('popup-title')
                </h4>
            </div>
            <div class="modal-body">
                <div class="ajax-errors"></div>
                <img class="loader" src="{{ asset( 'dist/img/loader.gif' ) }}" alt="Loading">
            </div>
            {{--<div class="modal-footer">--}}
            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
{{----}}


<div class="prep" style="margin-bottom: 50px;">
    <div class="ajax-errors"></div>
    <img class="loader" src="{{ asset( 'dist/img/loader.gif' ) }}" alt="Loading">
</div>

<style>
    .modal-print{
        z-index: 999999999999999;
    }
</style>