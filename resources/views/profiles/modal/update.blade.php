<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    {{ __('button.updateU') }}
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/profile/{!! $user->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.updateU') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">Name</label>
                    <input type="text" name="name" class="form-control" required value="{!! $user->name !!}">
                </div>
                <div class="form-group">
                    <label for="username" class="col-form-label">Username</label>
                    <input type="text" name="username" class="form-control" required value="{!! $user->username !!}">
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" name="email" class="form-control" required value="{!! $user->email !!}">
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-form-label">BirthDate</label>
                    <input type="date" name="birthDate" class="form-control" required value="{!! $user->birthDate !!}">
                </div>
                <div class="form-group">
                    <label for="site" class="col-form-label">Site</label>
                    <input type="text" name="site" class="form-control" required value="{!! $user->site !!}">
                </div>
                <div class="form-group">
                    <label for="phones" class="col-form-label">Phones</label>
                    <input type="text" name="phones" class="form-control" required value="{!! $user->phones !!}">
                </div>
                <div class="form-group">
                    <label for="street" class="col-form-label">Street</label>
                    <input type="text" name="street" class="form-control" required value="{!! $user->street !!}">
                </div>
                <div class="form-group">
                    <label for="city" class="col-form-label">City</label>
                    <input type="text" name="city" class="form-control" required value="{!! $user->city !!}">
                </div>
                <div class="form-group">
                    <label for="state" class="col-form-label">State</label>
                    <input type="text" name="state" class="form-control" required value="{!! $user->state !!}">
                </div>
                <div class="form-group">
                    <label for="bio" class="col-form-label">Biography</label>
                    <textarea name="bio" class="form-control" required>{!! $user->bio !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-form-label">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                    @if(!empty($user->avatar))
                        <div class="image-wrap">
                            <img src="{!! asset('/storage/users/'.$user->avatar) !!}" alt="{!! $user->name !!}" class="img-raised rounded-circle thumbnail img-fluid image" style="width: 15%;">
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.updateU') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'bio' );
</script>