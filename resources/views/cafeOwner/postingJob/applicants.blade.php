<x-layout>
    <x-slot:content>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mx-32">
        <h1 class="text-4xl font-bold mb-16">Applicants List</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Nama</th>
                <th scope="col" class="px-6 py-3">Message</th>
                <th scope="col" class="px-6 py-3">Apply Date</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($applicants as $application)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $application['user']['firstName'] }} {{ $application['user']['lastName'] }}
                    </th>
                    <td class="text-white px-6 py-4">
                        {{ $application['message'] }}
                    </td>
                    <td class="text-white px-6 py-4">
                        {{ \Carbon\Carbon::parse($application['created_at'])->format('d M Y') }}
                    </td>
                    <td class="text-white px-6 py-4">
                        {{ ucfirst($application['status']) }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($application['status'] === 'accepted')
                            <form method="POST" action="{{ route('cafeOwner.postingJob.applicants.update', $application['id']) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="finished">
                                <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
                                    Finished
                                </button>
                            </form>
                        @elseif ($application['status'] === 'finished')
                            <a href="{{ url('/cafeOwner/payment') }}" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-900">
                                Pay Musician
                            </a>
                        @else
                            <form method="POST" action="{{ route('cafeOwner.postingJob.applicants.update', $application['id']) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Accept
                                </button>
                            </form>
                    
                            <form method="POST" action="{{ route('cafeOwner.postingJob.applicants.update', $application['id']) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    Reject
                                </button>
                            </form>
                        @endif
                    </td>
                    
                    
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">
                        No applications found.
                    </td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>


    </x-slot:content>
</x-layout>