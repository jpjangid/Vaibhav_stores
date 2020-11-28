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
    <div class="col-md-12">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Edit Blog
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('blogs.update',$Blog->id) }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="title">Blog Title *</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $Blog->title }}" required  autofocus style="font-size: 16px;">

                        @error('title')
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
                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ ($Blog->slug)? $Blog->slug : old('slug') }}">
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
                                    <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ ($Blog->meta_title)? $Blog->meta_title : old('meta_title') }}">
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
                                    <textarea class="form-control resize-none  @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" >{{ ($Blog->meta_description)?$Blog->meta_description : old('meta_description') }}</textarea>
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
                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{ ($Blog->meta_keyword)? $Blog->meta_keyword : old('meta_keyword') }}">
                                    @error('meta_keyword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>



                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <textarea class="form-control" id="excerpt" name="excerpt" rows="4">{{ $Blog->excerpt }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="row @error('f_image') is-invalid @enderror">
                                    <label class="col-xl-3 col-lg-3 col-form-label" for="f_image">Featured Image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                            <?php
                                            $showImg = url('/').'/img/no-image.png';
                                            if ($Blog->featured_image) $showImg = asset('storage/blog/'.$Blog->id.'/'.$Blog->featured_image);
                                            ?>
                                            <div class="kt-avatar__holder" style="background-image: url(<?php echo $showImg; ?>)"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="f_image" accept=".png, .jpg, .jpeg">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                                    </div>
                                </div>
                                @error('f_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <label for="content">Blog Content</label>
                            <textarea class="summernote" id="content" name="content">{{ $Blog->content }}</textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Blog Category</label>
                                @foreach ($BlogCategories as $BlogCategory)
                                <div class="kt-checkbox-list">
                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                        @if ($Blog->BlogCategories)
                                        <input
                                            type="checkbox" id="blog_category_ids" name="blog_category_ids[]"
                                            value="{{ $BlogCategory->id }}"
                                            {{ $Blog->BlogCategories->contains($BlogCategory->id) ? 'checked' : '' }}
                                        >
                                         {{ $BlogCategory->name }}
                                        <span></span>
                                        @endif
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12" for="status">Publish Status</label>
                        <div class="col-lg-9 col-md-10 col-sm-12">
                            <input name="status" id="status"  data-switch="true" type="checkbox" @if($Blog->status=="published") checked="checked" @endif data-on-text="Publish" data-handle-width="70" data-off-text="Draft" data-on-color="brand" >
                        </div>
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-secondary" href="{{ route('blogs.index') }}">Cancel</a>
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
    "use strict";
    var KTSummernoteDemo={
        init:function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".summernote").summernote({
                height:300,
                callbacks: {
                    onImageUpload: function(files) {
                        if (files.length == 1) {

                            if (files[0].size>2097152) {
                              alert("Try to upload file less than 2MB!");
                              return;
                            }

                            var fileName = files[0].name;
                            var idxDot = fileName.lastIndexOf(".") + 1;
                            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                            if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){}else{
                              alert("Only jpg/jpeg and png files are allowed!");
                              return;
                            }

                            var data = new FormData();
                            data.append("blogImg", files[0]);
                            data.append("blog_id", <?php echo $Blog->id; ?> );
                            $.ajax({
                                data: data,
                                type: "POST",
                                url: "{{ route('blogs.uploadImg') }}",
                                cache: false,
                                dataType: "json",
                                enctype: "multipart/form-data",
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        var imgNode = $("<img>").attr("src",data.url);
                                        $("#content").summernote("insertNode", imgNode[0]);
                                    } else {
                                        alert('Something went wrong.');
                                        return;
                                    }
                                }
                            });
                        } else {
                            alert('Please select single file.');
                            return;
                        }

                      // upload image to server and create imgNode...
                      // $summernote.summernote('insertNode', imgNode);
                    }
                  }
            })
        }
    };
    jQuery(document).ready(function(){KTSummernoteDemo.init()});
</script>
<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/file-upload/ktavatar.js" type="text/javascript"></script>
<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
@endsection
