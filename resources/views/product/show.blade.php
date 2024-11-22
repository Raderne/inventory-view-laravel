<x-wrapper>
    <x-slot name="header">
        {{ $product->name }}
    </x-slot>
    <div class="h-full">
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-black rounded-2xl p-4 col-span-2">
                <h1 class="text-2xl text-center text-white font-semibold font-hanken-grotesk mb-4">Product Information</h1>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <p class="text-white text-sm">Name</p>
                        <h1 class="text-white text-2xl font-semibold">{{ $product->name }}</h1>
                    </div>
                    <div>
                        <p class="text-white text-sm">Price</p>
                        <h1 class="text-white text-2xl font-semibold">${{ $product->price }}</h1>
                    </div>
                    <div>
                        <p class="text-white text-sm">Quantity</p>
                        <h1 class="text-white text-2xl font-semibold">{{ $product->stock }}</h1>
                    </div>
                    <div>
                        <p class="text-white text-sm">Created At</p>
                        <h1 class="text-white text-2xl font-semibold">{{ $product->created_at->diffForHumans() }}</h1>
                    </div>
                </div>
            </div>
            <div class="bg-black rounded-2xl p-4">
                <h1 class="text-2xl text-center text-white font-semibold font-hanken-grotesk mb-4">Product Actions</h1>
                <div class="grid grid-cols-1 gap-4 mt-4">
                    <a href="" class="bg-light_blue text-black text-center py-2 rounded-2xl text-xl hover:bg-light_blue/70 transition-300 ">Edit</a>
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white text-center py-2 rounded-2xl text-xl w-full transition-300  hover:bg-red-500/70">Delete</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="pt-10">
            <div class="border border-red-500 rounded-xl h-full">
                put in product history here
            </div>
        </div>
    </div>


</x-wrapper>