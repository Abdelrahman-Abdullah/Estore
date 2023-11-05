<div class="alert alert-success mt-2"
     x-data="{show:true}"
     x-init="setTimeout(() => show = false, 2000)"
     x-show="show"
>
    {{ session('message') ?? session('success') }}
</div>
