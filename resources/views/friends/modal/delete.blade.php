<form action="/friend/{!! $friend->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Friend</button>
</form>
