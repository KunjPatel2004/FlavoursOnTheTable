<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Flavors On The Table</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-2xl">
        <!-- Logo -->
        <div class="text-center">
            <h1 class="text-4xl font-bold mt-2 " style="color:#FBAF32">Flavors On The Table</h1>
            <h2 class="text-2xl font-bold text-gray-800 mt-2">Welcome Back!</h2>
            <p class="text-gray-800">Login to continue</p>
        </div>

        <!-- Login Form -->
        <form action="{{url('/login')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Address</label>
                <input type="email" id="email" name="email" required
                    class="w-full p-3 border border-gray-300 rounded-lg">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-3 border border-gray-300 rounded-lg">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" class="mr-2"> Remember me
                </label>
                <a href="#" class="hover:underline text-sm" style="color:#FBAF32">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full p-3 text-white rounded-lg hover:bg-orange-600 transition duration-200" style="background-color:#FBAF32">
                Login
            </button>
        </form>
        <!-- Register -->
        <div class="text-center text-gray-600 text-sm">
            Don't have an account?
            <a href="{{url('/register')}}" class="hover:underline font-semibold" style="color:#FBAF32">Sign Up</a>
        </div>
    </div>

</body>
</html>
