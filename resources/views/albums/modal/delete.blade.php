<form action="/album/{!! $album->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">{{ __('button.deleteA') }}</button>
</form>
