<x-app-layout>
    <x-slot name="header" class="text-lg">
      {{ ('Cadastro de Cidade') }}
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
                <form action="{{ route('city-halls.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-6 gap-6">
                      <div class="col-span-6">
                          <label for="name" class="block text-lg font-medium leading-5 text-gray-700">
                              {{ ('Nome:') }}
                              <input id="name" type="text" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>
                      </div>
                      <div class="col-span-6 sm:col-span-3">
                          <label for="state" class="block text-lg font-medium leading-5 text-gray-700">
                              {{ ('Estado:') }}
                              <input id="state" type="text" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                      </div>
                  </div>
                <div class="mt-6">
                  <x-button type="submit">
                    <strong>Concluir Cadastro</strong>
                  </x-button>
                </div> 
              </div>
            </div>
</x-app-layout>