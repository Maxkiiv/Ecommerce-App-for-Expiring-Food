<x-layouts.layout-default>

    <x-structure.heroes.basic subtitle="Homepage" />

    <x-store.home.categories-basic />
    <div class="container mx-auto px-4 mt-4 mb-12">
        <h2 class="text-3xl font-bold border-solid border-b-4 border-b-primary mb-8">Featured</h2>
        <x-store.products.tailstore-grid :product_data="$featured_data" />
    </div>

    <div class="container mx-auto px-4 mt-4 mb-12">
        <h2 class="text-3xl font-bold border-solid border-b-4 border-b-primary mb-8">Top Selling</h2>
        <x-store.products.tailstore-grid :product_data="$product_data" />
    </div>

</x-layouts.layout-default>
