@extends('admin.layouts.app')
@section('title')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <i class="bi bi-stickies"></i>
    </li>
    <li class="breadcrumb-item breadcrumb-active" aria-current="products"><a href="{{route('products.index')}}">Products</a>/Insert</li>
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
                                    <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="{{route('products.index')}}" role="tab" aria-controls="product" aria-selected="true">Product</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="Variantss"  href="#" role="tab" aria-controls="Variantss" aria-selected="false">Variantss</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="formsTabContent">

                                <div class="tab-pane fade show active" id="product" role="tabpanel">
                                    <form action="" method="post" id="productForm" name="productForm">
                                        @csrf
                                        <!-- Row start -->
                                        <div class="row gx-3">
                                            <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Enter Product title</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="product-title" name="title" placeholder="title" autocomplete="off">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-sm-4 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Slug</label>
                                                    <div class="input-group">
                                                        <input type="text" readonly style="background-color: #C0C0C0;" class="form-control" id="product-slug" name="slug" placeholder="slug">
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2">
                                                <label class="form-label">Category</label>
                                                <div class="option-group">
                                                <select name="category" id="category" class="form-control" style="overflow: hidden; white-space: normal; word-wrap: break-word;">      
                                                        <option value="">select</option>                                
                                                        @if ($categories->isNotEmpty())
                                                            @foreach ($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        @endif               
                                                </select>
                                                <p></p>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2">
                                                <label class="form-label">Sub Category</label>
                                                <div class="option-group">
                                                   <select name="subCategory" id="subCategory" class="form-control">
                                                        <option value="">Select</option>
                                                    </select>
                                                   <p></p>
                                                </div>
                                            </div>
                                            <div class="col-xxl-2">
                                                <div class="mb-3">
                                                    <div>
                                                        <label class="form-label">Amount</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="product-amount" name="amount" autocomplete="off">
                                                            <p></p>
                                                        </div>
                                                    </div>            
                                                    <div>
                                                        <label class="form-label">Price</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" id="product-price" name="price" autocomplete="off">
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
                                                                            <option value="{{$promo->id}}">{{$promo->name}}</option>
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
                                                                <input class="form-check-input" type="radio" name="status" id="StatusRadio1" value="1" checked>
                                                                <label class="form-check-label" for="StatusRadio1">Active</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="status" id="StatusRadio2" value="0">
                                                                <label class="form-check-label" for="StatusRadio2">Block</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div id="image_id">
                                                    <input  id="image_1" name="image_1" value="0">
                                                    <input  id="image_2" name="image_2" value="0">
                                                    <input  id="image_3" name="image_3" value="0">
                                                    <input  id="image_4" name="image_4" value="0">
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
                                            <div class="col-md-10">
												<div class="mb-3">
                                                    <label class="form-label" for="keywords">Keywords</label>
                                                    <div>
                                                        <input style="width: 1100px" type="text" name="keywords" id="product-keywords" autocomplete="off">
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-5">
												<div class="mb-3">
                                                    <label class="form-label" for="detail">Detail</label>
                                                    <div>
                                                        <textarea name="detail" id="product-detail" cols="60" rows="3"></textarea>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-5">
												<div class="mb-3">
                                                    <label class="form-label" for="care">Care</label>
                                                    <div>
                                                        <textarea name="care" id="product-care" cols="75" rows="3"></textarea>
                                                    </div>
                                                </div>
											</div>
                                            <div class="col-md-10">
												<div class="mb-3">
                                                    <label class="form-label" for="description">Description</label>
                                                    <div>
                                                        <textarea name="description" id="product-description" cols="144" rows="6"></textarea>
                                                    </div>
                                                </div>
											</div>                                            
                                        </div>
                                        <!-- Row end -->

                                        <!-- Form actions footer start -->
                                        <div class="form-actions-footer">
                                            <button type="reset" class="btn btn-light">Reset</button>
                                            <button type="submit" class="btn btn-success" style="color: black;">Create</button>
                                        </div>
                                        <!-- Form actions footer end -->
                                    </form>
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


@section('customJs')
<script>
    $("#productForm").submit(function(event) {
        event.preventDefault();
        var element = $(this);
        $("button[type=submit]").prop('disabled', true);
        $.ajax({
            url: '{{ route("products.store") }}',
            type: 'post',
            data: element.serializeArray(),
            success: function(response) {
                $("button[type=submit]").prop('disabled', false);
                if (response["status"] == true) {
                    
                    var productId = response['productId']; // Lấy productId từ response
                    var editUrl = "{{ route('products.edit', ':productId') }}".replace(':productId', productId);
                    window.location.href = editUrl;

                    alert('product added successfully!');

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

    var selectedCategoryId = '';
    var selectedSubCategoryId = '';

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

    $(document).ready(function() {
        $('#category').change(function() {
            var categoryId = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/getSubCategories/' + categoryId,
                success: function(data) {
                    var subCategorySelect = $('#subCategory');
                    subCategorySelect.empty().append('<option value="">Select</option>');
                    $.each(data, function(key, value) {
                        subCategorySelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>
@endsection