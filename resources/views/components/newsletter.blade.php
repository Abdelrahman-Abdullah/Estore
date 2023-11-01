<x-action-container title="Subscribe Our Newsletter" class="newsletter">
    <form class="form" action="{{route('subscribe')}}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Your email here">
        <button type="submit">Submit</button>
    </form>
</x-action-container>
