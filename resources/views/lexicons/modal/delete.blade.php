<form action="/lexicon/{!! $lexicon->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Word</button>
</form>
