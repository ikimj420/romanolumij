<form action="/story/{!! $story->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Story</button>
</form>
