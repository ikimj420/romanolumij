<form action="/history/{!! $history->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete History</button>
</form>
