<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
    Add Album
</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="{{ action('AlbumsController@store') }}" id="add" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Add Album</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="category_id" class="col-form-label">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">Album Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="desc" class="col-form-label">Description</label>
                    <textarea name="desc" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Album Cover Image</label>
                    <input type="file" name="pics" class="form-control">
                </div>
                <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">Create <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
