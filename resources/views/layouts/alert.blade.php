@if ($errors->all())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    {{ $error }}
</div>
    
@endforeach
    
@endif

@if (session()->has("success"))
<div class="alert alert-success alert-dismissible fade show" role="alert" >
    <strong>{{ session()->get("success") }}</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="close">
        <span>&times;</span>

    </button>
</div>
    
@endif

@if (session()->has("warning"))
<div class="alert alert-warning alert-dismissible fade show " role="alert">
    <strong>{{ session()->get("warning") }}</strong>
    <button class="close" type="button" data-dismiss="alert" ria-label="close">
        <span>&times;</span>

    </button>
</div>
    
@endif

@if (session()->has("info"))
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>{{ session()->get("info") }}</strong>
    <button class="close" type="button" data-dismiss="alert" ria-label="close">
        <span>&times;</span>

    </button>
</div>
    
@endif