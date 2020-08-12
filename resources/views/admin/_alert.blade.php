@if (session()->has('alert.success'))
<div class="alert alert-success">
  {{ session ('alert.success') }}
</div>
@endif

@if (session()->has('alert.error'))
<div class="alert alert-danger">
  {{ session ('alert.error') }}
</div>
@endif

 @if (session('succsess'))
<div class="alert alert-success" role="alert">
  {{ session ('succsess') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger" role="alert">
  {{ session ()->get('error') }}
</div>
@endif


