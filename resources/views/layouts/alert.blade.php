@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <dvi class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>X</span>
            </button>
            <p>{{$message}}</p>
        </dvi>
    </div>
@endif
