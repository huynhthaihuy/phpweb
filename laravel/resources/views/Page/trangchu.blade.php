@extends('master')
@section('content')
<div class="fullwidthbanner-container">
<div class="Body1--Style container-fluid d-flex justify-content-center px-0 py-0 ">
        <div id="carouselExampleIndicators" class="Body1--Style carousel slide w-100 h-100" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="Body1--Style carousel-inner header2 d-flex h-100">
                <div class="Body1--Style carousel-item active">
                    <img class="d-block w-100 h-100" src="source/image/slide/banner1.jpg" alt="First slide" height="100%">
                    <div class="carousel-caption h-50 text-center">
                        <h1 class="Body__Carousel--color">Yamaha</h1>
                        <form action="{{route('users.contact')}}" method="GET">
                        <button type="submit" class="btn btn-primary mt-4">Liên Hệ</button>
						</form>
                    </div>
                </div>
                <div class="Body1--Style carousel-item ">
                    <img class="d-block w-100 h-100" src="source/image/slide/banner2.jpg" alt="Second slide">
                    <div class="carousel-caption h-50 text-center">
                        <h1 class="Body__Carousel--color">Yamaha</h1>
						<form action="{{route('users.contact')}}" method="GET">
                        <button type="submit" class="btn btn-primary mt-4">Liên Hệ</button>
						</form>
                    </div>
                </div>
                <div class="Body1--Style carousel-item">
                    <img class="d-block w-100 h-100" src="source/image/slide/banner3.jpg" alt="Third slide" height="600px">
                    <div class="carousel-caption h-50 text-center">
                        <h1 class="Body__Carousel--color">Yamaha</h1>
                        <form action="{{route('users.contact')}}" method="GET">
                        <button type="submit" class="btn btn-primary mt-4">Liên Hệ</button>
						</form>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                                @foreach($new_product as $new)
								<div class="col-sm-3">
									<div class="single-item">
                                    @if($new->promotion_price!=0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                    @endif
										<div class="single-item-header">
											<a href="{{route('users.detail',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
                                            @if($new->promotion_price==0)
                                            <span class="flash-sale">{{$new->unit_price}}</span>
                                            @else
                                            <span class="flash-del">{{$new->unit_price}}</span>
                                            <span class="flash-sale">{{$new->promotion_price}}</span>
                                            @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('users.add',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('users.detail',$new->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">{{$new_product->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khuyến Mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product1)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
                                @foreach($new_product1 as $new1)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('users.detail',$new1->id)}}"><img src="source/image/product/{{$new1->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new1->name}}</p>
											<p class="single-item-price">
                                            <span class="flash-del">{{$new1->unit_price}}</span>
                                                <span class="flash-sale">{{$new1->promotion_price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('users.add',$new1->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('users.detail',$new1->id)}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
                                </div>
                                @endforeach
                            </div>
                            <div class="row">
							{{$new_product1->links()}}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
        </div> <!-- #content -->
        </div> <!-- .container -->
@endsection     