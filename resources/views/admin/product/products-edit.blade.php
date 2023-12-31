@extends('admin.layouts.app')
@section('title')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-stickies"></i>
    </li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="products"><a href="{{route('products.index')}}">Products</a>/Update</li>
</ol>
@endsection
@section('content')
    <!-- Content wrapper start -->
    <div class="content-wrapper">

        <!-- Row start -->
        <div class="row gx-3">
            <div class="col-xxl-12">
                <div class="card card-370">
                    <div class="card-body">
                        <div class="custom-tabs-container">
                            <ul class="nav nav-tabs" id="formsTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="product-tab" data-bs-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="true">Product</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="variantss-tab" data-bs-toggle="tab" href="#variantss"
                                        role="tab" aria-controls="variantss" aria-selected="false">Variantss</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="formsTabContent">

                                <div class="tab-pane fade" id="product" role="tabpanel">
                                    <form action="" method="post" id="productForm" name="productForm">
                                        @csrf
                                        <!-- Row start -->
                                        <div class="row gx-3">
                                            <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Enter Product title</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="product-title" name="title" placeholder="title" value="{{$product->title}}" autocomplete="off">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-sm-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Slug</label>
                                                    <div class="input-group">
                                                        <input type="text" readonly style="background-color: #C0C0C0;" class="form-control" id="product-slug" name="slug" value="{{$product->slug}}" placeholder="slug">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2">
                                                <label class="form-label">Category</label>
                                                <div class="option-group">
                                                    <select name="category" id="category" class="form-control">
                                                        <option value="">select</option>
                                                        @if ($categories->isNotEmpty())
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <p></p>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xxl-2">
                                                <label class="form-label">Sub Category</label>
                                                <div class="option-group">
                                                    <select name="subCategory" id="subCategory" class="form-control" data-sub-id="{{$product->sub_category_id}}">
                                                        <option value="">select</option>
                                                    </select>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2">
                                                <div class="mb-3">
                                                    <div>
                                                        <label class="form-label">Amount</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="product-amount" name="amount" value="{{$product->amount}}" autocomplete="off">
                                                            <p></p>
                                                        </div>
                                                    </div>            
                                                    <div>
                                                        <label class="form-label">Price</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="product-price" name="price" value="{{$product->price}}" autocomplete="off">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="form-label">Promotion</label>
                                                        <div class="option-group">
                                                            <select name="promotion" id="promotion" class="form-control" style="overflow: hidden; white-space: normal; word-wrap: break-word;">      
                                                                    <option value="">select</option>                                
                                                                    @if ($promotion->isNotEmpty())
                                                                        @foreach ($promotion as $promo)
                                                                            <option value="{{$promo->id}}" {{$product->promotion_id == $promo->id ? 'selected' : ''}}>{{$promo->name}}</option>
                                                                        @endforeach
                                                                    @endif               
                                                            </select>
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="form-label">Status</label>
                                                        <div class="mt-2">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="StatusRadio1" value="1" {{($product->status == 1) ? 'checked' : ''}}>
                                                                <label class="form-check-label" for="StatusRadio1">Active</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="StatusRadio2" value="0" {{($product->status == 0) ? 'checked' : ''}}>
                                                                <label class="form-check-label" for="StatusRadio2">Block</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div id="image_id">
                                                    <input type="hidden" id="image_1" name="image_1" value="0">
                                                    <input type="hidden" id="image_2" name="image_2" value="0">
                                                    <input type="hidden" id="image_3" name="image_3" value="0">
                                                    <input type="hidden" id="image_4" name="image_4" value="0">
                                                </div>
												<div class="mb-3">
                                                    <label  class="form-label">Image <span id="count-images">0</span>/4</label>
                                                    <div id="image" class="dropzone dz-clickable">
                                                        <div class="dz-message needsclick">
                                                            <br>Drop files here or click to upload.<br><br>
                                                        </div>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-3">
                                                <label class="form-label" for="image">Image 1</label>
                                                <div>
                                                    <img src="{{ asset('uploads/product/products/thumb/' . (!empty($product->image_1) ? $product->image_1 : 'null.png')) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label" for="image">Image 2</label>
                                                <div>
                                                    <img src="{{ asset('uploads/product/products/thumb/' . (!empty($product->image_2) ? $product->image_2 : 'null.png')) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label" for="image">Image 3</label>
                                                <div>
                                                    <img src="{{ asset('uploads/product/products/thumb/' . (!empty($product->image_3) ? $product->image_3 : 'null.png')) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label" for="image">Image 4</label>
                                                <div>
                                                    <img src="{{ asset('uploads/product/products/thumb/' . (!empty($product->image_4) ? $product->image_4 : 'null.png')) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
												<div class="mb-3">
                                                    <label class="form-label" for="keywords">Keywords</label>
                                                    <div>
                                                        <input style="width: 1100px" type="text" name="keywords" id="product-keywords" value="{{$product->keywords}}" autocomplete="off">
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-5">
												<div class="mb-3">
                                                    <label class="form-label" for="detail">Detail</label>
                                                    <div>
                                                        <textarea name="detail" id="product-detail" cols="60" rows="3">{{$product->detail}}</textarea>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-5">
												<div class="mb-3">
                                                    <label class="form-label" for="care">Care</label>
                                                    <div>
                                                        <textarea name="care" id="product-care" cols="75" rows="3">{{$product->care}}</textarea>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-10">
												<div class="mb-3">
                                                    <label class="form-label" for="description">Description</label>
                                                    <div>
                                                        <textarea name="description" id="product-description" cols="144" rows="6">{{$product->description}}</textarea>
                                                    </div>
                                                </div>
											</div>                                            
                                        </div>
                                        <!-- Row end -->

                                        <!-- Form actions footer start -->
                                        <div class="form-actions-footer">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="submit" class="btn btn-success" style="color: black;">Update</button>
                                        </div>
                                        <!-- Form actions footer end -->
                                    </form>
                                </div>
                                <div class="tab-pane fade show active" id="variantss" role="tabpanel">
                                    <!-- Row start -->
                                    <div class="row gx-3 view-variantss">
                                        <div class="col-xxl-3 col-md-4 col-sm-6 col-12 top">
                                            <!-- Card start -->
                                            <div class="card gradient-teal" style="height: 355px">
                                                <div class="contact-card">
                                                    <a href="#" class="edit-contact-card" data-bs-toggle="modal" data-bs-target="#editVariant">
                                                        <i class="bi bi-clipboard-plus"></i>
                                                    </a>

                                                    <a href="#" class="edit-contact-card" style="margin-top: 60px">
                                                        <i class="bi bi-x-square"></i>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                            <!-- Card end -->
                                        </div>
                                        
                                        @if ($variantss->isNotEmpty())
										    @foreach ($variantss as $variant)
                                                <div class="col-xxl-3 col-md-4 col-sm-6 col-12 bot">
                                                    <!-- Card start -->
                                                    <div class="card gradient-teal">
                                                        <input type="checkbox" class="form-check-input" style="margin: 6px 0px 6px 6px" data-variant-id="{{$variant->id}}">
                                                        <div class="contact-card">
                                                            <a href="#" class="edit-contact-card" data-bs-toggle="modal" data-bs-target="#editVariant" onclick="fillModal({{ json_encode($variant) }})">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                            <div>
                                                                <img style="width: 30px; height: 30px;" src="{{ asset('uploads/product/variantss/thumb/' . (!empty($variant->image) ? $variant->image : 'null.png')) }}">
                                                            </div>
                                                            <h5><strong>ID: {{$variant->id}}<br>{{$variant->title}}</strong></h5>
                                                            <ul class="list-group">
                                                                <li class="list-group-item"><span>Color: </span><span>{{$variant->color}}</span></li>
                                                                <li class="list-group-item"><span>Size: </span><span>{{$variant->size}}</span></li>
                                                                <li class="list-group-item"><span>Quantity: </span>{{$variant->quantity}}</li>
                                                                <li class="list-group-item"><span>Price: </span><span>{{$variant->price}}</span></li>
                                                                <li class="list-group-item"><span>Promo: </span><span>{{$variant->promotion_value}}</span></li>
                                                                <li class="list-group-item">
                                                                    <span>
                                                                        @if($variant->status == 1)
                                                                            <span class="badge shade-green min-70">Active</span>
                                                                        @else
                                                                            <span class="badge shade-red min-70">block</span>
                                                                        @endif
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Card end -->
                    
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Row end -->

                                    <!-- Form actions footer start -->
                                    <div class="form-actions-footer">
                                        <button class="btn btn-light">Reset</button>
                                        <button class="btn btn-success">Save</button>
                                    </div>
                                    <!-- Form actions footer end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->
