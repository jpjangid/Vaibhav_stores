@extends ('layouts.backend')
<style>
    fieldset {
    min-width: 0;
    padding: 10 !important;
    margin: 0;
    border: 1px solid #e2e5ec !important;
}
legend {
    width: auto !important;
}
</style>
@section ('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Update Sub Category
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('sub-categories.update',$subCategory->id) }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" placeholder="Sub Category Name" class="form-control @error('name') is-invalid @enderror" value="{{ $subCategory->name }}" required  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Category *</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                            <option value="">---Select---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ( $subCategory->category_id == $category->id ) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <fieldset>
                        <legend>SEO</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">Slug *</label>
                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ ($subCategory->slug)? $subCategory->slug : old('slug') }}">
                                    <span class="form-text text-muted">Not enter space inside slug.</span>
                                    @error('slug')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta-title">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ ($subCategory->meta_title)? $subCategory->meta_title : old('meta_title') }}">
                                    @error('meta_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control resize-none  @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" >{{ ($subCategory->meta_description)?$subCategory->meta_description : old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta-title">Meta Keyword</label>
                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{ ($subCategory->meta_keyword)? $subCategory->meta_keyword : old('meta_keyword') }}">
                                    @error('meta_keyword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label for="sequence">Sequence *</label>
                        <input type="text" id="sequence" name="sequence" placeholder="Sub Category Sequence" class="form-control @error('sequence') is-invalid @enderror" value="{{ $subCategory->sequence }}" required >

                        @error('sequence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description *</label>
                        <textarea placeholder="Short Description" required class="form-control resize-none  @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3" >{{ $subCategory->short_description }}</textarea>
                        @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row @error('image_add') is-invalid @enderror">
                            <label class="col-xl-3 col-lg-3 col-form-label">Image</label>
                            <div class="col-lg-9 col-xl-6">
                                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                    <div class="kt-avatar__holder" style="background-image: url('{{ asset('storage/subcategory/'.$subCategory->image) }}')"></div>
                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                        <i class="fa fa-pen"></i>
                                        <input type="file" name="image_add" onchange="imageSizeValidation(this)" accept="png, jpg, jpeg">
                                    </label>
                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                                <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>

                            </div>
                        </div>
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

<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/file-upload/ktavatar.js" type="text/javascript"></script>

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
