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
            <table>
                <tbody>
                    <tr>
                        <td><b> タイトル：</b></td>
                        <td>{{ $course->title }}</td>
                    </tr>
                    <tr>
                        <td><b> 価格：</b></td>
                        <td>
                            {{ $course->amount }}
                        </td>
                    </tr>
                    <tr>
                        <td><b> 講師：</b></td>
                        <td>
                            {{-- {{ $course->amount }} --}}
                        </td>
                    </tr>
                    <tr>
                        <td><b> 内容：</b></td>
                        <td>
                            {{ $course->content }}
                        </td>
                    </tr>
                    <tr>
                        <td><b> 日付：</b></td>
                        <td>
                            {{ $course->date }}
                        </td>
                    </tr>
                    <tr>
                        <td><b> 参加可能人数：</b></td>
                        <td>
                            {{ $course->capacity }}
                        </td>
                    </tr>
                    <tr>
                        <td><b> 申込み期限：</b></td>
                        <td>
                            {{ $course->booking_deadline }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
