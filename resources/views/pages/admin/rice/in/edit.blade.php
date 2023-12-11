<x-back-layout>@section('title'){{ __('Edit Rice In') }}@endsection
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <!-- Left: Breadcrumb -->
        <x-admin.breadcrumb :items="[
            ['url' => route('rice-in.index'), 'label' => 'Rice In'],
            ['label' => 'Add rice in'],
        ]" />

        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-0 space-y-20">
                <div>
                    <x-admin.form-section action="{{ route('rice-in.update', $data->id) }}">
                        <x-slot name="title">
                            {{ __('Rice In') }}
                        </x-slot>

                        <x-slot name="description">
                            {{ __('Add rice in') }}
                        </x-slot>

                        <x-slot name="form">
                            @csrf
                            @method('PUT')
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="quantity" value="{{ __('Quantity') }}" />
                                <div class="relative">
                                    <input x-mask:dynamic="$money($input, ',')" id="quantity" name="quantity" pattern="[0-9,\.]*"  placeholder="25" value="{{ old('quantity', $data->quantity) }}" class="mt-1 w-full pr-8 bg-slate-100 border-slate-300 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" type="text" />
                                    <div class="absolute inset-0 left-auto flex items-center pointer-events-none">
                                        <span class="text-sm text-slate-400 font-medium px-3">Kg</span>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('quantity')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="source" value="{{ __('Source') }}" />
                                <select id="source" name="source" class="mt-1 w-full border-slate-300 bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" x-data="{ source: '{{ $data->source }}'}">
                                    <option value="" disabled selected>Choose Option</option>
                                    <option value="individual" x-bind:selected="source === 'individual'">Individual</option>
                                    <option value="corporate" x-bind:selected="source === 'corporate'">Corporate</option>
                                </select>
                                <x-input-error :messages="$errors->get('source')" class="mt-1" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-input-label for="contributor_name" value="{{ __('Contributor Name') }}" />
                                <x-text-input id="contributor_name" type="text" class="mt-1 block w-full" name="contributor_name" :value="old('contributor_name', $data->contributor_name)" placeholder="contributor name" autocomplete="contributor_name" />
                                <x-input-error :messages="$errors->get('contributor_name')" class="mt-1" />
                            </div>
                        </x-slot>
                        <x-slot name="actions">
                            <x-button.primary>
                                <i class="ri-save-3-line mt-0.5"></i>{{ __('Add') }}
                            </x-button.primary>
                        </x-slot>
                    </x-admin.form-section>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @php
                notify()->error($error);
            @endphp
        @endforeach
    @endif
</x-back-layout>
