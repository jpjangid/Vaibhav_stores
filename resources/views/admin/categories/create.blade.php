@extends ('layouts.backend')

@section ('content')

<div class="row">
    <div class="col-md-6">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Add New Category
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" placeholder="Category Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required  autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug *</label>
                        <input type="text" id="slug" name="slug" placeholder="Category Slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required >
                        <span class="form-text text-muted">Not enter space inside slug.</span>
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sequence">Sequence *</label>
                        <input type="text" id="sequence" name="sequence" placeholder="Category Sequence" class="form-control @error('sequence') is-invalid @enderror" value="{{ old('sequence') }}" required >

                        @error('sequence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="category-image">Category Image *</label>
                        <input type="file" name="image_add" accept="png, jpg, jpeg" onchange="imageSizeValidation(this)"  class="form-control @error('image_add') is-invalid @enderror" required="required">
                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>

                        @error('image_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="banner-image-mobile">Banner Image Mobile *</label>
                        <input type="file" name="banner_image_mobile_add" accept="png, jpg, jpeg" onchange="imageSizeValidation(this)"  class="form-control @error('banner_image_mobile_add') is-invalid @enderror" required="required">
                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>

                        @error('banner_image_mobile_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="banner-image-desktop">Banner Image Desktop *</label>
                        <input type="file" name="banner_image_desktop_add" accept="png, jpg, jpeg" onchange="imageSizeValidation(this)"  class="form-control @error('banner_image_desktop_add') is-invalid @enderror" required="required">
                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>

                        @error('banner_image_desktop_add')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sequence">Template Type *</label><br><br>
                        <input name="template_type" id="template_type"  data-switch="true" type="checkbox" data-handle-width="70" data-on-text="List" data-off-text="Grid" data-on-color="brand" checked="checked">
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('categories.index') }}">Cancel</a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection
@section ('footer-script')
<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
@endsection


