<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
    {{ __('button.addP') }}
</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="{{ action('PoemsController@store') }}" id="add" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.addP') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_id" class="col-form-label">Category</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alav" class="col-form-label">Alav</label>
                    <input type="text" name="alav" class="form-control" required autocomplete="alav" autofocus>
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" name="title" class="form-control" required autocomplete="title" autofocus>
                </div>
                <div class="form-group">
                    <label for="autori" class="col-form-label">Hramisarda Autori</label>
                    <input type="text" name="autori" class="form-control" required autocomplete="autori" autofocus>
                </div>
                <div class="form-group">
                    <label for="author" class="col-form-label">Author</label>
                    <input type="text" name="author" class="form-control" required autocomplete="author" autofocus>
                </div>
                <div class="form-group">
                    <label for="djili" class="col-form-label">Djili</label>
                    <textarea class="form-control" name="djili" required autocomplete="djili" autofocus></textarea>
                </div>
                <div class="form-group">
                    <label for="poem" class="col-form-label">Poem</label>
                    <textarea name="poem" class="form-control" required autocomplete="poem" autofocus></textarea>
                </div>
                <div class="form-group">
                    <label for="varnanipe" class="col-form-label">Varnanipe</label>
                    <textarea name="varnanipe" class="form-control" required autocomplete="varnanipe" autofocus></textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea id="description" name="description" class="form-control" required autocomplete="description" autofocus></textarea>
                </div>
                <div class="form-group">
                    <label for="poem_tag" class="col-form-label">Tags</label>
                    <input type="text" placeholder="After Each Tag Comma Is Required" name="poem_tag" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image-Pinta</label>
                    <input type="file" name="pics" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.addP') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'djili' );
    CKEDITOR.replace( 'poem' );
    CKEDITOR.replace( 'varnanipe' );
    CKEDITOR.replace( 'description' );
</script>