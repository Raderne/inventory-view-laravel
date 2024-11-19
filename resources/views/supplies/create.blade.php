<x-wrapper>
    <x-slot:header>
        Create a Supplier
    </x-slot:header>

    <section class="h-full overflow-hidden -mt-6">
        <div class="flex-center h-full">
            <form action="/suppliers" method="post" class="min-w-[40vw] bg-black/5 p-10 pt-4 rounded-xl space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Name')" class="font-hanken-grotesk text-xl" />
                    <x-text-input id="name" class="block mt-1 w-full border border-black/20 px-4 py-2" type="name" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" class="font-hanken-grotesk text-xl" />
                    <x-text-input id="email" class="block mt-1 w-full border border-black/20 px-4 py-2" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <x-primary-button>
                    Create Supplier
                </x-primary-button>
            </form>
        </div>
    </section>
</x-wrapper>