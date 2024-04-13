
<div class="container px-4 mx-auto sm:px-8">
    <div class="py-8">
        <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
            <h2 class="text-2xl leading-tight">
                Результаты поиска
            </h2>
        </div>
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8 space-y-4">

            <div class="p-8 w-full rounded-3xl bg-blue-200 text-gray-700">
                <span class="text-gray-700 font-bold">Лучшее описание:</span>
                <p>{{ $results[0]->description }}</p>
            </div>

            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                    <tr>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Изображение
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Наименование
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Класс
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Описание
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Число схожести
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Дата создания
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <img class="w-full sm:w-full md:w-2/3 lg:w-1/4" src="{{ asset('storage/' . $result->image_path) }}" alt="">
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $result->name }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $result->class }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $result->description }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $result->number_of_similarities }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    @php $dateTmp = new DateTime($result->created_at); @endphp
                                    {{ $dateTmp->format('j-m-Y, H:i') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                    Подробнее
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
