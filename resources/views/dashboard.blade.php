<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー側画面
        </h2>
    </x-slot>


    {{-- main --}}
    <div class="d-flex p-10">
        <aside>
            <ul>
                <li>
                    <a href="{{ route('user.courses') }}">コース一覧</a>
                </li>
            </ul>
        </aside>
        <div class="ml-20">
            ダッシュボードのTOPページです
        </div>
    </div>
</x-app-layout>
