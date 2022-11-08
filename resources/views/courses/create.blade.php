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
            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" name="form1">
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td><b> タイトル：</b></td>
                            <td><input type="text" name="title"></td>
                        </tr>
                        <tr>
                            <td><b> 価格：</b></td>
                            <td>
                                <input type="text" name="amount" id="">
                            </td>
                        </tr>
                        <tr>
                            <td><b> 講師：</b></td>
                            <td>
                                <select name="teacher_id">
                                    <option value="">選択してください</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b> 内容：</b></td>
                            <td>
                              <textarea name="content" id="" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><b> 日付：</b></td>
                            <td>
                              <input type="date" name="date" id="">
                            </td>
                        </tr>
                        <tr>
                            <td><b> 参加可能人数：</b></td>
                            <td>
                              <input type="text" name="capacity">
                            </td>
                        </tr>
                        <tr>
                            <td><b> 申込み期限：</b></td>
                            <td>
                              <input type="date" name="booking_deadline">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input class="btn btn-primary mt-10" type="submit" value="登録">
            </form>
        </div>
    </div>
</x-app-layout>
