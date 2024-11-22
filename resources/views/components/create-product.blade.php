<div class="h-full flex flex-col col-span-2 border border-black/50 rounded-2xl">
    @auth
    <h1 class="text-xl font-semibold font-hanken-grotesk pl-4 pt-2">Add a Product</h1>

    <form method="post" action="/products/create" class="h-full grid grid-cols-2 gap-x-2">
        @csrf

        <!-- for suppliers -->
        <div class="p-4 space-y-4">
            <div>
                <x-input-label for="name" :value="__('Product Name')" />
                <x-text-input id="name" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="text" name="name" :value="old('name')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="supplier" :value="__('Supplier')" />
                @if ($suppliers && count($suppliers) > 0)
                <select name="supplier_id" id="supplier_id"
                    class="w-full p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk">
                    <option value="default" selected disabled>Supplier</option>
                    @foreach ($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('supplier_id')" class="mt-2" />
                @else
                <div class="mt-4">
                    <a href="/suppliers" class="px-4 py-2 border border-black/50 rounded-lg">
                        add a supplier first
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- to add product -->
        <div class="p-4 space-y-4">
            <x-sku />
            <div class="flex items-center gap-x-2">
                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="text"
                        name="price" :value="old('price')" required />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="stock" :value="__('stock')" />
                    <x-text-input id="stock" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="number" name="stock" :value="old('stock')" required />
                    <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                </div>
            </div>
            <x-primary-button
                class="bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-white">
                Create Product
            </x-primary-button>
        </div>
    </form>
    @endauth

    @guest
    <div class="h-full flex-center border-4 border-dashed border-black/30 rounded-3xl">
        <h1
            class="text-3xl text-black/30 font-bold font-hanken-grotesk">
            Login To Add a Product
        </h1>
    </div>
    @endguest
</div>