<form action="/role/{!! $role->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete User Level</button>
</form>
