<form action="/profile/{!! $user->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete User</button>
</form>
