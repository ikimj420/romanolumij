<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
    {{ __('button.addC') }}
</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{ action('ContactsController@store') }}" id="add" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">{{ __('button.addC') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="subject" class="col-form-label">{{ __('contact.sub') }}</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
{{--                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('contact.name') }}</label>
                        <input type="text" name="name" class="form-control" required value="{!! \Illuminate\Support\Facades\Auth::user()->name !!}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('contact.email') }}</label>
                        <input type="email" name="email" class="form-control" required value="{!! \Illuminate\Support\Facades\Auth::user()->email !!}">
                    </div>--}}
                    <div class="form-group">
                        <label for="message" class="col-form-label">{{ __('contact.mess') }}</label>
                        <textarea name="message" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-form-label">Captcha</label>
                        <div>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('button.close')}} <i class="ion-ios-close"></i></button>
                    <button type="submit" class="btn btn-success">{{__('button.sendC')}} <i class="ion-ios-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'message' );
</script>