@endsection

@section('model')
<div class="modal fade" id="editVariant" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editVariantLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
            <h1 style="margin: 8px 0px 0px 8px;">variant <span id="variant-id"></span></h1>
            <form action="" method="post" id="variantForm" name="variantForm">
            @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editVariantLabel">Product: <span id="text_product_id">{{$product->id}}</span> <input type="hidden" name="product" id="product-variant-id" value="{{$product->id}}">
                    </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <div class="row gx-3">
                        <div class="col-sm-4 col-12">
                            <div class="mb-3">
                                <label  class="form-label">Image</label>
                                <input type="hidden" id="variant-image-id" name="image">
                                <div id="imageVariant" class="dropzone dz-clickable">
                                    <div class="dz-message needsclick">
                                        <br>Drop files here or click to upload.<br><br>
                                    </div>
                                </div>
                                <span id="img-current">
                            </div>
                        </div>
                        <div class="col-sm-8 col-12">
                            <div class="row gx-3">
                                <div class="col-6">

                                    <!-- Form Field Start -->
                                    <div class="mb-3">
                                        <label for="variant-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="variant-title" name="title" placeholder="title">
                                        <input type="hidden" class="form-control" id="variant-slug" name="slug" readonly>
                                    </div>

                                    <!-- Form Field Start -->
                                    <div class="mb-3">
                                        <label for="variant-quantity" class="form-label">Amount</label>
                                        <input type="number" class="form-control" id="variant-quantity" name="quantity">
                                    </div>

                                    <div class="mb-3">
                                        <label for="variant-price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="variant_price" name="price">
                                    </div>

                                </div>
                                <div class="col-6">

                                    <!-- Form Field Start -->
                                    <div class="mb-3">
                                        <label for="variant-color" class="form-label">Color</label>
                                        <div class="option-group">
                                            <select name="color" id="variant-color" class="form-control" style="overflow: hidden; white-space: normal; word-wrap: break-word;">      
                                                    <option value="">select</option>                                
                                                    @if ($colors->isNotEmpty())
                                                        @foreach ($colors as $color)
                                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                                        @endforeach
                                                    @endif               
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>

                                    <!-- Form Field Start -->
                                    <div class="mb-3">
                                        <label for="variant-size" class="form-label">Size</label>
                                        <div class="option-group">
                                            <select name="size" id="variant-size" class="form-control" style="overflow: hidden; white-space: normal; word-wrap: break-word;">      
                                                    <option value="">select</option>                                
                                                    @if ($sizes->isNotEmpty())
                                                        @foreach ($sizes as $size)
                                                            <option value="{{$size->id}}">{{$size->name}}</option>
                                                        @endforeach
                                                    @endif               
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="variant-promotion" class="form-label">Promotion</label>
                                        <div class="option-group">
                                            <select name="promotion" id="variant-promotion" class="form-control" style="overflow: hidden; white-space: normal; word-wrap: break-word;">      
                                                    <option value="">select</option>                                
                                                    @if ($promotion->isNotEmpty())
                                                        @foreach ($promotion as $promo)
                                                            <option value="{{$promo->id}}">{{$promo->name}}</option>
                                                        @endforeach
                                                    @endif               
                                            </select>
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div class="mt-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="Status1" value="1" checked>
                                                <label class="form-check-label" for="StatusRadio1">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="Status2" value="0">
                                                <label class="form-check-label" for="StatusRadio2">Block</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
	    </div>
    </div>
