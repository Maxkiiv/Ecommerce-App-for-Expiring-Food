<div>
    @props(['product_data' => []])
    <!-- Products grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($product_data as $data)
            <!-- Product 1 -->
            <div class="bg-white-REMOVED p-4 rounded-lg shadow">
                <img src="{{ asset('storage' . $data->image_path . $data->image_name) }}" alt="Product 1"
                    class="w-full object-cover mb-4 rounded-lg">
                <a href="{{ $data->getlink() }}"
                    class="text-lg font-semibold mb-2 h-12 line-clamp-2 leading-6">{{ $data->title }}</a>
                <p class="font-bold my-2">{{ strtoupper($data->category) }}</p>
                <div class="flex items-center mb-4">
                    <span class="text-lg font-bold text-primary">$19.99</span>
                    <span class="text-sm line-through ml-2">$24.99</span>
                </div>
                <button
                    class="bg-primary border border-transparent hover:bg-transparent hover:border-primary text-white hover:text-primary font-semibold py-2 px-4 rounded-full w-full">Add
                    to Cart</button>
            </div>
        @endforeach


    </div>
</div>
