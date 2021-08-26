@extends('frontend.master')
@section('title','Trang chủ')
@section('main')
	<div id="wrap-inner col-md-9">
		<div class="products">
			<h3>sản phẩm nổi bật</h3>
			<div class="product-list row">
				@foreach ($featured as $spnb)
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$spnb->pro_img)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$spnb->pro_name}}</a></p>
					<p class="price">{{number_format($spnb->pro_price)}}VND</p>	  
					<div class="marsk">
						<a href="{{asset('detail/'.$spnb->pro_id.'/'.$spnb->pro_slug.'.html')}}">Xem chi tiết</a>
					</div>                                    
				</div>
				@endforeach
			</div>                	                	
		</div>

		<div class="products">
			<h3>sản phẩm mới</h3>
			<div class="product-list row">
				@foreach ($new as $spmn)
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$spmn->pro_img)}}" class="img-thumbnail"></a>
					<p><a href="#">{{$spmn->pro_name}}</a></p>
					<p class="price">{{number_format($spmn->pro_price)}}VND</p>	  
					<div class="marsk">
						<a href="{{asset('detail/'.$spmn->pro_id.'/'.$spmn->pro_slug.'.html')}}">Xem chi tiết</a>
					</div>                      	                        
				</div>
				@endforeach
			</div>    
		</div>
	</div>
@endsection

					
