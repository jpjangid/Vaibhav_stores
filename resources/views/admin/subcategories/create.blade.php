@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add New Sub Category
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('sub-categories.store') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" placeholder="Sub Category Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Category *</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">---Select Category---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug *</label>
                        <input type="text" id="slug" name="slug" placeholder="Sub Category Slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required >
                        <span class="form-text text-muted">Not enter space inside slug.</span>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sequence">Sequence *</label>
                        <input type="text" id="sequence" name="sequence" placeholder="Sub Category Sequence" class="form-control @error('sequence') is-invalid @enderror" value="{{ old('sequence') }}" required >

                        @error('sequence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description *</label>
                        <textarea placeholder="Short Description" required class="form-control resize-none  @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3" >{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sequence">Category Image *</label>
                        <input type="file" name="image_add" onchange="imageSizeValidation(this)" accept="png, jpg, jpeg"  class="form-control @error('image_add') is-invalid @enderror" required="required">
                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                        @error('image_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('sub-categories.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection

@section ('footer-script')

<script type="text/javascript">
    var KTFormWidgets = function() {
    var e;
    return {
        init: function() {
            ! function() {
                $("#category_id").select2({
                    placeholder: "Select a category"
                }), $("#category_id").on("select2:change", function() {
                    e.element($(this))
                });
            }()
        }
    }
}();
jQuery(document).ready(function() {
    KTFormWidgets.init()
});
</script>

@endsection
