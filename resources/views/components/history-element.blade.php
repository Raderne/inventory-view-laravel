@props(['log'])

<div class="grid grid-cols-4 items-center pl-4 border-l-2 border-black/70">
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
    <p class="text-2xl text-black/70">{{ $log->quantity_changed }} is {{ $log->type == "add" ? "added": "removed" }}</p>
    <p class="text-2xl">{{ $log->product->stock }}</p>
    <p class="text-lg text-black/70">{{ $log->updated_at->diffForHumans() }}</p>
</div>