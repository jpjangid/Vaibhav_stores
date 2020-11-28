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
                        Edit Page
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('pages.update',$Page->id) }}" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="title">Page Title *</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $Page->title }}" required  autofocus style="font-size: 16px;">

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
                                    <label for="slug">URL *</label>
                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ ($Page->slug)? $Page->slug : old('slug') }}">
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
                                    <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ ($Page->meta_title)? $Page->meta_title : old('meta_title') }}">
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
                                    <textarea class="form-control resize-none  @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" >{{ ($Page->meta_description)?$Page->meta_description : old('meta_description') }}</textarea>
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
                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{ ($Page->meta_keyword)? $Page->meta_keyword : old('meta_keyword') }}">
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
                        <div class="col-md-12">
                            <label for="content">Page Content</label>
                            <textarea class="summernote" id="content" name="content">{{ $Page->content }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2 col-sm-12" for="status"><br>Publish Status</label>
                        <div class="col-lg-9 col-md-10 col-sm-12"><br>
                            <input name="status" id="status"  data-switch="true" type="checkbox" @if($Page->status=="published") checked="checked" @endif data-on-text="Publish" data-handle-width="70" data-off-text="Draft" data-on-color="brand" >
                        </div>
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-secondary" href="{{ route('pages.index') }}">Cancel</a>
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
                            data.append("pageImg", files[0]);
                            data.append("page_id", <?php echo $Page->id; ?> );
                            $.ajax({
                                data: data,
                                type: "POST",
                                url: "{{ route('pages.uploadImg') }}",
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
