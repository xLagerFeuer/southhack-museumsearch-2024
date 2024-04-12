<div class="bg-white rounded-lg shadow sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
    <div class="px-4 py-8 sm:px-10">
        <div class="relative mt-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm leading-5">
                <span class="px-2 text-gray-500 bg-white">
                    Регестрация музея
                </span>
            </div>
        </div>
        <div class="mt-6">
            <form wire:submit.prevent="createMuseum">
                <div class="w-full space-y-6">
                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="name" required type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Название"/>
                            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="city" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Город"/>
                            @error('city') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="address" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Адресс"/>
                            @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="phone" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Телефон"/>
                            @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="website" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Сайт"/>
                            @error('website') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="email" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Почта"/>
                            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="description" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Описание"/>
                            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="latitude" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="latitude"/>
                            @error('latitude') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="relative">
                            <input wire:model="longitude" type="text" class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="longitude"/>
                            @error('longitude') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <span class="block w-full rounded-md shadow-sm">
                            <button type="submit" class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                                Зарегестрировать музей
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
