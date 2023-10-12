@props(['name' , 'desc' , 'icon'])
<div class="col-lg-3 col-md-6 feature-col">
    <div class="feature-content">
        <i class="{{$icon}}"></i>
        <h2>
            {{$name}}
        </h2>
        <p>
            {{$desc}}
        </p>
    </div>
</div>
