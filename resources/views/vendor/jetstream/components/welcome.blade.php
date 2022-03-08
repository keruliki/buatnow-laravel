

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-4xl text-center leading-6 font-bold text-gray-900">
                    {{ Auth::user()->currentTeam->name }} {{ __('Team') }}
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    {{ __('Manage your team and their permissions.') }}
                </p>
                <div class="mt-5">
                    <a href=""
                        class="group flex items-center px-4 py-2 text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition ease-in-out duration-150">
                        <svg class="mr-3 h-5 w-5 text-indigo-400 group-hover:text-indigo-300 group-focus:text-indigo-300 transition ease-in-out duration-150"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ __('Manage teams') }}
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
