@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ($errors->has($attributes->get('name')) ? 'border-red-300 dark:bg-slate-900 rounded-md shadow-sm' : 'px-2 py-2 text-sm border-slate-300 bg-slate-100 dark:border-slate-700 dark:bg-slate-900 dark:text-slate-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm')]) !!}>
