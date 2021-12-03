<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __("Editando a Cidade $city->name") }}
      </h2>
  </x-slot>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  @if ($errors->any())
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  @endif
                  <form action="{{ route('cities.update', $city) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6">
                            <label for="name" class="block text-lg font-medium leading-5 text-gray-700">
                                {{ __('Nome:') }}
                                <input id="name" type="text" class="mt-1 form-input block w-full py-2 px-3 border border-yellow-300 rounded-md shadow-sm focus:outline-yellow focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="name" value="{{ $city->name }}" required autofocus>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="state" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Estado:') }}
                                    <input id="state" type="text" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-yellow focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="phone" value="{{ $city->state }}" required autofocus>
                            </div>
                      </div>
                      <div class="mt-6">
                        <x-button type="submit">Atualizar</x-button>
                      </div> 
                    </div>
                  </div>
</x-app-layout>