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
            <a class="btn btn-primary" href="{{ route('teachers.edit', ['teacher' => $teacher->id]) }}">編集する</a>
            <table>
                <tbody>
                    <tr>
                        <td><b> 名前：</b></td>
                        <td>{{ $teacher->name }}</td>
                    </tr>
                    <tr>
                        <td><b> コメント：</b></td>
                        <td>
                            {{ $teacher->comment }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
