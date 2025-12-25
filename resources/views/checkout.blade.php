<x-guest-layout>
    <div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Checkout - {{ $tierData['title'] }}</h1>
        <p class="mb-6">Price: KES {{ number_format($tierData['price']) }}</p>

        <form action="#" method="POST">
            @csrf
            <input type="hidden" name="tier" value="{{ $tier }}">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
                Proceed to Payment
            </button>
        </form>

        <a href="/" class="block mt-4 text-center text-gray-600 hover:underline">&larr; Back to Home</a>
    </div>
</x-guest-layout>
