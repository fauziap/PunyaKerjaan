<div class="flex flex-col sm:w-[300px] h-fit shrink-0 bg-white rounded-[20px] p-5 gap-[30px] sm:mt-[45px]">
    <div class="flex flex-col gap-3">
        <h3 class="font-semibold">Your Profile</h3>
        @auth
        <div class="flex items-center gap-3">
            <div class="w-[50px] h-[50px] rounded-full overflow-hidden flex shrink-0">
                <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
            </div>
            <div class="flex flex-col gap-[2px]">
                <p class="font-semibold">{{Auth::user()->name}}</p>
                <p class="text-sm leading-[21px] text-[#545768]">911 Finished Projects</p>
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
                <p class="font-semibold text-sm">(893)</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col gap-[10px] rounded-[20px] p-[10px_14px] bg-[#030303]">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 flex shrink-0">
                <img src="{{asset('assets/icons/story.svg')}}" alt="">
            </div>
            <p class="text-sm text-white">You have <span class="font-bold">{{Auth::user()->connect}}</span> connects available to get a new job</p>
        </div>
        <a href="" class="font-semibold text-white text-sm hover:underline text-center">Top Up Connect</a>
    </div>
    @endauth
    <hr>
    <div class="flex flex-col gap-3">
        <h3 class="font-semibold">Resources</h3>
        <div class="flex flex-col gap-[18px]">
            <a href="" class="resources-card">
                <div class="group flex gap-3 items-center">
                    <div class="w-[50px] h-[50px] flex shrink-0">
                        <img src="{{asset('assets/icons/perosnalcard.svg')}}" alt="icon">
                    </div>
                    <div class="flex flex-col justify-center gap-[2px]">
                        <p class="font-semibold group-hover:underline">Gawe Academy</p>
                        <p class="text-sm text-[#545768]">Improve your skills today</p>
                    </div>
                </div>
            </a>
            <a href="" class="resources-card">
                <div class="group flex gap-3 items-center">
                    <div class="w-[50px] h-[50px] flex shrink-0">
                        <img src="{{asset('assets/icons/note-add.svg')}}" alt="icon">
                    </div>
                    <div class="flex flex-col justify-center gap-[2px]">
                        <p class="font-semibold group-hover:underline">Invoice Marker</p>
                        <p class="text-sm text-[#545768]">Get the payment faster</p>
                    </div>
                </div>
            </a>
            <a href="" class="resources-card">
                <div class="group flex gap-3 items-center">
                    <div class="w-[50px] h-[50px] flex shrink-0">
                        <img src="{{asset('assets/icons/ruler&pen.svg')}}" alt="icon">
                    </div>
                    <div class="flex flex-col justify-center gap-[2px]">
                        <p class="font-semibold group-hover:underline">Assets Pixels Pro</p>
                        <p class="text-sm text-[#545768]">Design templates</p>
                    </div>
                </div>
            </a>
            <a href="" class="resources-card">
                <div class="group flex gap-3 items-center">
                    <div class="w-[50px] h-[50px] flex shrink-0">
                        <img src="{{asset('assets/icons/code.svg')}}" alt="icon">
                    </div>
                    <div class="flex flex-col justify-center gap-[2px]">
                        <p class="font-semibold group-hover:underline">Codelab Testing Unit</p>
                        <p class="text-sm text-[#545768]">Development</p>
                    </div>
                </div>
            </a>
            <a href="" class="resources-card">
                <div class="group flex gap-3 items-center">
                    <div class="w-[50px] h-[50px] flex shrink-0">
                        <img src="{{asset('assets/icons/user-octagon.svg')}}" alt="icon">
                    </div>
                    <div class="flex flex-col justify-center gap-[2px]">
                        <p class="font-semibold group-hover:underline">Interview Mocking</p>
                        <p class="text-sm text-[#545768]">Deal with your top clients</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
