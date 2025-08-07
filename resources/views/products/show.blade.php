<x-app-layout>
    <div class="max-w-5xl mx-auto p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/' . $product->image) }}" alt=""
                     class="w-full object-cover rounded-lg shadow">
            </div>

            <div class="w-full md:w-1/2">
                <h2 class="text-3xl font-bold mb-4">{{ $product->name }}</h2>
                <p class="text-xl text-green-600 font-bold mb-3">${{ $product->price }}</p>
                <p class="mb-4 text-gray-700">{{ $product->description }}</p>

                <form method="POST" action="{{ route('cart.add', $product->id) }}">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" class="border p-2 w-20 rounded mb-3">
                    <br>
                    <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Add to
                        Cart
                    </button>
                </form>
                <div class="flex items-center py-2 w-full">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= floor($averageRating))
                            <i class="fas fa-star text-yellow-500"></i>
                        @elseif ($i - $averageRating < 1)
                            <i class="fas fa-star-half-alt text-yellow-500"></i>
                        @else
                            <i class="far fa-star text-yellow-500"></i>
                        @endif
                    @endfor
                    <span class="text-yellow-500 px-1">({{ number_format($averageRating, 1) }})</span>
                </div>

            </div>
        </div>

        <div class="px-4 py-2 w-full">
            <form action="{{ route('product.rating.store',$product->id) }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="flex space-x-2">
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" class="hidden">
                        <label for="star{{ $i }}" class="cursor-pointer">
                            <i class="fas fa-star text-gray-300 active:text-yellow-500"
                               onclick="this.classList.toggle('text-yellow-500')"></i>
                        </label>
                    @endfor
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit Rating</button>
            </form>

        </div>

        <div class="max-w-xl">
            <div class="mt-4">
                <h3 class="text-lg font-semibold mb-2 text-gray-500 border-b">Customer Reviews</h3>
                @forelse ($reviews as $review)
                    <div class="border-b py-2">
                        <p class="text-sm">{{ $review->review }}</p>
                        <span class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                @empty
                    <p>No reviews yet.</p>
                @endforelse
                <details class="py-4 transition">
                    <summary
                        class="cursor-pointer text-white px-4 py-2 rounded-sm bg-gray-500
                         hover:bg-gray-600 transition list-none max-w-full">
                        Submit Your Reviews
                    </summary>
                    <form action="{{ route('product.review.store',$product->id) }}" method="POST"
                          class="py-2 shadow rounded transition">
                        @csrf
                        <textarea name="review" rows="2" class="w-full border p-2 mt-2"
                                  placeholder="Write your review here..."></textarea>
                        <button type="submit"
                                class="bg-gray-500 hover:bg-gray-600 text-sm text-white rounded py-1 px-4 mt-2 ml-2">
                            Submit
                        </button>
                    </form>

            </details>
            </div>
            <div class="mt-4">
                {{ $reviews->links() }} <!-- Laravel pagination links -->
            </div>
        </div>


    </div>
    </div>


</x-app-layout>
