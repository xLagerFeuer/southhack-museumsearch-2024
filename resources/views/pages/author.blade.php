<x-app-layout>
    <div class="py-12">
        <div class="container flex flex-col sm:flex-row">
            <div class="w-full sm:w-full md:w-1/3 lg:w-1/3">
                <livewire:author.author-create-form />
            </div>
            <div class="w-full">
                <livewire:author.authors-table />
            </div>
        </div>
    </div>
</x-app-layout>
