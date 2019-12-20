<form action="/contact/{!! $contact->id !!}" method="post">
    @csrf
    @method("patch")
    <button class="btn btn-success" type="submit">Mark As Read</button>
</form>
