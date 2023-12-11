{{-- @role('admin') --}}
<ul class="flex flex-wrap justify-center sm:justify-start mb-8 sm:mb-0 -space-x-3 -ml-px">
    @foreach ($users as $user)
    <li>
        <a class="block" href="#0">
            <img class="w-9 h-9 rounded-full" src="{{ $user->profile_photo_path ? Storage::url($user->profile_photo_path) : $avatar . urlencode($user->name) .'&size=72' }}" width="36" height="36" alt="{{ $user->name }}" />
        </a>
    </li>
    @endforeach
    <li>
        <a href="{{ route('users.index') }}" class="flex justify-center items-center w-9 h-9 rounded-full bg-white border border-slate-200 hover:border-slate-300 text-indigo-500 shadow-sm transition duration-150 ml-2">
            <span class="sr-only">Add new user</span>
            <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16">
                <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
            </svg>
        </a>
    </li>
</ul>
{{-- @endrole --}}
