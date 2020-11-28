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
                        Edit Event
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('events.update',$event->id) }}" id="event-form" method="POST" enctype="multipart/form-data" class="kt-form">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">

                    <div class="form-group">
                        <label for="name">Event Name *</label>
                        <input type="text" id="name" name="name" placeholder="Event Name" class="form-control @error('name') is-invalid @enderror" value="{{ $event->name }}" required  autofocus style="font-size: 16px;">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Event Date</label>
                                <div class="input-group date">
                                    <input type="text"  name="event_date" class="form-control  @error('event_date') is-invalid @enderror" value="{{ ($event->event_date==null)?'':date('d-m-Y',strtotime($event->event_date)) }}" readonly  placeholder="Select date" id="event_date"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                        </span>
                                    </div>
                                    <div class="valid-feedback">
                                          Success! You"ve done it.
                                    </div>
                                </div>
                                @error('event_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" id="price" name="price" placeholder="Price" class="form-control @error('price') is-invalid @enderror" value="{{ $event->price }}">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						 <div class="col-md-4">
                            <div class="form-group">
                                <label for="is_published">Publish Status</label>
                                    <br>
                                    <input name="is_published" id="is_published"  data-switch="true" type="checkbox" @if($event->is_published==1) checked="checked" @endif data-on-text="Publish" data-handle-width="70" data-off-text="Draft" data-on-color="brand" >
                            </div>
                        </div>
                    </div>

                    <fieldset>
                        <legend>SEO</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="meta-title">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ ($event->meta_title)? $event->meta_title : old('meta_title') }}">
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
                                    <textarea class="form-control resize-none  @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" >{{ ($event->meta_description)?$event->meta_description : old('meta_description') }}</textarea>
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
                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{ ($event->meta_keyword)? $event->meta_keyword : old('meta_keyword') }}">
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

                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="row @error('add_image') is-invalid @enderror">
                                    <label class="col-xl-3 col-lg-3 col-form-label" for="add_image">Event Image</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                            <?php
                                            $showImg = url('/').'/img/no-image.png';
                                            if ($event->image) $showImg = asset('storage/event/'.$event->id.'/'.$event->image);
                                            ?>
                                            <div class="kt-avatar__holder" style="background-image: url(<?php echo $showImg; ?>)"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="add_image" {{($event->image == null)?'required':''}}>
                                            </label>

                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Allowed file types:  png, jpg, jpeg.</span>
                                        <div id="add_image-error" class="error invalid-feedback">This field is required.</div>

                                    </div>
                                </div>
                                @error('add_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">Event Description</label>
                            <textarea class="summernote" id="description" name="description">{{ $event->description }}</textarea>
                        </div>
                    </div>


                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-secondary" href="{{ route('events.index') }}">Cancel</a>
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
                            data.append("eventImg", files[0]);
                            data.append("event_id", <?php echo $event->id; ?> );
                            $.ajax({
                                data: data,
                                type: "POST",
                                url: "{{ route('events.uploadImg') }}",
                                cache: false,
                                dataType: "json",
                                enctype: "multipart/form-data",
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    if (data.status == 'success') {
                                        var imgNode = $("<img>").attr("src",data.url);
                                        $("#description").summernote("insertNode", imgNode[0]);
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
    var KTFormWidgets = function() {
        var e;
        return {
            init: function() {
                ! function() {
                    $("#event_date").datepicker({
                        todayHighlight: !0,
                        autoclose: !0,
                        format: "dd-mm-yyyy",
                        templates: {
                            leftArrow: '<i class="la la-angle-left"></i>',
                            rightArrow: '<i class="la la-angle-right"></i>'
                        }
                    });
                }()
            }
        }
    }();
    var KTFormControls= {
        init:function() {
            $("#event-form").validate({
                rules: {
                    name: {
                        required: !0
                    },
                    event_date: {
                        required: !0
                    },
                    price: {
                        required: !0
                    }

                }
                , errorPlacement:function(e, r) {
                    var i=r.closest(".input-group");
                    i.length?i.after(e.addClass("invalid-feedback")): r.after(e.addClass("invalid-feedback"))
                }
                , invalidHandler:function(e, r) {
                    $("#kt_form_1_msg").removeClass("kt--hide").show(), KTUtil.scrollTop()
                }

            })
        }
    };
    jQuery(document).ready(function(){
        KTSummernoteDemo.init()
        KTFormWidgets.init()
        KTFormControls.init()
        });
</script>
<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/file-upload/ktavatar.js" type="text/javascript"></script>
<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
@endsection
