@extends('layouts.saas')

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-indigo-600 via-purple-600 to-pink-500 py-16 px-6 relative overflow-hidden">

    <!-- Floating shapes for modern SaaS feel -->
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-purple-400 rounded-full opacity-30 animate-pulse mix-blend-multiply"></div>
    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-indigo-400 rounded-full opacity-20 animate-pulse mix-blend-multiply"></div>

    <div x-data="checkoutModal()" class="max-w-md mx-auto relative z-10"> <!-- Narrower card -->

        <!-- Hero / Header -->
        <div class="text-center mb-12 text-white">
            <h1 class="text-4xl font-extrabold mb-4">
                Subscribe to <span class="text-yellow-300">{{ ucfirst($tierData['title']) }}</span>
            </h1>
            <p class="text-gray-200 text-base">
                Get instant access to customized features. Pay securely with M-PESA.
            </p>
        </div>

        <!-- Checkout Card -->
        <div class="bg-white shadow-2xl rounded-3xl p-8 border border-gray-100"> <!-- Slightly reduced padding -->
            
            <!-- Price -->
            <div class="mb-6 text-center">
                <span class="text-gray-500">Price:</span>
                <span class="text-2xl font-bold text-gray-900">KES {{ $tierData['price'] }}</span>
            </div>

            <!-- Phone Input -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">M-PESA Phone Number</label>
                <input 
                    x-model="phone" 
                    type="tel" 
                    placeholder="2547XXXXXXXX" 
                    class="w-full p-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition duration-200"
                >
            </div>

            <!-- Pay Button -->
            <button 
                @click="pay()" 
                class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition duration-200 transform hover:-translate-y-0.5"
            >
                Pay Now
            </button>

            <!-- Feedback Messages -->
            <div class="mt-6 text-center">
                <template x-if="state==='loading'">
                    <p class="text-gray-700 animate-pulse">Processing… check your phone</p>
                </template>
                <template x-if="state==='success'">
                    <p class="text-green-600 font-bold text-lg flex items-center justify-center">
                        ✅ Payment Successful
                    </p>
                </template>
                <template x-if="state==='failed'">
                    <p class="text-red-600 font-bold text-lg flex items-center justify-center">
                        ❌ Payment Failed
                    </p>
                </template>
            </div>

            <!-- Optional Small Note -->
            <p class="mt-6 text-center text-gray-400 text-xs">
                By clicking Pay Now, you agree to our <a href="#" class="text-indigo-500 underline">Terms & Conditions</a>.
            </p>
        </div>
    </div>
</div>

<script>
function checkoutModal() {
    return {
        phone: '254',
        state: 'form',
        async pay() {
            this.state = 'loading';
            try {
                const res = await fetch("{{ route('checkout.payment.submit', $tier) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ phone: this.phone })
                });
                const data = await res.json();
                this.state = data.status === 'pending' ? 'success' : 'failed';
            } catch (err) {
                console.error(err);
                this.state = 'failed';
            }
        }
    }
}
</script>
@endsection
