@extends('front.layouts.app')

@section('content')
<body class="font-poppins text-[#030303] bg-[#F6F5FA] pb-[100px] px-4 sm:px-0">
    <x-nav/>
    <section id="header" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 mt-[50px]">
        <div class="flex flex-col gap-5">
            <div class="flex gap-[30px] items-center">
                <a href="{{route('front.index')}}" class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Browse</a>
                <span>/</span>
                <a href="#" class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Category</a>
                <span>/</span>
                <a href="#" class="last-of-type:font-semibold active:font-semibold transition-all duration-300">{{$category->name}}</a>
            </div>
            <h1 class="font-extrabold text-[40px] leading-[45px] text-center sm:text-left">{{$category->name}}</h1>
        </div>
        <x-search-bar
        placeholder="Search for jobs..."
        searchIcon="{{asset('assets/icons/search.svg')}}"
        filterButtonText="Filter Jobs"
    />
      </section>
      <section id="card-container" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row sm:flex-nowrap gap-5 mt-[50px]">
        <div class="flex flex-col gap-4 w-full">
            <div class="grid sm:grid-cols-3 gap-5">
                @forelse ($category->project as $project)
                <a href="{{route('front.details', $project)}}" class="card">
                    <div class="p-5 rounded-[20px] bg-white flex flex-col gap-5 hover:ring-2 hover:ring-[#6635F1] transition-all duration-300">
                        <div class="w-full h-[140px] rounded-[20px] overflow-hidden relative">
                            @if ($project->has_finished)
                            <div class="font-bold text-xs leading-[18px] text-white bg-[#F3445C] p-[2px_10px] rounded-full w-fit absolute top-[10px] left-[10px]">CLOSED</div>
                            @else
                                @if ($project->has_started)
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#f3670a] p-[2px_10px] rounded-full w-fit absolute top-[10px] left-[10px]">In Proress</div>
                                @else
                                <div class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit absolute top-[10px] left-[10px]">HIRING</div>
                                @endif
                            @endif
                            <img src="{{Storage::url($project->thumbnail)}}" class="w-full h-full object-cover" alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-[10px]">
                            <p class="title font-semibold text-lg min-h-[56px] line-clamp-2 hover:line-clamp-none">{{$project->name}}</p>
                            <div class="flex items-center gap-[6px]">
                                <div>
                                    <img src="{{asset('assets/icons/dollar-circle.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold text-sm">Rp {{number_format($project->budget, 0,',','.')}}</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <div>
                                    <img src="{{asset('assets/icons/verify.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold text-sm">Payment Verified</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <div>
                                    <img src="{{asset('assets/icons/crown.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold text-sm">{{$project->skill_level}}</p>
                            </div>
                        </div>
                    </div>
                </a>
        @empty
        <p>Belum ada project yang tersedia</p>
        @endforelse
            </div>
        </div>
        <x-resources/>
      </section>
</body>
@endsection
