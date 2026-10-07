@props(['title' => 'Ecommerce', 'subtitle' => 'products'])
<section class="w-full mx-auto bg-nordic-gray-light flex pt-12 md:pt-0 md:items-center bg-cover bg-right"
    style="max-width:1600px-REMOVED; height: 32rem; background-image: url('https://images.unsplash.com/photo-1573920011462-eb3003086611?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">

    <div class="container mx-auto">

        <div class="flex flex-col w-full lg:w-1/2 justify-center items-start  px-6 tracking-wide">
            <h1 class="text-black text-2xl my-4">{{ $title }}</h1>
            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black"
                href="#">{{ $subtitle }}</a>

        </div>

    </div>

</section>
