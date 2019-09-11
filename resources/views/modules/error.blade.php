@if(count($errors) > 0)
    <div class="alert alert-warning">
        <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
            <i class="nc-icon nc-simple-remove"></i>
        </button>
        <span>
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </span>
    </div>
@endif
