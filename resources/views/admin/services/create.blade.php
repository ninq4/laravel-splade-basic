@seoTitle(__('Новая услуга'))

<x-app-layout>
    <x-slot:header>
        <div class="w-full flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Услуги') }}
            </h2>
            <a href="{{ route('services.index') }}" class="bg-gray-300 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">{{ __('Обратно') }}</a>
        </div>
        </x-slot>
    <div class="my-4 p-4 bg-white max-w-xl mx-auto">
        <x-splade-form action="{{ route('services.store') }}">
            <x-splade-input name="title" label="Название услуги"/>
            <x-splade-textarea name="description" label="{{__('Описание услуги')}}"  />
            <x-splade-input name="price" label="Цена услуги"/>
            <x-splade-select name="isActive" label="{{__('')}}" >
                <option value="0">{{__('Неактивен')}}</option>
                <option value="1">{{__('Активен')}}</option>
            </x-splade-select>
            <x-splade-file name="image" label="{{__('Изображение')}}"/>
            <x-splade-submit lable="{{__('Сохранить')}}"/>
        </x-splade-form>
    </div>

</x-app-layout>
