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
                    <img class="" src="{{asset('images/hero/01.png')}}" alt="">
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

        
        <!-- service section start -->
        <div class="services" id="services">
            <div class="section-wrap">
                <div class="services-description">
                    <div class="service-description-text">
                        <div class="service-description-title">
                            <h1>What we provide?</h1>
                        </div>

                        <div class="service-description-details">
                            <p>Welcome to TastyTraders, your go-to destination for comprehensive financial education and options trading insights. Our mission is to empower traders of all experience levels with the knowledge and strategies needed to navigate the financial markets confidently.
                            </p>
                        </div>

                        <div class="service-description-list">
                            <div class="service-description-list-item">
                                <span class="icon-check-circle"></span>
                                <p class="service-list-item-title">Online Platform: Tastytraders would likely have an online platform that allows customers to browse through a variety of fruits and vegetables conveniently from their website.</p>
                            </div>

                            <div class="service-description-list-item">
                                <span class="icon-check-circle"></span>
                                <p class="service-list-item-title">Product Catalog: They would maintain a comprehensive product catalog, listing various types of fresh fruits and vegetables along with their prices and available quantities.</p>
                            </div>

                            <div class="service-description-list-item">
                                <span class="icon-check-circle"></span>
                                <p class="service-list-item-title">Discounts and Offers: Tastytraders might provide regular discounts, special offers to attract and retain customers.</p>
                            </div>

                            <div class="service-description-list-item">
                                <span class="icon-check-circle"></span>
                                <p class="service-list-item-title">Seasonal and Local Produce: They may promote seasonal and locally sourced fruits and vegetables, emphasizing freshness and supporting local farmers.</p>
                            </div>
                        </div>

                        <div class="service-description-button">
                            <button>Learn More</button>
                        </div>
                    </div>

                    <div class="service-description-image">
                        <img src="{{asset('images/background/service.jpg')}}" alt="service_img">
                    </div>
                </div>
            </div>
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
                    <h1></h1>
                </div>

                <!-- vegetables -->
                <div class="featured-product-wrap vegetables">
                    <div class="sub-section-title">
                        <p></p>
                        {{-- <a href="#">See more <span class="icon-angle-double-right"></span></a> --}}
                    </div>
                </div>



                {{-- <div class="row">
                    @foreach ($categories as $category)
                        <div>
                            <h2>{{ $category->name }}</h2>
                        </div>
                        <div class="d-flex">
                            @foreach ($category->product as $product)
                                <div class="product-wrap broccoli">
                                    <a href="{{route('productPage', $product->id)}}">
                                    <div class="product-img">
                                        <img src="{{ url('storage/images/' . $product->image) }}" alt=""
                                            title="" />
                                    </div>

                                    <div class="product-icons">
                                        <div class="add-to-favorite"><span class="icon-heart"></span></div>
                                        <p><span class="discount">{{ $product->discount['percentage'] }}</span>%</p>
                                    </div>

                                    <div class="product-description">
                                       <a href="{{route('productPage', $product->id)}}"><p class="product-name">{{ $product->name }}</p>
                                        <p class="price">
                                            <strong>Price:</strong>
                                            <del>
                                                <span class="f-product-price">{{ $product->price }}</span>Rs/pcs
                                            </del>
                                            <ins>
                                            </ins>
                                            <span class="f-product-unit">pcs</span>
                                        </p>
                                       </a>
                                        <div class="add-to-cart-btn">
                                            <p><span class="icon-cart-plus"></span> Add to Cart</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div> --}}

                {{-- <div class="row">
                    @foreach ($discountedProducts as $product)
                        <div>
                            @foreach ($categories as $category)
                                
                            <h2>{{ $category->name }}</h2>
                        </div>
                        <div class="d-flex">
                            <div class="product-wrap broccoli">
                                <div class="product-img">
                                    <img src="{{ url('storage/images/' . $product->image) }}" alt=""
                                    title="" />
                                </div>
                                
                                <div class="product-icons">
                                    <div class="add-to-favorite"><span class="icon-heart"></span></div>
                                    <p><span class="discount">{{ round($product->discount_info['discount_percent'])}}</span>%</p>
                                </div>
                                
                                <div class="product-description">
                                    <a href="{{route('productPage', $product->id)}}"><p class="product-name">{{ $product->name }}</p>
                                        <p class="price">
                                            <strong>Price:</strong>
                                            <del>
                                                <span class="f-product-price">{{ $product->price }}</span>Rs/pcs
                                            </del>
                                            <ins>
                                            </ins>
                                            <span class="f-product-unit">pcs</span>
                                        </p>
                                    </a>
                                    <div class="add-to-cart-btn">
                                        <p><span class="icon-cart-plus"></span> Add to Cart</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div> --}}

                <div class="row">
                    @foreach ($categories as $category)
                        <div>
                            <h2>{{ $category->name }}</h2>
                        </div>
                        <div class="d-flex">
                            @foreach (collect($discountedProducts)->where('category_id', $category->id) as $product)
                                <div class="product-wrap broccoli">
                                    <div class="product-img">
                                        <img src="{{ url('storage/images/' . $product->image) }}" alt="" title="" />
                                    </div>
                
                                    <div class="product-icons">
                                        <div class="add-to-favorite"><span class="icon-heart"></span></div>
                                        <p><span class="discount">{{ round($product->discount_info['discount_percent'])}}</span>%</p>
                                    </div>
                
                                    <div class="product-description">
                                        <a href="{{ route('productPage', $product->id) }}">
                                            <p class="product-name">{{ $product->name }}</p>
                                            <p class="price">
                                                <strong>Price:</strong>
                                                <del>
                                                    <span class="f-product-price">{{ $product->price }}</span>Rs/pcs
                                                </del>
                                                <ins>
                                                </ins>
                                                <span class="f-product-unit">pcs</span>
                                            </p>
                                        </a>
                                        <div class="add-to-cart-btn">
                                            <p><span class="icon-cart-plus"></span> Add to Cart</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                

             <!-- customer review section start -->
        <div class="customer-review">
            <div class="section-wrap">
                <div class="section-title customer-review-title">
                    <p>Customer Review <span class="icon-angle-double-right"></span></p>
                </div>

                <div class="customer-review-wrap">
                    <div class="review-items">
                        <div class="review-content">
                            <div class="customer-info">
                                <div class="customer-image">
                                    <img src="{{asset('images/customers/customer_5.jpg')}}" alt="review1">
                                </div>
                                <div class="customer-details">
                                    <h2 class="name">Jhon Doe</h2>
                                    <p class="country">Pakistan</p>
                                </div>
                            </div>

                            <div class="review-text">
                                <p class="review"><span class="icon-quote-left"></span>Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Itaque dolor animi harum tempore. Harum veritatis aspernatur
                                    eos laudantium at iste repellendus quaerat molestias ete earum quam deleniti hic
                                    dolor
                                    architecto fuga tenetur ducimus eius ipsam Adipisci magnam sit.<span
                                        class="icon-quote-right"></span></p>
                            </div>
                        </div>

                        <div class="review-content">
                            <div class="customer-info">
                                <div class="customer-image">
                                    <img src="{{asset('images/customers/customer_4.jpg')}}" alt="review1">
                                </div>
                                <div class="customer-details">
                                    <h2 class="name">Jhon Doe</h2>
                                    <p class="country">Malaysia</p>
                                </div>
                            </div>

                            <div class="review-text">
                                <p class="review"><span class="icon-quote-left"></span>Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Itaque dolor animi harum tempore. Harum veritatis aspernatur
                                    eos laudantium at iste repellendus quaerat molestias ete earum quam deleniti hic
                                    dolor
                                    architecto fuga tenetur ducimus eius ipsam Adipisci magnam sit.<span
                                        class="icon-quote-right"></span></p>
                            </div>
                        </div>

                        <div class="review-content">
                            <div class="customer-info">
                                <div class="customer-image">
                                    <img src="{{asset('images/customers/customer_3.jpg')}}" alt="review1">
                                </div>
                                <div class="customer-details">
                                    <h2 class="name">Jhon Doe</h2>
                                    <p class="country">Africa</p>
                                </div>
                            </div>

                            <div class="review-text">
                                <p class="review"><span class="icon-quote-left"></span>Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Itaque dolor animi harum tempore. Harum veritatis aspernatur
                                    eos laudantium at iste repellendus quaerat molestias ete earum quam deleniti hic
                                    dolor
                                    architecto fuga tenetur ducimus eius ipsam Adipisci magnam sit.<span
                                        class="icon-quote-right"></span></p>
                            </div>
                        </div>

                        <div class="review-content">
                            <div class="customer-info">
                                <div class="customer-image">
                                    <img src="{{asset('images/customers/customer_2.jpg')}}" alt="review1">
                                </div>

                                <div class="customer-details">
                                    <h2 class="name">Jhon Doe</h2>
                                    <p class="country">Dubai</p>
                                </div>
                            </div>

                            <div class="review-text">
                                <p class="review"><span class="icon-quote-left"></span>Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Itaque dolor animi harum tempore. Harum veritatis aspernatur
                                    eos laudantium at iste repellendus quaerat molestias ete earum quam deleniti hic
                                    dolor
                                    architecto fuga tenetur ducimus eius ipsam Adipisci magnam sit.<span
                                        class="icon-quote-right"></span></p>
                            </div>
                        </div>

                        <div class="review-content">
                            <div class="customer-info">
                                <div class="customer-image">
                                    <img src="{{asset('images/customers/customer_1.jpg')}}" alt="review1">
                                </div>

                                <div class="customer-details">
                                    <h2 class="name">Jhon Doe</h2>
                                    <p class="country">Australia</p>
                                </div>
                            </div>

                            <div class="review-text">
                                <p class="review"><span class="icon-quote-left"></span>Lorem ipsum dolor sit amet
                                    consectetur
                                    adipisicing elit. Itaque dolor animi harum tempore. Harum veritatis aspernatur
                                    eos laudantium at iste repellendus quaerat molestias ete earum quam deleniti hic
                                    dolor
                                    architecto fuga tenetur ducimus eius ipsam Adipisci magnam sit.<span
                                        class="icon-quote-right"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- customer review section end --


            {{-- test start --}}
`
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
