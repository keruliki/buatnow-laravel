<div class="bg-white shadow-xl sm:rounded-lg">
    <div class="p-4 flex justify-between w-full">
        <h3 class="text-4xl font-bold ">@if (Laravel\Jetstream\Jetstream::hasTeamFeatures())  {{ Auth::user()->currentTeam->name }} @endif {{ __('Projects') }}</h3>
        <div class="flex">
            <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Add new
            </a>
        </div>
    </div>
</div>
