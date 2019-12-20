<form action="/contact/{!! $contact->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">{{ __('Delete') }}</button>
</form>
