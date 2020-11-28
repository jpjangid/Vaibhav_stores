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
                        Edit Product
                    </h3>
                </div>
            </div>
            <!--begin::Form-->
            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data" class="kt-form" id="product-edit">
            @csrf
            @method('PUT')
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name *</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" required  autofocus >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_id">Category *</label>
                                <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
                                    <option value="">--Select--</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ ((($product->category_id)? $product->category_id : old('category_id')) ==  $category->id) ? 'selected' : '' }}> {{ $category->name }} </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sub_category_id">Sub Category *</label>
                                <select id="sub_category_id" name="sub_category_id" class="form-control @error('sub_category_id') is-invalid @enderror" required>
                                    <option value="">--Select--</option>
                                    @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}"
                                        {{ ((($product->sub_category_id)? $product->sub_category_id : old('sub_category_id')) ==  $subCategory->id) ? 'selected' : '' }}> {{ $subCategory->name }} </option>
                                    @endforeach
                                </select>
                                @error('sub_category_id')
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
                                <label for="short_description">Short Description *</label>
                                <textarea required class="form-control resize-none  @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="3" >{{ ($product->short_description)?$product->short_description : old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="content">Description</label>
                            <div class="form-group">
                                <textarea class="summernote" id="description" name="description">{{ ($product->description)?$product->description : old('description') }}</textarea>
                            </div>
                        </div>
                    </div>



                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sequence">Sequence</label>
                                <input type="text" id="sequence" name="sequence" class="form-control @error('sequence') is-invalid @enderror" value="{{ ($product->sequence)? $product->sequence : old('sequence') }}">

                                <div class="existLabel" role="alert" style="color:#fd397a; font-size:80%">

                                </div>
                                <div class="existUrl" role="alert">
                                    <a href=""></a>
                                </div>
                                @error('sequence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="regular_price">Regular Price *</label>
                                <input type="text" id="regular_price" name="regular_price" class="form-control calculation @error('regular_price') is-invalid @enderror" value="{{ ($product->regular_price)? $product->regular_price : old('regular_price') }}" required>

                                @error('regular_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="discount">Discount %</label>
                                <input type="text" id="discount" name="discount" class="form-control calculation @error('discount') is-invalid @enderror" value="{{ ($product->discount >= 0)? $product->discount : old('discount') }}">

                                @error('discount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sale_price">Sale Price *</label>
                                <input type="text" id="sale_price" name="sale_price" class="form-control  @error('sale_price') is-invalid @enderror" value="{{ ($product->sale_price)? $product->sale_price : old('sale_price') }}" required readonly>

                                @error('sale_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="sale_price">GST Rate *</label>
                                <input type="text" id="gst_rate" name="gst_rate" class="form-control  @error('gst_rate') is-invalid @enderror" value="{{ ($product->sale_price)? $product->gst_rate : old('gst_rate') }}" required>
                                <span class="note">Inclusive of GST.</span>
                                @error('gst_rate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <?php
                            $related_product_ids = explode(',', $product->related_products);

                            ?>

                            <div class="form-group">
                                <label for="related_products">Related Products</label>
                                <select id="related_products" multiple name="related_products[]" class="form-control @error('related_products') is-invalid @enderror">
                                    <option value="">--Select--</option>
                                    @foreach ($relatedProducts as $relatedProduct)
                                    <option value="{{ $relatedProduct->id }}"
                                        @foreach($related_product_ids as $related_product_id) @if($relatedProduct->id == $related_product_id)selected="selected"@endif @endforeach
                                        > {{ $relatedProduct->name }} </option>
                                        {{-- {{ ((($product->related_products)? $product->related_products : old('related_products[]')) ==  $relatedProduct->id) ? 'selected' : '' }} --}}
                                    @endforeach
                                </select>
                                @error('related_products')
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
                                    <input name="is_published" id="is_published"  data-switch="true" type="checkbox" @if($product->is_published==1) checked="checked" @endif data-on-text="Publish" data-handle-width="70" data-off-text="Draft" data-on-color="brand" >
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <legend>SEO</legend>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slug">URL *</label>
                                    <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ ($product->slug)? $product->slug : old('slug') }}">
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
                                    <input type="text" id="meta_title" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" value="{{ ($product->meta_title)? $product->meta_title : old('meta_title') }}">
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
                                    <textarea class="form-control resize-none  @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" >{{ ($product->meta_description)?$product->meta_description : old('meta_description') }}</textarea>
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
                                    <input type="text" id="meta_keyword" name="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" value="{{ ($product->meta_keyword)? $product->meta_keyword : old('meta_keyword') }}">
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
                            <div class="table-responsive">
                                <table class="table table-head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Primary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="product-image">
                                        <?php $i=0; ?>
                                        @foreach ($productImages as $productImage)
                                            <tr>
                                                <td>
                                                    <input type="hidden" class="old_image" name="product_image[{{$i}}][old_image]" value="{{$productImage->image}}">
                                                    <input type="hidden" class="product_image_id" name="product_image[{{$i}}][product_image_id]" value="{{$productImage->id}}">

                                                    <div class="kt-avatar kt-avatar--outline product_image" id="product_image_{{$i+1}}">
                                                        <div class="kt-avatar__holder" style="background-image: url('{{ asset('storage/product/'.$productImage->image) }}')"></div>
                                                    </div>
                                                    <div class="product_image">
                                                        <input type="file" name="product_image[{{$i}}][image]" onchange="imageSizeValidation(this)" accept="png, jpg, jpeg">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio kt-checkbox--state-success">
                                                        <input type="radio" value="1" class="primary" {{($productImage->is_primary)?'checked':''}}  name="product_image[{{$i}}][primary]" > &nbsp
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn-sm btn btn-label-danger btn-bold deleteRow"><i class="la la-trash-o"></i> Delete</button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button type="button"  id="add-row" class="btn btn-bold btn-sm btn-label-brand"><i class="la la-plus"></i> Add</button>

                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-secondary" href="{{ route('products.index') }}">Cancel</a>
                    </div>
                </div>
                <input type="hidden" id="product_image_delete" name="product_image_delete" value="">
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
<table style="display:none;">
    <tbody id="table-clone">
        <tr>
            <td>
                <div class="product_image">
                    <input type="file" name="product_rows[0]['image']" onchange="imageSizeValidation(this)" accept="png, jpg, jpeg" required>
                </div>
            </td>
            <td>
                <div class="kt-radio-inline">
                    <label class="kt-radio kt-checkbox--state-success">
                        <input type="radio" value="1" class="primary"   name="product_rows[0]['primary']" > &nbsp
                        <span></span>
                    </label>
                </div>
            </td>
            <td>
                <button type="button" class="btn-sm btn btn-label-danger btn-bold deleteRow"><i class="la la-trash-o"></i> Delete</button>
            </td>
        </tr>
    </tbody>
</table>

@endsection


@section ('footer-script')

<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/forms/editors/summernote.js" type="text/javascript"></script>
<script src="<?php echo url('/'); ?>/themes/metronic/theme/default/demo1/dist/assets/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

<script type="text/javascript">
    var KTFormControls= {
        init:function() {
            $("#product-edit").validate({
                rules: {
                    name: {
                        required: !0
                    },
                    category_id: {
                        required: !0
                    },
                    sub_category_id: {
                        required: !0
                    },
                    short_description: {
                        required: !0
                    },
                    slug: {
                        required: !0
                    },
                    sequence: {
                        digits: !0
                    },
                    regular_price: {
                        required: !0
                    },
                    sale_price: {
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

            });
        }
    };

    jQuery(document).ready(function() {
        KTFormControls.init();

    });

    var KTFormWidgets = function() {
        var e;
        return {
            init: function() {
                ! function() {
                    // $("#category_id").select2({
                    //     placeholder: "Select a category"
                    // }), $("#category_id").on("select2:change", function() {
                    //     e.element($(this))
                    // });

                    // $("#sub_category_id").select2({
                    //     placeholder: "Select a subcategory"
                    // }), $("#sub_category_id").on("select2:change", function() {
                    //     e.element($(this))
                    // });

                    $("#related_products").select2({
                        placeholder: "Select a related product"
                    }), $("#related_products").on("select2:change", function() {
                        e.element($(this))
                    });
                }()
            }
        }
    }();

    // var KTTagify = {
    //     init: function() {
    //         var e, a;
    //         ! function() {
    //             var e = document.getElementById("product_tags"),
    //                 a = new Tagify(e, {
    //                     whitelist: [],
    //                     blacklist: []
    //                 });

    //         }()
    //     }
    // };

    jQuery(document).ready(function() {
        KTFormWidgets.init();
       // KTTagify.init();
        // KTFormRepeater.init();
        $('#product_image_delete').val("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $( document ).on('blur', '#sequence', function(){
                let sequence = $(this).val();
                let id = "<?php echo $product->id; ?>";
                var url = '{{ route("productSequenceExist", [":sequence",":id"]) }}';
                url = url.replace(':sequence', sequence);
                url = url.replace(':id', id);
                jQuery.ajax({
                    url : url,
                    type : 'get',
                    dataType : 'json',
                    success : function(data) {
                        if(data.label == 'Not Exist')
                        {
                            $('.existLabel').html('');
                            $('.existUrl').find('a').attr('href','');
                            $('.existUrl').find('a').text('');
                        }
                        else
                        {
                            $('.existLabel').html(data.label);
                            $('.existUrl').find('a').attr('href',data.url);
                            $('.existUrl').find('a').text(data.name);
                        }
                    }
                });
            });

        $( "#category_id" ).on( "change", function() {
            var category_id = $(this).val();
            $.ajax({
               type:'POST',
               url:"{{ route('subcategorylist') }}",
               data:{category_id:category_id},
               success:function(data){
                    $( "#sub_category_id" ).html(data);
                    /*$( "#sub_category_id" ).html(data).select2({
                        placeholder: "Select a subcategory"
                    });*/
               }
            });
        });
        showHideDeleteButton();
        renameImage();
        let imageLength = $('#product-image tr').length;
        if(imageLength == 0)
        {
            addRow();
        }
        $("#add-row").on("click", function(e){
            addRow();
        });
        function addRow()
        {
            var $cloneTr = $('#table-clone tr').clone();
            $('#product-image').append($cloneTr);
            showHideDeleteButton();
            primaryChecked();
            renameImage();
        }
        function showHideDeleteButton()
        {
            if($('#product-image tr').length == 1)
            {
                $('#product-image tr').find('.deleteRow').hide();
            }
            else
            {
                $('.deleteRow').show();
            }
        }
        function renameImage()
        {
            var i = 1;
            $('#product-image tr').each(function(){
                $(this).find('input[type=file]').attr('name','product_image['+i+'][image]');
                $(this).find('input[type=radio]').attr('name','product_image['+i+'][primary]');
                $(this).find('input.old_image').attr('name','product_image['+i+'][old_image]');
                $(this).find('input.product_image_id').attr('name','product_image['+i+'][product_image_id]');
                i++;
            });
            primaryChecked();
        }
        $(document).on('change', '.primary', function(){
            $("input[type=radio].primary").prop("checked", false);
            $(this).prop("checked", true);
            primaryChecked();
        });
        $(document).on('click', '.deleteRow', function(){
            var product_image_id = $(this).closest('tr').find('.product_image_id').val();
            var product_image_delete = $('#product_image_delete').val();
            if(product_image_id)
            {
                if(product_image_delete == "")
                {
                    var product_image_delete_id = product_image_id;
                }
                else
                {
                    var product_image_delete_id = product_image_delete+','+product_image_id;
                }
                $('#product_image_delete').val(product_image_delete_id);
            }
            $(this).closest('tr').remove();
            showHideDeleteButton();
            renameImage();
        });

        function primaryChecked()
        {
            var isChecked = false;
            $( ".primary" ).each(function(){
                if($(this).is(':checked'))
                {
                    isChecked = true;
                }
            })
            .promise()
            .done( function(){
                if(isChecked == true)
                {
                    $( ".primary" ).rules( "remove" );
                }
                else
                {
                    $(".primary").rules("add", {
                        required: !0,
                        minlength: 1
                    });
                }
            });
        }

        $(".calculation").on("keyup", function(e){
            calculation();
        });

        function calculation()
        {
            let regular_price = $('#regular_price').val();
            let discount = $('#discount').val();
            if(discount == '')
            {
                discount = 0;
            }
            if(discount != 0)
            {
                let sale_price = (regular_price * discount)/100;
                $('#sale_price').val(regular_price - sale_price);
            }
            else
            {
                $('#sale_price').val(regular_price);
            }

        }

        $(document).on('blur','#name,#slug', function(e){
            const a = 'àáâäæãåāăąçćčđďèéêëēėęěğǵḧîïíīįìłḿñńǹňôöòóœøōõőṕŕřßśšşșťțûüùúūǘůűųẃẍÿýžźż·/_,:;';
            const b = 'aaaaaaaaaacccddeeeeeeeegghiiiiiilmnnnnoooooooooprrsssssttuuuuuuuuuwxyyzzz------';
            const p = new RegExp(a.split('').join('|'), 'g');
            let url = $(this).val();
            let urlReplace = url.toString().toLowerCase()
                .replace(/\s+/g, '-') // Replace spaces with -
                .replace(p, c => b.charAt(a.indexOf(c))) // Replace special characters
                .replace(/&/g, '') // Replace & with 'and'
                // .replace(/&/g, '-and-') // Replace & with 'and'
                .replace(/[^\w\-]+/g, '') // Remove all non-word characters
                .replace(/\-\-+/g, '-') // Replace multiple - with single -
                .replace(/^-+/, '') // Trim - from start of text
                .replace(/-+$/, '') // Trim - from end of text
                .replace(/^\d+/, ''); // Trim number from start of text
            $('#slug').val(urlReplace);
        });

        $('#short_description').summernote({
            height: 150
        });
        $('#product-edit').on('submit', function(e) {
            if($('#short_description').summernote('isEmpty')) {
               alert('Short description is empty, fill it!');

                // cancel submit
                e.preventDefault();
            }
        });

    });
</script>
@endsection
