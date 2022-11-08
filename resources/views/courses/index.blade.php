<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    {{-- main --}}
    <div class="d-flex p-10">
        <aside>
            <x-c-sidebar />
        </aside>
        <div class="ml-20">
            @if (session('message'))
                {{ session('message') }}
            @endif
            <a class="btn btn-primary" href="{{ route('courses.create') }}">コースを登録する</a>


            @if ($courses->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">名前</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr>
                                <td>
                                    {{ $course->title }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="mt-10">教師が登録されていません。</p>
            @endif
        </div>
    </div>

    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>

</x-app-layout>
