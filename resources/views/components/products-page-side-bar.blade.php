@props(['categories', 'products'])
<div class="col-lg-4 sidebar">
    <div class="sidebar-widget category">
        <h2 class="title">Category</h2>
        <x-main-header-categories class="col-md-6" :categories="$categories"/>
    </div>
    <div class="sidebar-widget widget-slider">
        <div class="sidebar-slider normal-slider">
            @foreach($products as $product)
                <x-one-product :name="$product->title" :img="$product->image" :price="$product->price" />
                @break($loop->iteration == 3)
            @endforeach
        </div>
    </div>

</div>
