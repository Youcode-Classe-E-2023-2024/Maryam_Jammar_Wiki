<!-- Container -->
<div class="container mx-auto">
    <div class="w-full flex justify-center bg-black px-6 p-8">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 p-16 flex">
            <!-- Col -->
            <div

                    class="w-full h-auto hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('assets/img/Wiki-black.png')"
            ></div>
            <!-- Col -->
            <div class="signup w-full lg:w-7/12 bg-white backdrop-opacity-50 p-5 rounded-2xl lg:rounded-l-none shadow-3xl" style="opacity: 75%">
                <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                <form method="post" action="index.php?page=signup" class="form px-8 pt-6 pb-8 mb-4 rounded">
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                Profile
                            </label>
                            <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="imageInput"
                                    type="file"
                                    placeholder="Picture"
                                    name="picture"
                            required/>
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                Username
                            </label>
                            <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="signUpName"
                                    type="text"
                                    placeholder="Username"
                                    name="username"
                            required/>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="signUpEmail"
                                type="email"
                                placeholder="Email"
                                name="email"
                        required/>
                    </div>
                    <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Password
                            </label>
                            <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="signUpPassword"
                                    type="password"
                                    placeholder="******************"
                                    name="password"
                            required/>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                                class="w-full px-4 py-2 font-bold text-white bg-black rounded-full hover:bg-black focus:outline-none focus:shadow-outline"
                                type="submit"
                                name="signup"
                                id="signUp"
                        >
                            Register Account
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a
                                class="inline-block text-sm text-gray-500 align-baseline hover:text-gray-800"
                                href="index.php?page=signin"
                        >
                            Already have an account? Login!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/signup.js"></script>