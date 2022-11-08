<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    {{-- main --}}
    <div class="d-flex p-10">
        <aside>
            <a href="{{ route('teachers.index') }}">教師一覧</a>
        </aside>
        <div class="ml-20">
            @if (session('message'))
                {{ session('message') }}
            @endif
            <a class="btn btn-primary" href="{{ route('teachers.create') }}">教師を登録する</a>


            @if ($teachers->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">名前</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td><a
                                        href="{{ route('teachers.show', ['teacher' => $teacher]) }}">{{ $teacher->name }}</a>
                                </td>
                                <td>
                                    <form id="delete_{{ $teacher->id }}"
                                        action="{{ route('teachers.destroy', ['teacher' => $teacher]) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="deletePost(this)" class="btn btn-danger">削除する</button>
                                    </form>
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
