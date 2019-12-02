<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    {{ __('button.updateB') }}
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/blog/{!! $blog->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.updateB') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="{!! $blog->title !!}">
                </div>
                <div class="form-group">
                    <label for="body" class="col-form-label">Write Here</label>
                    <textarea name="body" class="form-control" required>{!! $blog->body !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="blog_tag" class="col-form-label">Tags</label>
                    <input type="text" value="{!! $blog->tagList !!}" name="blog_tag" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image</label>
                    <input type="file" name="pics" class="form-control">
                    @if(!empty($blog->pics))
                        <div class="image-wrap">
                            <img src="{!! asset('/storage/blogs/'.$blog->pics) !!}" alt="{!! $blog->name !!}" class="img-raised rounded-circle thumbnail img-fluid image" style="width: 15%;">
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.updateB') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'body' );
</script>