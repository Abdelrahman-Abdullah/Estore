@props(['title' , 'class' => 'call-to-action'])
<div class="{{$class}}">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>{{$title}}</h1>
            </div>
            <div class="col-md-6">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
