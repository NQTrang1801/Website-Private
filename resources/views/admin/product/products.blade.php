@extends('admin.layouts.app')

@section('styles')
<style>
    .table th,
    .table td {
        padding: 8px;
        max-width: 200px; 
    }

	.product-images {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr 1fr;
		column-gap: 6px;
		margin-top: 10px;
	}

	.product-images p {
		float: right;
	}

</style>
@endsection

@section('title')
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<i class="bi bi-stickies"></i>
	</li>
	<li class="breadcrumb-item breadcrumb-active" aria-current="Products">Products</li>
</ol>
@endsection

@section('search-content')
<form action="" method="get">
	<div class="input-group">
		<input type="text" name="keyword" class="form-control" value="{{Request::get('keyword')}}" placeholder="Search">
		<button class="btn" type="submit">
			<i class="bi bi-search"></i>
		</button>
	</div>
</form>
@endsection

@section('content')
	<!-- Content wrapper start -->
	<div class="content-wrapper">

		<!-- Row start -->
		<div class="row gx-3">
			<div class="col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">View
							<button onclick="window.location.href='{{ route("sub-categories.index")}}'" style="margin-left: 32px; border: 1px solid; padding: 0px 10px; font-size: 16px; border-radius: 12px;">refesh</button>
						</div>
						<div>
							<a href="{{route('products.create')}}">
								<button type="button" class="w-40 btn btn-success btn-rounded" style="color: black;">New product</button>
							</a>
						</div>

					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="table v-middle m-0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Title</th>
										<th>Category</th>
										<th>Sub Category</th>
                                        <th>Price</th>
										<th>Promo</th>
                                        <th>Amount</th>
										<th>Update At</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									@if ($products->isNotEmpty())
										@foreach ($products as $product)
										<tr>
											<td>
												<p>{{$product->id}}</p>
											</td>
											<td>
												<p>{{$product->title}}</p>
											</td>
											<td>
												<p>{{$product->category_name}}</p>
											</td>
                                            <td>
												<p>{{$product->sub_category_name}}</p>
											</td>
                                            <td>
                                                <p>{{$product->price}}</p>
                                            </td>
											<td>
                                                <p>{{$product->promotion_value}}</p>
                                            </td>
											<td>
                                                <p>{{$product->amount}}</p>
                                            </td>
											<td>{{$product->updated_at}}</td>
											<td>
												@if($product->status == 1)
													<span class="badge shade-green min-70">Active</span>
												@else
													<span class="badge shade-red min-70">block</span>
												@endif
											</td>
											<td>
												<div class="actions">
                                                    <a href="#" class="btn-detail" id="btn-detail-{{$product->id}}">
                                                        <i class="bi bi-list text-green"></i>
                                                    </a>
													<div class="icon">
														<a href="{{ route('sub-categories.edit',$product->id)}}"><i class="bi bi-pencil-square"></i></a>
													</div>
													<div class="icon">
														<a href="#" onclick = "deleteSubCategory({{$product->id}})"><i class="bi bi-x-square" style="color: red"></i></a>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td colspan="10">
												<div class="product-detail" style="display: none" id="pro-{{$product->id}}">
														<div><strong>Description: </strong><span>{{$product->description}}</span></div>
														<div><strong>Detail: </strong><span>{{$product->detail}}</span></div>
														<div><strong>Care: </strong><span>{{$product->care}}</span></div>
														<div><strong>Create date: </strong><span>{{$product->created_at}}</span></div>
														<div><strong>Images: </strong></div>
														@if (!empty($product->images_id))
														<div class="product-images">
															<div>
																<p>image_1</p>
																<img src="{{asset('uploads/product/image/thumb/'.!empty($product->image_1) ? $product->image_1 : 'none.jpg')}}" alt=""></div>
															<div>
																<p>image_2</p>
																<img src="{{asset('uploads/product/image/thumb/'.!empty($product->image_2) ? $product->image_2 : 'none.jpg')}}" alt="">
															</div>
															<div>
																<p>image_3</p>
																<img src="{{asset('uploads/product/image/thumb/'.!empty($product->image_3) ? $product->image_3 : 'none.jpg')}}" alt="">
															</div>
															<div>
																<p>image_4</p>
																<img src="{{asset('uploads/product/image/thumb/'.!empty($product->image_4) ? $product->image_4 : 'none.jpg')}}" alt="">
															</div>
														</div>
														@endif
														<hr>
														<div style="display: flex; justify-content: center"><strong>Variantss</strong></div>
												</div>
											</td>
										</tr>
										@endforeach
									@else
										<tr>
											<td colspan="10">Records not found</td>
										</tr>
									@endif

								</tbody>
							</table>
							<nav aria-label="Page Navigation" style="margin-top: 40px">
								{{ $products->links()}}
								
							</nav>
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

	$(".btn-detail").click(function () {
		var clickedId = $(this).attr('id');
		var id = 'pro-' + clickedId.split('-')[2];
		$('#' + id).slideToggle("slow");
	});

	function deleteSubCategory(id)
	{
		var url = '{{route("sub-categories.delete","ID")}}';
		var newUrl = url.replace("ID",id);
		if(confirm("Are you sure you want to delete"))
		{
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
						alert("sub Category deleted successfully");
						window.location.href="{{route('sub-categories.index')}}";
					}
					else
					{
						alert("sub Category not found");
						window.location.href="{{route('sub-categories.index')}}";
					}
				}
			});


		}
	}

</script>

@endsection