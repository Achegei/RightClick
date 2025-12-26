<x-guest-layout>
    <div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Payment - {{ $tierData['title'] }}</h1>
        <p class="mb-4">Amount: KES {{ number_format($tierData['price']) }}</p>

        <form action="{{ route('checkout.payment.submit', $tier) }}" method="POST">
            @csrf
            <label class="block mb-2 font-semibold">Payment Method</label>
            <select name="payment_method" class="w-full mb-4 border rounded p-2">
                <option value="mpesa">MPESA</option>
                <option value="card">Card</option>
            </select>

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Pay Now
            </button>
        </form>

        <a href="{{ route('checkout.show', $tier) }}" class="block mt-4 text-center text-gray-600 hover:underline">&larr; Back to Checkout</a>
    </div>
</x-guest-layout>