</div>
@endsection


@section('customJs')
<script>
    $("#productForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("products.update", $product->id) }}',
            type: 'put',
            data: element.serializeArray(),
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) {

                    window.location.href="{{route('products.index')}}";

                    alert('product updated successfully!');

                    $("#product-title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    $("#product-slug").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    $("#product-price").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    $("#product-amount").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                } else {
                    var errors = response['errors'];
                    if (errors['title']) {
                        $("#product-title").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['title'])
                    } else {
                        $("#product-title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                    }

                    if (errors['slug']) {
                        $("#product-slug").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['slug'])
                    } else {
                        $("#product-slug").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                    }

                    if (errors['price']) {
                        $("#product-price").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['price'])
                    } else {
                        $("#product-price").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                    }

                    if (errors['amount']) {
                        $("#product-amount").addClass('is-invalid')
                            .siblings('p')
                            .addClass('invalid-feedback').html(errors['amount'])
                    } else {
                        $("#product-amount").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");
                    }
                }

            },
            error: function(jqXHR, exception) {
                console.log("wrong");
            }
        })
    });


    var selectedCategoryId = $("#category").find('option:selected').val();
    var selectedSubCategoryId = $("#subCategory").find('option:selected').val();

    $('#category').change(function() {
        let selectedOption = $(this).find('option:selected');
        selectedCategoryId = selectedOption.val();
        element = $("#product-title");
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) { 
                    var slug = '';

                    if (selectedCategoryId) {
                        slug = response["slug"] + '--' + selectedCategoryId;
                        $('#product-slug').val(slug);
                    }
                    else
                        slug = response["slug"];

                    if (selectedSubCategoryId) {
                        slug  += '--' + selectedSubCategoryId;
                        $('#product-slug').val(slug);
                    }

                    $('#product-slug').val(slug);

                }
            }
        });
    });

    $('#subCategory').change(function() {
        let selectedOption = $(this).find('option:selected');
        selectedSubCategoryId = selectedOption.val();
        element = $("#product-title");
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) { 
                    var slug = '';

                    if (selectedCategoryId) {
                        slug += response['slug'] + '--' + selectedCategoryId;
                    }
                    else
                        slug += response['slug'];

                    if (selectedSubCategoryId) {
                        slug += '--' + selectedSubCategoryId;
                    }

                    $('#product-slug').val(slug);
                }
            }
        });
    });

    $("#product-title").change(function() {
        element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) { 
                    var slug = response["slug"];

                    if (selectedCategoryId) {
                        slug += '--' + selectedCategoryId;
                        $('#product-slug').val(slug);
                    }

                    if (selectedSubCategoryId) {
                        slug += '--' + selectedSubCategoryId;
                        $('#product-slug').val(slug);
                    }

                    $('#product-slug').val(slug);
                    
                }
            }
        });
    });

    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone({
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 4) {
                    this.removeFile(this.files[4]);
                }
                $("#count-images").html(this.files.length);
            });

            this.on('removedfile', function(file) {
                if (file.inputId) {
                    $(file.inputId).val('0');
                    let currentCount = parseInt($("#count-images").html());
                    $("#count-images").html(currentCount - 1);
                }
            });
        },
        url: "{{ route('temp-images.create')}}",
        maxFiles: 4,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(file, response) {
            updateImageId(file, response.image_id);
        }
    });

    function updateImageId(file, imageId) {
        for (let i = 1; i <= 4; i++) {
            let inputId = "#image_" + i;
            if ($(inputId).val() == '0' || $(inputId).val() === imageId) {
                $(inputId).val(imageId);
                file.inputId = inputId;
                break;
            }
        }
    }

    $("#variantForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);
        var actionUrl = '{{ route("variantss.store") }}';
        var variantId = $("#variant-id").html();

        if (variantId) {
            actionUrl = '{{ route("variantss.update", ":variantId") }}';
            actionUrl = actionUrl.replace(':variantId', variantId);
        }

        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: actionUrl,
            type: variantId ? 'put' : 'post',
            data: element.serializeArray(),
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) {
                    alert('Variant ' + (variantId ? 'updated' : 'added') + ' successfully!');
                    window.location.reload();
                    if (response['errors']) {
                        var errors = response['errors'];
                    }
                } else {
                    console.log("Error occurred during variant submission.");
                }
            },
            error: function(jqXHR, exception) {
                console.log("Wrong");
            }
        });
    });



    const dropzoneVariant = $("#imageVariant").dropzone({
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url: "{{ route('temp-images.create')}}",
        maxFiles: 1,
        paramName: 'image',
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }, success: function(file, response) {
            $("#variant-image-id").val(response.image_id);
        }
    });


    var selectedColorId = '';
    var selectedSizeId = '';

    $('#variant-color').change(function() {
        let selectedOption = $(this).find('option:selected');
        selectedColorId = selectedOption.val();
        element = $("#variant-title");
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) { 
                    var slug = '';

                    if (selectedColorId) {
                        slug = response["slug"] + '--' + selectedColorId;
                        $('#variant-slug').val(slug);
                    }
                    else
                        slug = response["slug"];

                    if (selectedSizeId) {
                        slug  += '--' + selectedSizeId;
                        $('#variant-slug').val(slug);
                    }

                    $('#variant-slug').val(slug);

                }
            }
        });
    });

    $('#variant-size').change(function() {
        let selectedOption = $(this).find('option:selected');
        selectedSizeId = selectedOption.val();
        element = $("#variant-title");
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) { 
                    var slug = '';

                    if (selectedColorId) {
                        slug += response['slug'] + '--' + selectedColorId;
                    }
                    else
                        slug += response['slug'];

                    if (selectedSizeId) {
                        slug += '--' + selectedSizeId;
                    }

                    $('#variant-slug').val(slug);
                }
            }
        });
    });

    $("#variant-title").change(function() {
        element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("getSlug") }}',
            type: 'get',
            data: {title: element.val()},
            dataType: 'json',
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) { 
                    var slug = response["slug"];

                    if (selectedColorId) {
                        slug += '--' + selectedColorId;
                        $('#variant-slug').val(slug);
                    }

                    if (selectedSizeId) {
                        slug += '--' + selectedSizeId;
                        $('#variant-slug').val(slug);
                    }

                    $('#variant-slug').val(slug);
                    
                }
            }
        });
    });


    // UPDATE
    function fillModal(variant) {
        $('#editVariant #variant-id').html(variant.id);
        $('#editVariant input[name="product"]').val(variant.product_id);
        $('#editVariant input[name="title"]').val(variant.title);
        $('#editVariant input[name="slug"]').val(variant.slug);
        $('#editVariant input[name="quantity"]').val(variant.quantity);
        $('#editVariant input[name="price"]').val(variant.price);
        $('#editVariant select[name="color"]').val(variant.color_id);
        $('#editVariant select[name="size"]').val(variant.size_id);
        $('#editVariant select[name="promotion"]').val(variant.promotion_id);
        $("#editVariant button[type=submit]").html('Update');
        $('#img-current').html(variant.image);
    }

    $('#product-variant-id').on('input', function() {
        var value = $(this).val();
        $('#text_product_id').text(value);
    });

    $('#editVariant').on('hidden.bs.modal', function (e) {
        $('#variant-id').html('');
        $("#editVariant button[type=submit]").html('Save');
        $('.img-update').css('display', 'none');
        $('#img-current').html('');
    });

    // DELETE

    const selectedVariants = [];

        $('.form-check-input').on('change', function() {
            const id = $(this).data('variant-id');
            if ($(this).is(':checked')) {
                selectedVariants.push(id);
            } else {
                const selectedIndex = selectedVariants.indexOf(id);
                if (selectedIndex !== -1) {
                    selectedVariants.splice(selectedIndex, 1);
                }
            }
        });

        $('.edit-contact-card .bi-x-square').on('click', function(event) {
            event.preventDefault();
            if (selectedVariants.length > 0) {
                if (confirm('Are you sure you want to delete the selected variants?')) {
                    selectedVariants.forEach(function(id) {
                        deleteVariant(id);
                    });
                }
            } else {
                alert('Please select at least one variant to delete');
            }
        });

    function deleteVariant(id) {
        var url = '{{ route("variantss.delete", ":id") }}';
        var newUrl = url.replace(':id', id);
            $.ajax({
                url: newUrl,
                type: 'delete',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);
                    if (response["status"] == true) {
                        alert("Biến thể đã được xóa thành công");
                        window.location.reload();
                    } else {
                        alert("not found: " + response['id']);
                    }
                }
            });
    }

    $(document).ready(function () {
        var categoryId = $('#category').val();
        var subCategoryId = $('#subCategory').data('sub-id');

        loadSubCategories(categoryId);

        $('#category').change(function () {
            var categoryId = $(this).val();
            $('#subCategory').empty();
            loadSubCategories(categoryId);
            
        });

        function loadSubCategories(categoryId)
        {
            $.ajax({
                url: '/getSubCategories/' + categoryId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.length > 0) {
                        $.each(data, function (index, subCategory) {
                            var option = $('<option>', {
                                value: subCategory.id,
                                text: subCategory.name
                            });

                            if (subCategory.id == subCategoryId) {
                                option.attr('selected', true);
                            }
                            $('#subCategory').append(option);
                        });
                    } else {
                        $('#subCategory').append($('<option>', {
                            value: '',
                            text: 'No subcategory available'
                        }));
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

</script>
@endsection