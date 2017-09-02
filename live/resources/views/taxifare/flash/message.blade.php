@if(Session::has('message'))
    <div class="content_top" >
        <div  class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ session('message') }}  <!-- equivalent to Session::get('flash_message') -->
        </div>
    </div>
@endif