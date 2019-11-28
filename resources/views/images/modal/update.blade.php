<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Image
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/image/{!! $image->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Update Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Image Name</label>
                    <input type="text" name="name" class="form-control" value="{!! $image->name !!}">
                </div>
                <div class="form-group">
                    <label for="desc" class="col-form-label">Description</label>
                    <textarea name="desc" class="form-control">{!! $image->desc !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image</label>
                    <input type="file" name="pics" class="form-control">
                    @if(!empty($image->pics))
                        <div class="image-wrap">
                            <img src="{!! asset('/storage/images/'.$image->pics) !!}" alt="{!! $image->name !!}" class="img-raised rounded-circle thumbnail img-fluid image" style="width: 15%;">
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">Update <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
