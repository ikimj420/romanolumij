<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
    {{ __('button.addB') }}
</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="{{ action('BlogsController@store') }}" id="add" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.addB') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title" class="col-form-label">{{ __('blog.title') }}</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="body" class="col-form-label">{{ __('blog.body') }}</label>
                    <textarea name="body" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="blog_tag" class="col-form-label">Tags</label>
                    <input type="text" placeholder="After Each Tag Comma Is Required" name="blog_tag" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">{{ __('blog.pics') }}</label>
                    <input type="file" name="pics" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.addB') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>
