<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    {{ __('button.updateH') }}
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/history/{!! $history->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.updateH') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="alav" class="col-form-label">Alav</label>
                    <input type="text" name="alav" class="form-control" required value="{!! $history->alav !!}">
                </div>

                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" name="title" class="form-control" required value="{!! $history->title !!}">
                </div>

                <div class="form-group">
                    <label for="title" class="col-form-label">Istorija</label>
                    <textarea name="istorija" class="form-control" required>{!! $history->istorija !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="title" class="col-form-label">History</label>
                    <textarea name="history" class="form-control" required>{!! $history->history !!}</textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.updateH') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'istorija' );
    CKEDITOR.replace( 'history' );
</script>