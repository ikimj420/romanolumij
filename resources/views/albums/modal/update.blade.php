<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Album
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/album/{!! $album->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Update Album</h5>
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
                            @isset($album->category_id)
                                @if($category->id == $album->category_id)<option value="{{ $category->id }} " selected >{!! $category->name !!}@continue</option>
                                @endif
                            @endisset
                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">Album Name</label>
                    <input type="text" name="name" class="form-control" value="{!! $album->name !!}">
                </div>
                <div class="form-group">
                    <label for="desc" class="col-form-label">Description</label>
                    <textarea name="desc" class="form-control">{!! $album->desc !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image</label>
                    <input type="file" name="pics" class="form-control">
                    @if(!empty($album->pics))
                        <div class="image-wrap">
                            <img src="{!! asset('/storage/albums/'.$album->pics) !!}" alt="{!! $album->name !!}" class="img-raised rounded-circle thumbnail img-fluid image" style="width: 15%;">
                        </div>
                    @endif
                </div>
                <input type="hidden" name="user_id" value="{!! Auth::user()->id !!}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">Update <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
