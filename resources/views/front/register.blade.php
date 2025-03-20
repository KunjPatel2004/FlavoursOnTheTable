<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Flavors On The Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-2xl">
        <!-- Logo -->
        <div class="text-center">
            <h1 class="text-4xl font-bold mt-2 " style="color:#FBAF32">Flavors On The Table</h1>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Create an Account</h2>
            <p class="text-gray-500">Register to start ordering delicious food</p>
        </div>

        <!-- Registration Form -->
        <form action="" method="POST" class="space-y-3">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600">Full Name</label>
                <input type="text" id="name" name="name" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="mobile" class="block text-sm font-medium text-gray-600">Mobile Number</label>
                <input type="tel" id="mobile" name="mobile" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-600">Address</label>
                <input type="address" id="address" name="address" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-600">Register as</label>
                <select id="role" name="role" required
                    class="w-full p-2 border border-gray-300 rounded-lg">
                    <option value="customer">Customer</option>
                    <option value="cook">Cook</option>
                </select>
            </div>

            <button type="submit"
                class="w-full p-3 text-white rounded-lg hover:bg-orange-600 transition duration-200" style="background-color:#FBAF32">
                Register
            </button>
        </form>

        <!-- Login Link -->
        <div class="text-center text-gray-600 text-sm">
            Already have an account?
            <a href="{{ url('/login')}}" class="hover:underline font-semibold" style="color:#FBAF32">Login</a>
        </div>
    </div>

</body>
</html>
