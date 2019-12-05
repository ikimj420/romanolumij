<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Friend
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/friend/{!! $friend->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Update Friend</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="alav" class="col-form-label">Alav</label>
                    <input type="text" name="alav" class="form-control" required value="{!! $friend->alav !!}">
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="{!! $friend->title !!}">
                </div>
                <div class="form-group">
                    <label for="url" class="col-form-label">URL Site</label>
                    <input type="text" name="url" class="form-control" value="{!! $friend->url !!}">
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image</label>
                    <input type="file" name="pics" class="form-control">
                    @if(!empty($friend->pics))
                        <div class="image-wrap">
                            <img src="{!! $friend->friendPics() !!}" alt="{!! $friend->title !!}" class="rounded img-fluid image image-2 image-full" style="width: 15%;">
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
