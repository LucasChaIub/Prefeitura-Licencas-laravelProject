<x-app-layout>
    <x-slot name="header" class="text-lg">
        {{ ('Cadastro de Atividade') }}
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

                    <form action="{{ route('activities.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="time" class="block text-lg font-medium leading-5 text-gray-700">
                                        {{ __('Data e Hora do Evento:') }}
                                        <input id="time" type="datetime-local" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="time" required autocomplete="time" autofocus>
                                    </label>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="status" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Status:') }}
                                    <select id="status" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="status" required autocomplete="status" autofocus>
                                        <option value="Pendente">{{ __('Pendente') }}</option>
                                        <option value="Concluído">{{ __('Concluído') }}</option>
                                    </select>
                            </div>
                            <div class="col-span-6">
                                <label for="description" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Descrição:') }}
                                    <textarea id="description" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="description" required autocomplete="description" autofocus></textarea>
                                </label>
                            </div>
                            <div class="col-span-6">
                                <label for="pendencies" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Pendências:') }}
                                    <textarea id="pendencies" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="pendencies" required autocomplete="pendencies" autofocus></textarea>
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="receptivity_id" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Receptividade:') }}
                                    <select id="receptivity_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="receptivity_id" required autocomplete="receptivity_id" autofocus>
                                        @foreach($receptivities as $receptivity)
                                            <option value="{{ $receptivity->id }}">{{ $receptivity->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="activity_type_id" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Tipo de Contato:') }}
                                    <select id="activity_type_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="activity_type_id" required autocomplete="activity_type_id" autofocus>
                                        @foreach($activityTypes as $activityType)
                                            <option value="{{ $activityType->id }}">{{ $activityType->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="col-span-6 ">
                                <label for="contact_id" class="block text-lg font-medium leading-5 text-gray-700">
                                    {{ __('Contato:') }}
                                    <select id="contact_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" name="contact_id" required autocomplete="contact_id" autofocus>
                                        @foreach($contacts as $contact)
                                            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6">
                            <x-button type="submit">
                                <strong>{{ __('Cadastrar Atividade') }}</strong>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>