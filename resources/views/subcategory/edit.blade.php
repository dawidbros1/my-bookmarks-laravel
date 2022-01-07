<x-main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edycja podkategorii') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors> </x-jet-validation-errors>

    <x-form-section action="{{ route('subcategory.edit', ['id' => $subcategory->id]) }}">
        {{-- Tutył --}}
        <x-jet-label for="name" class="pl-2"> Nazwa: </x-jet-label>
        <x-jet-input name="name" value="{{ old('name', $subcategory->name) }}" type="text"
            class="border px-2 min-w-full mb-3">
        </x-jet-input>

        @error('name')
            <div class="simple-error">{{ $message }}</div>
        @enderror

        <div class="relative">
            <x-jet-label for="image_url" class="pl-2"> Obrazek: </x-jet-label>
            <x-jet-input name="image_url" value="{{ old('image_url', $subcategory->image_url) }}" type="text"
                class="border px-2 min-w-full mb-3" id="image_url">
            </x-jet-input>

            <img src="{{ URL::asset('/images/paste.png') }}" alt="profile Pic" height="20" width="20"
                class="bg-gray-100 absolute right-1 bottom-1 hover:cursor-pointer" title="Wklej obrazek kategorii"
                onclick="pasteImg('{{ $subcategory->category->image_url }}');">
        </div>

        @error('image_url')
            <div class="simple-error">{{ $message }}</div>
        @enderror

        <div class="mb-2">
            Kategoria głowna
            <select name="category_id"
                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $subcategory->category_id) selected @endif>

                        {{ $category->name }} </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            Czy podkategoria ma być publiczna?
            <input type="checkbox" name="public" @if ($subcategory->public) checked @endif>
        </div>

        <x-jet-button type="submit">Zapisz</x-jet-button>
    </x-form-section>

    <x-delete-item-button action="{{ route('subcategory.delete', ['id' => $subcategory->id, 'visibility' => $visibility]) }}">
    </x-delete-item-button>

    <x-back-button action="{{ route('category.show', ['id' => $subcategory->category_id, 'visibility' => $visibility]) }}">
    </x-back-button>
</x-main-layout>
