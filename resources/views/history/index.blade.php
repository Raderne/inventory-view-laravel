<x-wrapper>
    <x-slot name="header">
        Inventory History
    </x-slot>

    <section class="">
        @foreach ($inventoryLogs as $logs)
        <h1 class="first:mt-0 mt-4 text-xl font-semibold font-hanken-grotesk">
            {{ $logs[0]->product->name }}
        </h1>
        @foreach ($logs as $log)
        <div class="grid grid-cols-4 items-center">
            <div class="flex items-center space-x-4">
                <div class="w-10 h-10 bg-black flex-center rounded-lg">
                    <h1 class="text-white font-bold uppercase">
                        {{ $log->product->name[0] }}
                    </h1>
                </div>
                <div class="flex flex-col">
                    <h1 class="text-lg font-semibold">
                        {{ $log->product->name }}
                    </h1>
                    <p class="text-xs text-black/60">
                        {{ $log->product->supplier->name ?? 'No Supplier' }}
                    </p>
                </div>
            </div>
            <p class="text-2xl text-black/70">${{ $log->product->price }}</p>
            <p class="text-2xl">{{ $log->product->stock }}</p>
            <p class="text-lg text-black/70">{{ $log->product->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
        @endforeach
    </section>
</x-wrapper>