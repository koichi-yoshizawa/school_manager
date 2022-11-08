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
            <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data" name="form1">
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td><b> 名前：</b></td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td><b> コメント：</b></td>
                            <td>
                                <input type="text" name="comment" id="">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input class="btn btn-primary mt-10" type="submit" value="登録">
            </form>
        </div>
    </div>
</x-app-layout>
