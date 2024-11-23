@props(['name', "sku" => "", "value" => null])

<div>
    <x-input-label for="sku" :value="__('Product sku')" />
    <div class="flex  items-center space-x-2">
        <x-text-input id="sku" class="block mt-1 w-full px-4 py-2 border focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent font-hanken-grotesk" type="text" name="sku" :value="old('sku') ?? $value"
            required />
        <x-input-error :messages="$errors->get('sku')" class="mt-2" />
        <button
            class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 focus:ring-offset-white h-full"
            type="button"
            id="generate-sku">
            Generate
        </button>
    </div>
</div>