<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutorial</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="{{asset('css/productP.css')}}" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

</head>

<body>
<main class="container">

    <!-- Left Column / Headphones Image -->
    <div class="left-column">
        @if ($product)
                      <img src="{{ asset('storage/images/' . $product->image) }}" alt="" title="" />
                      @else
                      <p>Product Image not found.</p>
                  @endif
    </div>


    <!-- Right Column -->
    <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
             <span> @if ($product)
                             <p class="product-name">Category: {{ $product->category->name }}</p>
                               @else
                               <p>Product not found.</p>
                           @endif</span>
            <h1>{{ $product->name }}</h1>

        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

            <!-- Product Color -->


            <!-- Cable Configuration -->

        </div>

        <!-- Product Pricing -->
        <p>Description: {{ $product->description }}</p>
           Price:  <span>{{$product->price}} Rs/Kg</span>

        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
<script src="script.js" charset="utf-8"></script>
</body>
</html>
