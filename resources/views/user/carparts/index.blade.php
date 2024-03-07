<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-white-800 leading-tight">
            {{ __('All Car Parts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Your filter form goes here -->
            <form method="GET" action="{{ route('user.carparts.index') }}">
                <!-- Your filter form content -->
            </form>

            <!-- Add a car part button -->
            <x-primary-button>
                <a href="{{ route('user.carparts.create') }}">Add a car part</a>
            </x-primary-button>

            <!-- Display Car Parts -->
            @foreach ($carparts as $index => $carpart)
                <div class="my-2 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <!-- Car part details -->
                    <h2 class="font-bold text-2xl">
                        {{ $index + 1 }}. <a href="{{ route('user.carparts.show', $carpart) }}">{{ ucfirst($carpart->name) }}</a>
                    </h2>
                    <p class="mt-2">
                        <strong>Description:</strong> {{ ucfirst($carpart->description) }}
                    </p>
                    <p>
                        <strong>Car Brand:</strong> {{ ucfirst($carpart->car_brand) }}
                    </p>
                    <p>
                        <strong>Price:</strong> {{ $carpart->price }}
                    </p>
                    <p>
                        <!-- Car part image -->
                        @if ($carpart->car_part_image)
                            <a href="{{ route('user.carparts.show', $carpart) }}">
                                <img src="{{ asset($carpart->car_part_image) }}" alt="{{ $carpart->name }}" width="100">
                            </a>
                        @else
                            No Image
                        @endif
                    </p>
                </div>
            @endforeach

            <!-- Pagination -->
       </div>

        </div>
    </div>
</x-app-layout>
