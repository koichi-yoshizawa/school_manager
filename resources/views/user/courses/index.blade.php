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
            @if ($courses->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">名前</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>
                                    {{ $course->title }}
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user.courses.detail', ['course' => $course]) }}">詳細を見る</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
