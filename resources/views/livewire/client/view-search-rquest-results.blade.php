
<div class="container px-4 mx-auto sm:px-8">
    <div class="py-8">
        <div class="flex flex-row justify-between w-full mb-1 sm:mb-0">
            <h2 class="text-2xl leading-tight">
                Результаты поиска
            </h2>
        </div>
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8 space-y-4">

            <div class="p-8 w-full rounded-3xl bg-blue-200 text-gray-700">
                <span class="text-gray-700 font-bold">Сгенерированное описание:</span>
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
                            Число схожести
                        </th>
                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                            Дата создания
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $counter = 0; @endphp
                    @foreach($results as $result)
                        @php $counter++; @endphp
                        <tr class=" {{ ($counter == 1) ? "bg-green-700" : "" }}
                            {{ ($counter == 2) ? "bg-green-600" : "" }}
                            {{ ($counter == 3) ? "bg-green-400" : "" }}
                            {{ ($counter == 4) ? "bg-yellow-200" : "" }}
                            {{ ($counter == 5) ? "bg-yellow-400" : "" }}
                            {{ ($counter == 6) ? "bg-yellow-600" : "" }}
                            {{ ($counter == 7) ? "bg-red-300" : "" }}
                            {{ ($counter == 8) ? "bg-red-400" : "" }}
                            {{ ($counter == 9) ? "bg-red-500" : "" }}
                            {{ ($counter == 10) ? "bg-red-700" : "" }}
                        ">
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <img class="w-full sm:w-full md:w-2/3 lg:w-1/4 rounded-md" src="{{ asset('storage/' . $result->image_path) }}" alt="">
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $result->name }}</p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $result->class }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $result->number_of_similarities }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    @php $dateTmp = new DateTime($result->created_at); @endphp
                                    {{ $dateTmp->format('j-m-Y, H:i') }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
