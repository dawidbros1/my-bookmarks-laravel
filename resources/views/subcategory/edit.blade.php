<x-main-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edycja podkategorii') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors> </x-jet-validation-errors>

    <x-form-section action="{{ route('subcategory.edit', ['id' => $subcategory->id]) }}">
        <x-form.input name="name" value="{{ $subcategory->name }}">Nazwa: </x-form.input>
        <x-form.input name="image_url" value="{{  $subcategory->image_url  }}">Adres obrazka: </x-form.input>

        <div class="mb-2">
            Kategoria głowna
            <select name="category_id" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == $subcategory->category_id) selected @endif>

                    {{ $category->name }} </option>
                @endforeach
            </select>
        </div>

        <x-form.checkbox name="private" checked="{{ $subcategory->private }}"> Czy kategoria ma być prywatna? </x-form.checkbox>

        <x-jet-button type="submit">Zapisz</x-jet-button>
    </x-form-section>

    <x-delete-item-button action="{{ route('subcategory.delete', ['id' => $subcategory->id, 'visibility' => $visibility]) }}"></x-delete-item-button>
    <x-back-button action="{{ route('category.show', ['id' => $subcategory->category_id, 'visibility' => $visibility]) }}"></x-back-button>
</x-main-layout>
