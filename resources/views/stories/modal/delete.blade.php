<form action="/story/{!! $story->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">{{ __('button.deleteS') }}</button>
</form>
