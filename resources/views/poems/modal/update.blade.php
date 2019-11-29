<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    {{ __('button.updateP') }}
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/poem/{!! $poem->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">{{ __('button.updateP') }}</h5>
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
                            @isset($poem->category_id)
                                @if($category->id == $poem->category_id)<option value="{{ $category->id }} " selected >{!! $category->name !!}@continue</option>
                                @endif
                            @endisset
                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="alav" class="col-form-label">Alav</label>
                    <input type="text" name="alav" class="form-control" value="{!! $poem->alav !!}">
                </div>
                <div class="form-group">
                    <label for="title" class="col-form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{!! $poem->title !!}">
                </div>
                <div class="form-group">
                    <label for="autori" class="col-form-label">Hramisarda Autori</label>
                    <input type="text" name="autori" class="form-control" value="{!! $poem->autori !!}">
                </div>
                <div class="form-group">
                    <label for="author" class="col-form-label">Author</label>
                    <input type="text" name="author" class="form-control" value="{!! $poem->author !!}">
                </div>
                <div class="form-group">
                    <label for="djili" class="col-form-label">Djili</label>
                    <textarea name="djili" class="form-control">{!! $poem->djili !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="poem" class="col-form-label">Poem</label>
                    <textarea name="poem" class="form-control">{!! $poem->poem !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="varnanipe" class="col-form-label">Varnanipe</label>
                    <textarea name="varnanipe" class="form-control">{!! $poem->varnanipe !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea name="description" class="form-control">{!! $poem->description !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="poem_tag" class="col-form-label">Tags</label>
                    <input type="text" placeholder="{!! $poem->tagList !!}" name="poem_tag" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pics" class="col-form-label">Image-Pinta</label>
                    <input type="file" name="pics" class="form-control">
                    @if(!empty($poem->pics))
                        <div class="image-wrap">
                            <img src="{!! asset('/storage/poems/'.$poem->pics) !!}" alt="{!! $poem->title !!}" class="img-raised rounded-circle thumbnail img-fluid image" style="width: 15%;">
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('button.close') }} <i class="ion-ios-close"></i></button>
                <button type="submit" class="btn btn-success">{{ __('button.updateP') }} <i class="ion-ios-save"></i></button>
            </div>
        </form>
        </div>
    </div>
</div>
