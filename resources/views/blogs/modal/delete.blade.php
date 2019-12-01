<form action="/blog/{!! $blog->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Blog</button>
</form>
