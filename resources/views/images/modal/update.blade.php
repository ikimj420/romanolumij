<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    {{ __('button.updateI') }}
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/image/{!! $image->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.updateI') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Image Name</label>
                    <input type="text" name="name" class="form-control" required value="{!! $image->name !!}">
                </div>
                <div class="form-group">
                    <label for="desc" class="col-form-label">Description</label>
                    <input type="text" name="desc" class="form-control" required value="{!! $image->desc !!}">
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image-Pinta</label>
                    <input type="file" name="pics" class="form-control">
                    @if(!empty($image->pics))
                        <div class="image-wrap">
                            <img src="{!! $image->imagePics() !!}" alt="{!! $image->name !!}" class="rounded img-fluid image image-2 image-full" style="width: 15%;">
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.updateI') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
