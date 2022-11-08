<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>


  {{-- main --}}
  <div class="d-flex p-10">
    <aside>
      <a href="{{route('teachers.index')}}">教師管理</a>
    </aside>
    <div class="ml-20">
      ダッシュボードのTOPページです
    </div>
  </div>
</x-app-layout>
