@extends('front.layouts.app')
@section('content')
<body class="font-poppins text-[#030303] bg-[#F6F5FA] pb-[100px] px-4 sm:px-0">
    <x-nav/>
  <section id="breadcrumb" class="container max-w-[1130px] mx-auto mt-[30px]">
    <div class="flex gap-[30px] items-center">
        <a href="{{route('front.index')}}" class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Browse</a>
        <span>/</span>
        <a href="" class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Projects</a>
        <span>/</span>
        <a href="" class="last-of-type:font-semibold active:font-semibold transition-all duration-300">Apply</a>
    </div>
  </section>
  <section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row sm:flex-nowrap gap-5 mt-[30px]">
    <div class="flex flex-col gap-5">
        <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] h-fit">
            <div class="w-full bg-[#0FB848] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="{{asset('assets/icons/global.svg')}}" alt="icon">
                </div>
                <p class="text-white font-semibold text-sm">This project is worldwide means that you can apply and working from wherever you are.</p>
            </div>
            <div class="flex flex-col sm:flex-row items-center gap-5">
                <div class="flex shrink-0 w-[230px] h-[150px] rounded-[20px] overflow-hidden">
                    <img src="{{asset('assets/thumbnails/thumbnail-1.png')}}" class="w-full h-full object-cover" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-1">
                    @if ($project->has_finished)
                    <div class="font-bold text-xs leading-[18px] text-white bg-[#fe2e2e] p-[2px_10px] rounded-full w-fit">CLOSED</div>
                    @else
                        @if ($project->has_started)
                        <div class="font-bold text-xs leading-[18px] text-white bg-[#fe702e] p-[2px_10px] rounded-full w-fit">In Proress</div>
                        @else
                        <div class="font-bold text-xs leading-[18px] text-white bg-[#2E82FE] p-[2px_10px] rounded-full w-fit">HIRING</div>
                        @endif
                    @endif
                    <h1 class="font-extrabold text-[30px] leading-[45px]">{{$project->name}}</h1>
                </div>
            </div>
            <div class="flex flex-col gap-[6px] w-full">
                <h3 class="font-semibold">Details</h3>
                <div class="grid sm:grid-cols-3 gap-5">
                    <div class="flex items-center gap-[10px] p-5 border border-[#F1F1F1] rounded-[20px] bg-white">
                        <div class="w-[38px] h-[38px] flex shrink-0">
                            <img src="{{Storage::url($project->thumbnail)}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <div class="flex flex-col justify-center gap-[2px]">
                            <p class="text-sm text-[#545768]">Budget</p>
                            <p class="font-bold">Rp {{$project->budget}}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-[10px] p-5 border border-[#F1F1F1] rounded-[20px] bg-white">
                        <div class="w-[38px] h-[38px] flex shrink-0">
                            <img src="{{asset('assets/icons/verify.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <div class="flex flex-col justify-center gap-[2px]">
                            <p class="text-sm text-[#545768]">Payment</p>
                            <p class="font-bold">Verified</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-[10px] p-5 border border-[#F1F1F1] rounded-[20px] bg-white">
                        <div class="w-[38px] h-[38px] flex shrink-0">
                            <img src="{{asset('assets/icons/crown.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <div class="flex flex-col justify-center gap-[2px]">
                            <p class="text-sm text-[#545768]">Level</p>
                            <p class="font-bold">{{$project->skill_level}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] h-fit">
            <h2 class="font-bold text-xl leading-[30px]">Ready to Work? Apply Now</h2>
            <p class="font-semibold">Cover Letter</p>
            <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="{{asset('assets/icons/story.svg')}}" alt="icon">
                </div>
                <p class="text-white font-normal text-sm"><span class="font-bold">1 connect</span> will be deducted from your account to apply this job</p>
            </div>
            <form method="POST" action="{{route('front.apply_job.store', $project)}}" class="flex flex-col gap-5">
                @csrf
                <div class="flex p-[14px_20px] border border-[#030303] rounded-[20px] gap-[10px]">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{asset('assets/icons/sms-star.svg')}}" alt="icon">
                    </div>
                    <textarea name="message" id="" rows="8" class="focus:ring-0  border-none appearance-none font-medium leading-[30px] placeholder:font-normal placeholder:text-[#545768] w-full resize-none" placeholder="Write your experience related to this project"></textarea>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 items-center">
                    <button class="font-semibold bg-[#030303] p-[14px_20px] rounded-full text-center w-full text-white">Save as a Draft</button>
                    <button type="submit" class="font-semibold bg-[#6635F1] p-[14px_20px] rounded-full text-center w-full text-white">Apply Now</button>
                </div>
            </form>
        </div>
    </div>
    <div class="flex flex-col sm:w-[300px] h-fit shrink-0 bg-white rounded-[20px] p-5 gap-[30px]">
        <div class="flex flex-col gap-3">
            <h3 class="font-semibold">About Client</h3>
            <div class="flex items-center gap-3">
                <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex shrink-0">
                    <img src="{{Storage::url($project->owner->avatar)}}" class="w-full h-full object-cover" alt="photo">
                </div>
                <div class="flex flex-col gap-[2px]">
                    <p class="font-semibold">{{$project->owner->name}}</p>
                    <p class="text-sm leading-[21px] text-[#545768]">{{$project->owner->projects->count()}} Total Projects</p>
                </div>
            </div>
            <div class="flex items-center gap-[6px]">
                <div class="flex items-center">
                    <div>
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="star">
                    </div>
                    <div>
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="star">
                    </div>
                    <div>
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="star">
                    </div>
                    <div>
                        <img src="{{asset('assets/icons/Star.svg')}}" alt="star">
                    </div>
                    <div>
                        <img src="{{asset('assets/icons/Star-grey.svg')}}" alt="star">
                    </div>
                    <p class="font-semibold text-sm">(24,499)</p>
                </div>
            </div>
        </div>
        <hr>
        <a href="" class="font-semibold border border-[#030303] p-[14px_20px] rounded-full text-center">Report this Job</a>
    </div>
  </section>
</body>
@endsection
