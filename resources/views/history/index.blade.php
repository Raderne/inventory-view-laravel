<x-wrapper>
    <x-slot name="header">
        Inventory History
    </x-slot>

    <section class="">
        @foreach ($inventoryLogs as $logs)
        <h1 class="first:mt-0 mt-8 text-xl font-semibold font-hanken-grotesk">
            {{ $logs[0]->product->name }}
        </h1>
        @foreach ($logs as $log)
        <x-history-element :log="$log" />
        @endforeach
        @endforeach
    </section>
</x-wrapper>