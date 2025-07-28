<div class="flex justify-center min-h-[70vh] py-20 px-4">
    <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8 space-y-6">
        <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-800">Create an Account</h2>
            <p class="text-sm text-gray-500">Sign up to get started</p>
        </div>

        <form action="/register" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="John Doe"
                    required
                    class="w-full px-4 py-2 mt-1 border border-[#d54390] rounded-lg bg-gray-50 text-gray-900 focus:border-[#d54390] focus:ring-2 focus:ring-[#d54390] focus:outline-none" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="example@abc.com"
                    required
                    class="w-full px-4 py-2 mt-1 border border-[#d54390] rounded-lg bg-gray-50 text-gray-900 focus:border-[#d54390] focus:ring-2 focus:ring-[#d54390] focus:outline-none" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Enter a strong password"
                    required
                    class="w-full px-4 py-2 mt-1 border border-[#d54390] rounded-lg bg-gray-50 text-gray-900 focus:border-[#d54390] focus:ring-2 focus:ring-[#d54390] focus:outline-none" />
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    type="password"
                    name="confirm_password"
                    id="confirm_password"
                    placeholder="Re-enter your password"
                    required
                    class="w-full px-4 py-2 mt-1 border border-[#d54390] rounded-lg bg-gray-50 text-gray-900 focus:border-[#d54390] focus:ring-2 focus:ring-[#d54390] focus:outline-none" />
            </div>

            <button
                type="submit"
                class="w-full mt-8 bg-[#d54390] cursor-pointer hover:bg-[#92215c] text-white py-2 px-4 rounded-lg transition duration-200">
                Register
            </button>
        </form>

        <p class="text-sm text-center text-gray-500">
            Already have an account?
            <a href="/login" class="text-[#d54390] hover:underline">Login here</a>
        </p>
    </div>
</div>