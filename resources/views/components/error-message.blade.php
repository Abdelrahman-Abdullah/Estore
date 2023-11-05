<p class="alert alert-danger mt-4"
     x-data="{show:true}"
     x-init="setTimeout(() => show = false, 3000)"
     x-show="show"
>
    {{session('message') ?? session('error')}}
</p>
