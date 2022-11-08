<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>


  {{-- main --}}
  <div>
    <aside>
      <a href="{{route('teachers.index')}}">教師一覧</a>
    </aside>
  </div>
</x-app-layout>
