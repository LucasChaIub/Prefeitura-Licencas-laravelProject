<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __("Editando Evento") }}
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
                  <x-auth-validation-errors class="mb-4" :errors="$errors" />
                  <form action="{{ route('activities.update', $activity) }}" method="POST" >
                      @csrf
                      @method('PUT')
                      <div class="grid grid-cols-6 gap-6">
                          <div class="col-span-6 sm:col-span-3">
                              <label for="status" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Status:') }}
                                  <select id="status" name="status" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5">
                                      <option value="0" {{ $activity->status == 0 ? 'selected' : '' }}>{{ __('Pendente') }}</option>
                                      <option value="1" {{ $activity->status == 1 ? 'selected' : '' }}>{{ __('Aprovado') }}</option>
                                  </select>
                              </label>
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                              <label for="time" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Horário:') }}
                                  <input id="time" name="time" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" type="datetime-local" value="{{ $activity->time }}" />
                              </label>
                          </div>
                          <div class="col-span-6">
                              <label for="description" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Descrição:') }}
                                  <textarea id="description" name="description" class="mt-1 form-textarea block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" rows="5">{{ $activity->description }}</textarea>
                              </label>
                          </div>
                          <div class="col-span-6">
                              <label for="pendencies" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Pendências:') }}
                                  <textarea id="pendencies" name="pendencies" class="mt-1 form-textarea block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5" rows="5">{{ $activity->pendencies }}</textarea>
                              </label>
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                              <label for="receptivity_id" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Receptividade:') }}
                                  <select id="receptivity_id" name="receptivity_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5">
                                      @foreach ($receptivities as $receptivity)
                                          <option value="{{ $receptivity->id }}" {{ $activity->receptivity_id == $receptivity->id ? 'selected' : '' }}>{{ $receptivity->name }}</option>
                                      @endforeach
                                  </select>
                              </label>
                          </div>
                          <div class="col-span-6 sm:col-span-3">
                              <label for="activity_type_id" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Tipo de Atividade:') }}
                                  <select id="activity_type_id" name="activity_type_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5">
                                      @foreach ($activityTypes as $activityType)
                                          <option value="{{ $activityType->id }}" {{ $activity->activity_type_id == $activityType->id ? 'selected' : '' }}>{{ $activityType->name }}</option>
                                      @endforeach
                                  </select>
                              </label>
                          </div>
                          <div class="col-span-6 ">
                              <label for="contact_id" class="block text-lg font-medium leading-5 text-gray-700">
                                  {{ __('Contato:') }}
                                  <select id="contact_id" name="contact_id" class="mt-1 form-select block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-lg sm:leading-5">
                                      @foreach ($contacts as $contact)
                                          <option value="{{ $contact->id }}" {{ $activity->contact_id == $contact->id ? 'selected' : '' }}>{{ $contact->name }}</option>
                                      @endforeach
                                  </select>
                              </label>
                          </div>
                      </div>
                      <div class="mt-6">
                        <x-button type="submit">
                            <strong>{{ __('Atualizar Evento') }}</strong>
                        </x-button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>