<div {{$attributes->merge(['class' => "col-md-3"])}}>
    <nav class="navbar bg-light">
        <ul class="navbar-nav">
            {{--Start Category List Item--}}
                @foreach($categories as $category)
                    <x-main-header-category-list-item :name="$category->name" />
                @endforeach
            {{--End Category List Item--}}
        </ul>
    </nav>
</div>
