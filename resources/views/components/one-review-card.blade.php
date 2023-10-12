@props(['name' , 'profession' , 'img' , 'rate' , 'desc'])
<div class="col-md-6">
    <div class="review-slider-item">
        <div class="review-img">
            {{-- TODO::Change this to use the img prop--}}
            <img src="{{asset('img/review-1.jpg')}}" alt="Image">
        </div>
        <div class="review-text">
            <h2>{{$name}}</h2>
            <h3>{{$profession}}</h3>
            <div class="ratting">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <p>
                {{$desc}}
            </p>
        </div>
    </div>
</div>
