<x-wrapper>
    <x-slot:header>
        Edit Product : {{ $product->name }}
    </x-slot:header>

    @auth
    <div class="flex justify-center h-full">
        <form method="post" action="/products/{{ $product->id }}" class="space-y-6 max-w-screen-md">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Product Name')" />
                <x-text-input id="name" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="text" name="name" :value="old('name') ?? $product->name" required autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- to add product -->
            <x-sku :value="$product->sku" />
            <div class="flex items-center gap-x-2">
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="text"
                        name="price" :value="old('price') ?? $product->price" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="stock" :value="__('stock')" />
                    <x-text-input id="stock" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="number" name="stock" :value="old('stock') ?? $product->stock" required />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>
            </div>
            <x-primary-button
                class="bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-white">
                Update Product
            </x-primary-button>
        </form>
    </div>
    @endauth
</x-wrapper>