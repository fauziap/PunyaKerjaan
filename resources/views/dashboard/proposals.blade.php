<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Proposals') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                <div class="item-card flex flex-col md:flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="#" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">lorem project name</h3>
                            <p class="text-slate-500 text-sm">caegory</p>
                        </div>
                    </div>

                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Budget</p>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp 2</h3>
                    </div>

                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Applied at</p>
                        <h3 class="text-indigo-950 text-xl font-bold">date</h3>
                    </div>
                    
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="#" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Details
                        </a>
                    </div>
                </div>


                
            </div>
        </div>
    </div>
</x-app-layout>
