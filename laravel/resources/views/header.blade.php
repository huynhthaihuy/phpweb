<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href="#"><i class="fa fa-home"></i> K448/67 Trưng Nữ Vương-Đà Nẵng</a></li>
						<li><a href="#"><i class="fa fa-phone"></i> 0905 463 037</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
					@if(Auth::check())
						<li><a href="#">Chào bạn {{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('users.logout')}}">Đăng xuất</a></li>
					@else
						<li><a href="{{route('users.signup')}}">Đăng kí</a></li>
						<li><a href="{{route('users.login')}}">Đăng nhập</a></li>
					@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="{{route('users.index')}}" id="logo"><img src="source/assets/dest/images/tải xuống.jpg" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('users.search')}}">
					        <input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
					@if(Session::has('cart'))
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')){{Session('cart')->totalQty}} @else Trống @endif) <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@foreach($product_cart as $product)
								<div class="cart-item">
								<a class="cart-item-delete" href="{{route('users.delcart',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
										<span class="cart-item-title">{{$product['item']['name']}}</span>
										<span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0){{$product['item']['unit_price']}}@else{{$product['item']['promotion_price']}}@endif</span></span>
										</div>
									</div>
								</div>
								@endforeach

								<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{Session('cart')->totalPrice}}</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
						</div> <!-- .cart -->
						@endif
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('users.index')}}">Trang chủ</a></li>
						<li><a href="#">Loại Sản phẩm</a>
							<ul class="sub-menu">
							@foreach($loai_sp as $loai)
								<li><a href="{{route('users.category',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
							</ul>
						</li>
						<li><a href="{{route('users.contact')}}">Liên hệ</a></li>
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->