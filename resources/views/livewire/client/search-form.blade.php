<div class="flex items-center justify-center w-full">
    @if($status === "create")
        <div class="bg-white rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
            <div class="px-4 py-8 sm:px-10">
                <div class="relative mt-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm leading-5">
                <span class="px-2 text-gray-500 bg-white">
                    Поиск экспонатов
                </span>
                    </div>
                </div>
                <div class="mt-6">
                    <form wire:submit.prevent="save" class="w-full space-y-6">
                        <div class="w-full">
                            <div class="relative">
                                <input wire:model="photo" required type="file" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />
                                @error('photo') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="relative">
                                <input wire:model="creationDate" required type="date" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />
                                @error('creationDate') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="w-full">
                            <div class="relative">
                                <select wire:model="selectedAuthor" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" required>
                                    <option value="_CREATE_NEW_">Создать нового автора</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedAuthor') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        @if($selectedAuthor === "_CREATE_NEW_")
                            <div class="w-full">
                                <div class="relative">
                                    <input wire:model="newAuthorName" type="text" placeholder="Введите имя автора" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" />
                                    @error('newAuthorName') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif

                        <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                Отправить
                            </button>
                        </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <livewire:client.request-status-widget :task="$currentTask" />
    @endif
</div>
