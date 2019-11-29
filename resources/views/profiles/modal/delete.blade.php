<form action="/profile/{!! $user->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">{{ __('button.deleteU') }}</button>
</form>
