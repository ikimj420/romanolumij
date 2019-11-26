<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Update History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/history/{!! $history->id !!}" id="update" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="alav" class="col-form-label">Alav</label>
                        <input type="text" name="alav" class="form-control" value="{!! $history->alav !!}">
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{!! $history->title !!}">
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-form-label">Istorija</label>
                        <textarea name="istorija" class="form-control">{!! $history->istorija !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="title" class="col-form-label">History</label>
                        <textarea name="history" class="form-control">{!! $history->history !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="pics" class="col-form-label">Image</label>
                        <input type="file" name="pics" class="form-control">
                        @if(!empty($history))
                            <img src="/storage/history/thumbnail/{!! $history->pics !!}" alt="{!! $history->title !!}">
                        @endif
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">Update <i class="ion-ios-save"></i></button>
            </div>
        </div>
    </div>
</div>
