
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LiteShop | Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<!-- Navbar -->
<nav class="bg-white shadow-sm p-5 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-indigo-700">LiteShop</h1>
    <div>
        <a href="#" class="text-gray-600 hover:text-indigo-600 mr-4">Cart (0)</a>
        <a href="/login" class="text-gray-600 hover:text-indigo-600">Login</a>
    </div>
</nav>

<!-- Hero Banner -->
<div class="relative bg-indigo-600 text-white text-center py-20 px-4">
    <h2 class="text-4xl font-extrabold">Discover the Best Deals Today!</h2>
    <p class="mt-3 text-lg">Shop the latest products with exclusive offers</p>
    <a href="#products" class="mt-6 inline-block bg-white text-indigo-600 font-semibold px-6 py-3 rounded-full hover:bg-gray-100 transition">Shop Now</a>
    <img src="https://source.unsplash.com/featured/1920x500?shopping" alt="Banner" class="absolute inset-0 w-full h-full object-cover opacity-20">
</div>

<!-- Categories Section -->
<div class="container mx-auto px-6 py-12">
    <h3 class="text-3xl font-bold text-gray-800 mb-8">Shop by Category</h3>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($categories as $category)
            <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">{{ $category->name }}</h4>
                    <a href="#" class="text-indigo-600 text-sm font-medium hover:underline">Explore</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Products Section -->
<div id="products" class="container mx-auto px-6 py-12">
    <h3 class="text-3xl font-bold text-gray-800 mb-8">Featured Products</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        @foreach($products as $product)
            <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-xl transition">
                @if($product->image)
                    <img src="{{ asset('uploads/products/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                @else
                    <img src="" alt="{{ $product->name }}" class="w-full h-48 object-cover">

                @endif
                <div class="p-4">
                    <h4 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h4>
                    <p class="text-gray-500 text-sm mt-1">{{ $product->category->name }}</p>
                    <div class="mt-3 flex items-center justify-between">
                        <span class="text-indigo-600 text-lg font-bold">${{ $product->price }}</span>
                        <button class="bg-indigo-600 text-white text-sm px-3 py-1.5 rounded hover:bg-indigo-700">Add to Cart</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="bg-white border-t mt-16 text-center py-6 text-gray-500 text-sm">
    &copy; {{ date('Y') }} LiteShop. All rights reserved.
</footer>

</body>
</html>
