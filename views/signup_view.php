<!-- Container -->
<div class="container mx-auto">
    <div class="w-full flex justify-center px-6 my-12 p-12">
        <!-- Row -->
        <div class="w-full xl:w-3/4 lg:w-11/12 flex">
            <!-- Col -->
            <div

                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('assets/img/bg-2.jpg')"
            ></div>
            <!-- Col -->
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none shadow-2xl">
                <h3 class="pt-4 text-2xl text-center">Create an Account!</h3>
                <form method="post" action="index.php?page=signup" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                Profile
                            </label>
                            <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="picture"
                                    type="file"
                                    placeholder="Picture"
                                    name="picture"
                            />
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="lastName">
                                Last Name
                            </label>
                            <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="username"
                                    type="text"
                                    placeholder="Username"
                                    name="username"
                            />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                placeholder="Email"
                                name="email"
                        />
                    </div>
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Password
                            </label>
                            <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password"
                                    type="password"
                                    placeholder="******************"
                                    name="password"
                            />
<!--                            <p class="text-xs italic text-red-500">Please choose a password.</p>-->
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                Confirm Password
                            </label>
                            <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="c_password"
                                    type="password"
                                    placeholder="******************"
                                    name="c_password"
                            />
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                                class="w-full px-4 py-2 font-bold text-white bg-black rounded-full hover:bg-black focus:outline-none focus:shadow-outline"
                                type="submit"
                                name="signup"
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
