<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wines list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <div class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

                    <div class="mb-4">
                        <a href="{{ route('wines.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NAME</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">AGE</th>
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                            @foreach ($wines as $wine)
                            <tr>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $wine->id }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $wine->name }}</td>
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $wine->age }}</td>
                                
                                <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('wines.edit', $wine->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <button type="button" onclick="confirmDelete('{{ $wine->id }}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Delete</button>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
    alertify.confirm("This is a confirm dialog.", function (e) {
        if(e) {
            let form = document.createElement('form')
            form.method = 'Post'
            form.action = `/wines/${id}`
            form.innerHTML = '@csrf @method("DELETE")'
            document.body.appendChild(form)
            form.submit()
        }else{
            return false
        }
    }
    );
}
</script>
