<x-wrapper>
    <x-slot:header>
        Products
    </x-slot:header>

    <section class="h-full grid grid-rows-2">
        <div class="pl-4 py-2 grid grid-cols-3 gap-x-4">
            <div class="bg-black rounded-2xl relative overflow-hidden overflow-x-auto p-4">
                <div class="h-full">
                    <h1 class="text-2xl text-center text-white font-semibold font-hanken-grotesk">Overall Information</h1>
                </div>
                <div class="absolute top-0 -left-12 z-10 transform -rotate-45 w-40 h-5 bg-orange-500"></div>
                <div class="absolute top-10 -left-12 z-10 transform -rotate-45 w-40 h-4 bg-orange-500"></div>
            </div>
            @include('components.create-product')
        </div>
        <div class="pl-4 py-2 grid grid-cols-3 gap-x-4">
            <!-- list of products -->
            @include('components.products-list')

            <div class="bg-black rounded-2xl flex-center flex-col max-h-[260px] text-center overflow-hidden relative">
                <p class="text-white/60 text-sm">
                    Better Inventory Management With
                </p>
                <h1 class="text-5xl font-semibold font-hanken-grotesk text-white">
                    Inventory<span class="text-orange-500"> View</span>
                </h1>
                <div class="absolute bottom-0 -right-12 transform -rotate-45 w-40 h-5 bg-orange-500"></div>
                <div class="absolute bottom-10 -right-12 transform -rotate-45 w-40 h-4 bg-orange-500"></div>
            </div>
        </div>
    </section>
</x-wrapper>