<form action="/image/{!! $image->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">{{ __('button.deleteI') }}</button>
</form>
