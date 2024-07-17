<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Tools') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="px-5 py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <div class="item-card flex flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($project->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$project->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$project->category->name}}</p>
                        </div>
                    </div>
                </div>
                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">Add Tools</h3>

                <form method="POST" action="{{route('admin.projects.tools.store', $project->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="tools" :value="__('tools')" />

                        <select name="tool_id" id="tool_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose tools</option>
                            @foreach ($tools as $tool)
                            <option value="{{$tool->id}}">{{$tool->name}}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add Tool
                        </button>
                    </div>
                </form>

                <hr class="my-5">

                <h3 class="text-indigo-950 text-xl font-bold">Tools</h3>

                @forelse ($project->tools as $tool)
                <div class="flex flex-row bg-red justify-between">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($tool->icon)}}" alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$tool->name}}</h3>
                        </div>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <form action="{{route('admin.project_tools.destroy', $tool->pivot->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p>Belum ada Tools pada project ini</p>

                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
