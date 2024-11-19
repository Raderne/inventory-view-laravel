<x-wrapper>
    <x-slot:header>
        Suppliers
    </x-slot:header>

    <section class="h-full overflow-hidden flex flex-col justify-around">
        <div class="flex gap-x-5">
            <div class="flex-1 p-4">
                <a href="/suppliers/create" class="border-4 border-black/30 border-dashed h-full grid place-items-center cursor-pointer min-h-[224px]">
                    <i class="bx bx-plus text-7xl text-black/30"></i>
                </a>
            </div>
            <div class="flex items-center gap-3 flex-wrap max-w-screen-lg">
                @foreach ($limitedSupplier as $loopIndex => $supp)
                @php
                $bgColor = match ($loopIndex % 3){
                0 => 'bg-cards-1',
                1 => 'bg-cards-2',
                2 => 'bg-cards-3',
                }
                @endphp
                <article class="w-52 h-64 rounded-lg p-4 flex flex-col justify-between {{ $bgColor }}">
                    <div>
                        <h1 class="text-lg font-bold">{{ $supp->name }}</h1>
                        <p class="text-sm break-words">{{ $supp->email }}</p>
                    </div>
                    <div>
                        <button form="delete-supplier-form-{{ $supp->id }}" class="bg-red-700/50 hover:bg-red-700/70 transition-300 text-white  px-4 py-2 rounded">Remove</button>
                    </div>
                    <form
                        action="/suppliers/{{ $supp->id }}"
                        method="post"
                        class="hidden"
                        id="delete-supplier-form-{{ $supp->id }}">
                        @csrf
                        @method('delete')
                    </form>
                </article>
                @endforeach
            </div>
        </div>
        <div>
            <h1 class="text-2xl font-semibold my-6 font-hanken-grotesk">All Suppliers</h1>
            <div class="overflow-y-auto max-h-[30vh]">
                @if ($supplier->isEmpty())
                <p class="text-center text-lg text-black/50">No suppliers found</p>
                @else
                @foreach ($supplier as $supp)
                <article class="bg-white p-4 rounded-lg shadow-md flex items-center justify-between border-b border-black/20 hover:bg-cards-1 transition-150 even:bg-cards-1/80">
                    <div>
                        <h1 class="text-lg font-bold">{{ $supp->name }}</h1>
                        <p class="text-sm break-words">{{ $supp->email }}</p>
                    </div>
                    <div>
                        <a href="/supplier/{{ $supp->id }}"
                            class="bg-red-700/50 hover:bg-red-700/70 transition-300 text-white  px-4 py-2 rounded">
                            Remove
                        </a>
                    </div>
                </article>
                @endforeach
                @endif
            </div>
        </div>
    </section>
</x-wrapper>