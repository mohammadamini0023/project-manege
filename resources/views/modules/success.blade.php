@if(session()->has('success'))
    <div class="alert alert-success">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
            <i class="nc-icon nc-simple-remove"></i>
        </button>
        <span>
            {{ session()->get('success') }}
        </span>
    </div>
@endif
