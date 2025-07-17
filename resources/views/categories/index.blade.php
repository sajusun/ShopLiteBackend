<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Browse by Categories</h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('user.products.index',  'category='.$category->name) }}"
                   class="bg-white p-6 rounded-lg shadow hover:shadow-md text-center transition duration-300">
                    <img src="{{ asset('storage/'.$category->randomProductImage() ?? 'default-category.jpg') }}"
                         alt="{{ $category->name }}"
                         class="h-24 w-full object-cover mb-4 rounded">
                    <h3 class="text-lg font-semibold text-gray-700">{{ $category->name }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
