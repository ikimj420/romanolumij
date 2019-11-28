<form action="/poem/{!! $poem->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Poem</button>
</form>
