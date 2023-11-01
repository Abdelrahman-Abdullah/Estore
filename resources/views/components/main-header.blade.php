<div class="header">
    <div class="container-fluid">
        @if(session('notify'))
            <x-success-message/>
        @endif
        <div class="row">
            <x-main-header-categories :categories="$categories"/>
            <x-main-header-slider />
            <x-main-header-show-column />
        </div>
    </div>
</div>
