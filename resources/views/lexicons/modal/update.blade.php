<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Word
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
        <form method="post" action="/lexicon/{!! $lexicon->id !!}" id="update" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="modal-header">
                <h5 class="modal-title" id="Title">Update Word</h5>
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
                            @isset($lexicon->category_id)
                                @if($category->id == $lexicon->category_id)<option value="{{ $category->id }} " selected >{!! $category->name !!}@continue</option>
                                @endif
                            @endisset
                            <option value="{{ $category->id }}">{!! $category->name !!}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rom" class="col-form-label">Romano Lafi</label>
                    <input type="text" name="rom" class="form-control" value="{!! $lexicon->rom !!}">
                </div>
                <div class="form-group">
                    <label for="ser" class="col-form-label">Srpska Reč</label>
                    <input type="text" name="ser" class="form-control" value="{!! $lexicon->ser !!}">
                </div>
                <div class="form-group">
                    <label for="eng" class="col-form-label">Word English</label>
                    <input type="text" name="eng" class="form-control" value="{!! $lexicon->eng !!}">
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
