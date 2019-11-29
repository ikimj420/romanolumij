<form action="/poem/{!! $poem->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">{{ __('button.deleteP') }}</button>
</form>
