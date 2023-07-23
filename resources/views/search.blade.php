@extends('layout')
@section('styles')
@endsection
@section('content')
    <!-- section content area start -->
    <div class="section-content">

        <!-- hero section start -->
        <div class="hero">
            <marquee behavior="scroll" scrollamount="10" direction="left">
                Welcome to eBazar! Get your daily needs easy and instant from our shop.
            </marquee>

            <div class="section-wrap hero-wrap">
                <div class="hero-image">
                    <img class="animate__animated animate__bounceInDown" src="img/hero/01.png" alt="">
                </div>

                <div class="hero-description">
                    <h1 class="animate__animated animate__bounceInRight hero-title">The best dried fruits for your
                        family health</h1>
                    <button class="animate__animated animate__bounceInUp hero-button">Explore</button>
                </div>

                <div class="hero-slide-btn">
                    <div class="hero-slide-left">
                        <span class="icon-arrow-left"></span>
                    </div>
                    <div class="hero-slide-right">
                        <span class="icon-arrow-right"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero section end -->

        <!-- service section start -->
        <div id="services">
           
        </div>
        <!-- service section end -->





        <!-- call to action area start - vegetables -->
                    <div class="new-arrival-card">
                        
                        </div>       
        <!-- call to action area end - vegetables -->





        <!-- recent collections area start -->
        <div class="recent-collections">
            <div class="section-wrap recent-collections-wrap">
               

                   
                            </div>
                        </div>
                    </div>
                </div>
                <!-- recent collection products end -->



                <!-- lightbox area start -->
                <div class="lightbox">
                    <div class="lightbox-content">
                        <div class="lightbox-header">
                            <p>Category: <span id="image-category">Undefined</span></p>
                            <div class="lightbox-close-btn">
                                <span id="close-lightbox"></span>
                            </div>
                        </div>

                        <div class="rec-info">
                            <p>Product Name: <span id="rec-name">Red Apple</span></p>
                            <p>Product Price: <span id="rec-price">320</span></p>
                            <p>Total Sales: <span id="rec-sales">420</span><span id="rec-unit">Kg+</span></p>
                        </div>

                        <div class="image-wrapper">
                            <img src="img/fruits/apple.jpg" alt="project preview">
                        </div>

                        <div class="rec-footer">
                            <p>Status: <span id="rec-status">Available</span></p>
                            <button class="lightbox-buy-btn">Buy now</button>
                        </div>
                    </div>
                </div>

                <!-- lightbox left & right slide button -->
                <div class="lightbox-arrow">
                    <span class="icon-angle-left" id="left-arrow"></span>
                    <span class="icon-angle-right" id="right-arrow"></span>
                </div>

                <!-- lightbox shadow -->
                <div class="lightbox-shadow"></div>

                <!-- lightbox area end -->
            </div>
        </div>
        <!-- recent collections area end -->





        <!-- featured products section start -->
        <div class="featured-product-section" id="products">
            <div class="section-wrap">
                <div class="section-title">
                    <h1>Featured Products</h1>
                </div>

                <!-- vegetables -->
                <div class="featured-product-wrap vegetables">
                    <div class="sub-section-title">
                        <p>Fresh Vegetables</p>
                        <a href="#">See more <span class="icon-angle-double-right"></span></a>
                    </div>
                </div>



                <div class="row">
                        <div class="d-flex">
                            @foreach ($products as $product)
                                <div class="product-wrap broccoli">
                                    <div class="product-img">
                                        <img src="{{ url('storage/images/' . $product->image) }}" alt=""
                                            title="" />
                                    </div>

                                    <div class="product-icons">
                                        <div class="add-to-favorite"><span class="icon-heart"></span></div>
                                        <p><span class="discount">20</span>% off</p>
                                    </div>

                                    <div class="product-description">
                                        <p class="product-name">{{ $product->name }}</p>
                                        <p class="price">
                                            <strong>Price:</strong>
                                            <del>
                                                <span class="f-product-price">{{ $product->price }}</span>Rs/pcs
                                            </del>
                                            <ins>
                                                <span class="f-cur-price">000</span>Rs/kg
                                            </ins>
                                            <span class="f-product-unit">pcs</span>
                                        </p>
                                        <div class="add-to-cart-btn">
                                            <p><span class="icon-cart-plus"></span> Add to Cart</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>


            {{-- test start --}}

            {{-- test end --}}

            <!-- shopping cart area start -->
            <!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
            <!-- selected and favorite product items area start -->
            <div class="shopping-cart-area" id="product-cart-area">
                <div class="shopping-cart-wrap">
                    <div class="product-cart-menu">
                        <div class="cart-menu-items">
                            <h2 id="selected-products" class="active-cart-menu">Selected Products</h2>
                            <h2 id="favorite-products">Favorite Products</h2>
                        </div>

                        <div class="cart-close-btn">
                            <button>Close Cart</button>
                        </div>
                    </div>

                    <div class="cart-contents-header">
                        <div class="total-cart-items">
                            <p id="total-selected" class="active-product-counter">
                                <strong>Total Selected: </strong>
                                <span>No item found</span>
                            </p>
                            <p id="total-favorite">
                                <strong>Total Favorite: </strong>
                                <span>No item found</span>
                            </p>
                        </div>

                        <div class="buying-product-title">
                            <div class="total-buying-item">
                                <p>
                                    <strong>Total Buying Items: </strong>
                                    <span id="total-buying-item-counter">0</span>
                                </p>
                            </div>
                            <div class="buy-items-button">
                                <button id="buy-items">Buy Items</button>
                            </div>
                        </div>
                    </div>

                    <div class="cart-contents-area shopping-cart-contents-area active-cart-content">
                        <!-- selected product contents -->
                    </div>
                    <div class="cart-wishlist-area shopping-cart-contents-area">
                        <!-- favorite product contents -->
                    </div>

                </div>

            </div>
            <!-- selected and favorite product items area end -->



            <!-- buying details/shoping cart area start -->
            <div class="buying-details-area">
                <div class="buying-details-wrap">
                    <div class="shop-title">
                        <h1>Shopping Cart</h1>
                    </div>

                    <div class="shopping-details-wrap">
                        <div class="shopping-details-header">
                            <div class="shopping-details">
                                <div class="shop-detail product-sl">
                                    <h2>SL No.</h2>
                                </div>
                                <div class="shop-detail product-name">
                                    <h2>Product Name</h2>
                                </div>
                                <div class="shop-detail regular-price">
                                    <h2>Regular Price</h2>
                                </div>
                                <div class="shop-detail discount">
                                    <h2>Discount</h2>
                                </div>
                                <div class="shop-detail present-price">
                                    <h2>Present Price</h2>
                                </div>
                                <div class="shop-detail product-quantity">
                                    <h2>Quantity</h2>
                                </div>
                                <div class="shop-detail total-amount">
                                    <h2>Total Price</h2>
                                </div>
                                <div class="shop-detail remove-all-btn">
                                    <button id="remove-all-items">Remove All</button>
                                </div>
                            </div>
                        </div>

                        <div class="shopping-details-content">
                            <!-- shopping details content -->
                        </div>
                    </div>

                    <div class="buying-details-footer">
                        <div class="calculate-buying-details">
                            <div class="calculate-total-items">
                                <h2>Total Items: </h2>
                                <p><span>000</span></p>
                            </div>

                            <div class="calculate-total-quantity">
                                <h2>Total Quantity: </h2>
                                <p>total quantity display here</p>
                            </div>

                            <div class="calculate-total-amount">
                                <h2>Total Amount: </h2>
                                <p><span>000</span> Rs.Kg</p>
                            </div>
                        </div>

                        <div class="confirm-order-button">
                            <form action="{{ route('checkout') }}">
                                <button id="confirm-order-btn">Confirm Order</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="close-buy-area">
                    <div id="close-buy-area-btn"></div>
                </div>
            </div>
            <!-- buying details/shoping cart area end -->
            <!-- /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ -->
            <!-- shopping cart area end -->


            <!-- customer support card start -->
            <div class="support-center">
                <div class="support-center-wrap">
                    <div class="support-icon-area">
                        <span class="icon-headset"></span>
                    </div>

                    <div class="close-support-center-card">
                        <span class="icon-times"></span>
                    </div>

                    <div class="support-info-area">
                        <p class="hotline"><strong>Hotline:</strong></p>
                        <p class="phone"><span>+88 0123-456-789</span></p>
                        <p class="phone"><span>+88 0123-456-789</span></p>
                        <p class="email"><strong>Email:</strong></p>
                        <p class="email-id"><span>info@gmail.com</span></p>
                    </div>
                </div>
            </div>
            <!-- customer support card end -->

<script>
    function redirectToCheckout() {
        window.location.href = "/checkout";
    }
</script>


            <!-- section content area end -->
        @endsection

        @section('scripts')
            <script src="{{ asset('js/script.js') }}"></script>
        @endsection

        </body>

        </html>
