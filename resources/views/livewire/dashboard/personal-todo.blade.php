<div class="bg-white shadow-xl sm:rounded-lg">
    <div>
        <x-jet-dialog-modal wire:model="editTask">
            <x-slot name="title">
                {{ $mode && $mode == 'add' ? 'Add' : 'Edit' }} Task
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-3 items-center gap-4">
                    <div><label class="mr-4" for="">Title: </label></div>
                    <div class="col-span-2">
                        <input
                            class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example"
                            type="text" wire:model="title">
                        </input>
                    </div>
                    <div><label class="mr-4" for="">Due Date: </label></div>
                    <div class="col-span-2">
                        <input
                            class="form-select appearance-none
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding bg-no-repeat
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            type="date" wire:model="due_date">
                        </input>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('editTask')" wire:loading.attr="disabled">
                    Cancel
                </x-jet-secondary-button>

                <button class="ml-2 px-6 py-2 text-white font-semibold bg-blue-500 rounded-md" wire:click="submitTask"
                    wire:loading.attr="disabled">
                    {{ $mode && $mode == 'add' ? 'Add' : 'Edit' }} Task
                </button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    <div class="p-4 flex justify-between w-full">
        <h3 class="text-4xl font-bold ">Your To-do list</h3>
        <div class="flex">
            <a wire:click="addTask"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full cursor-pointer">
                Add new
            </a>
        </div>
    </div>
    <div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Task</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created At</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dateline</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Project Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Assigned By</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if (count($tasks) > 0)
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $task->title }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ date('d/m/Y', strtotime($task->created_at)) }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ date('d/m/Y', strtotime($task->due_date)) }}</div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> {{($task->project_id) ? $task->project->name : 'None'}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div class="text-sm font-medium text-gray-900">{{$task->user->name}}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($task->status == 'Pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                                                    Not Started </span>

                                                @elseif($task->status == 'Progress')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-200 text-orange-800">
                                                    In Progress </span>


                                                @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-200 text-green-800">
                                                    Completed </span>
                                                    
                                                @endif
                                                
                                            </td>

                                            <td class="py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button wire:click="$toggle('editTask')"
                                                    class="px-4 py-2 rounded-lg bg-gray-500 text-white">Edit</button>
                                                    <button wire:click="$toggle('editTask')"
                                                    class="px-4 py-2 rounded-lg bg-red-500 text-white">Delete</button>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="p-6">
                                            <div class="flex justify-center">
                                                <div class="text-center">
                                                    <h1 class="text-gray-500 text-xl font-semibold">No Tasks Found</h1>
                                                </div>
                                            </div>
                                        </td>

                                @endif
                                <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
