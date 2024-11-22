<div class="col-span-2 overflow-y-auto max-h-[260px] relative border border-black/50 rounded-2xl py-4 px-2 space-y-4">
    <div class="grid grid-cols-4 font-hanken-grotesk px-4">
        <p class="text-black/50">Name</p>
        <p class="text-black/50 text-center">Price</p>
        <p class="text-center text-black/50">Stock</p>
        <p class="text-black/50 text-center">Created At</p>
    </div>
    @foreach ($products as $product)
    <a href="products/{{ $product->id }}" class="grid grid-cols-4 items-center hover:bg-black/30 rounded-lg px-4 py-1">
        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 bg-black flex-center rounded-lg">
                <h1 class="text-white font-bold uppercase">
                    {{ $product->name[0] }}
                </h1>
            </div>
            <div class="flex flex-col">
                <h1 class="text-lg font-semibold">
                    {{ $product->name }}
                </h1>
                <p class="text-xs text-black/60">
                    {{ $product->supplier->name ?? 'No Supplier' }}
                </p>
            </div>
        </div>
        <p class="text-2xl text-black/70 text-center">${{ $product->price }}</p>
        <p class="text-2xl text-center">{{ $product->stock }}</p>
        <p class="text-lg text-black/70 text-center">{{ $product->created_at->diffForHumans() }}</p>
    </a>
    @endforeach

</div>