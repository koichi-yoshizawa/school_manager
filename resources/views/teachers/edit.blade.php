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

            <form action="{{ route('teachers.update', ['teacher' => $teacher]) }}" method="POST"
                enctype="multipart/form-data" name="form1">
                @method('put')
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td><b> 名前：</b></td>
                            <td><input type="text" name="name" value="{{ $teacher->name }}"></td>
                        </tr>
                        <tr>
                            <td><b> コメント：</b></td>
                            <td>
                                <input type="text" name="comment" value="{{ $teacher->comment }}">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input class="btn btn-primary mt-10" type="submit" value="編集する">
            </form>
        </div>
    </div>
</x-app-layout>
