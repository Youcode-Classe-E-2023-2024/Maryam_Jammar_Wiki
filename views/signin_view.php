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
                <h3 class="pt-4 text-2xl text-center">Get started today!</h3>
                <form method="post" action="index.php?page=signin" class="px-16 pt-6 pb-8 mb-4 bg-white rounded">
                    <div class="mb-4 px-12">
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
                    <div class="mb-4 px-12">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Password
                        </label>
                        <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password"
                                type="password"
                                placeholder="******************"
                                name="password"
                        />
                    </div>

                    <div class="mb-6 text-center">
                        <button
                                class="w-full px-4 py-2 font-bold text-white bg-black rounded-full hover:bg-black focus:outline-none focus:shadow-outline"
                                type="submit"
                                name="signin"
                        >
                            Login Now
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a
                                class="inline-block text-sm text-gray-500 align-baseline hover:text-gray-800"
                                href="index.php?page=signup"
                        >
                            Don't have ? Register!
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>