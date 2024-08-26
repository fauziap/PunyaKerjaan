<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proposal Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                @if($project->has_finished)
                    @if($projectApplicant->status == 'Hired')
                    <span class="text-white font-bold bg-green-500 rounded-2xl w-full p-5">
                        Projek telah selesai dan revenue sudah ditambahkan kepada Wallet Anda
                    </span>
                    @else
                    <span class="text-white font-bold bg-orange-500 rounded-2xl w-full p-5">
                        Projek telah selesai, silahkan apply pada projek yang tersedia lainnya
                    </span>
                    @endif
                @else
                <span class="text-white font-bold bg-cyan-500 rounded-2xl w-full p-5">
                    Projek masih dalam peninjauan
                </span>
                @endif


                <h3 class="text-indigo-950 text-xl font-bold">You've applied to this job</h3>

                <div class="item-card flex flex-row gap-y-10 justify-between md:items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{Storage::url($project->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{$project->name}}</h3>
                            <p class="text-slate-500 text-sm">{{$project->category->name}}</p>
                        </div>
                    </div>
                    <a href="{{route('front.details', $project->slug)}}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                        View Details
                    </a>

                </div>

                <hr class="my-5">

                <div class="flex flex-row justify-between">
                    <div class="flex flex-row justify-between items-center w-full">
                        <div class="flex flex-row gap-x-4 items-center">
                            <img src="{{Storage::url($projectApplicant->freelancer->avatar)}}" alt="" class="rounded-full object-cover w-[70px] h-[70px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{$projectApplicant->freelancer->name}}</h3>
                                <p class="text-slate-500 text-sm">{{$projectApplicant->occupation}}</p>
                            </div>
                        </div>

                        @if($projectApplicant->status == 'Hired')
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                YOU'RE HIRED
                            </span>
                        @elseif($projectApplicant->status == 'Waiting')
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                WAITING FOR APPROVAL
                            </span>
                        @elseif($projectApplicant->status == 'Rejected')
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-red-500 text-white">
                                REJECTED
                            </span>
                        @endif

                    </div>
                </div>
                <p class="text-indigo-950 text-md font-medium">
                    {{$projectApplicant->message}}
                </p>
                <p class="text-slate-500 text-sm">
                    {{$projectApplicant->created_at->format('d M Y')}}
                </p>

                @if($projectApplicant->status == 'Hired')
                <hr class="my-5">
                <div class="flex flex-row gap-x-3 items-center">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.0891 6.98002C20.2391 6.04002 18.8191 5.57002 16.7591 5.57002H16.5191V5.53002C16.5191 3.85002 16.5191 1.77002 12.7591 1.77002H11.2391C7.47906 1.77002 7.47906 3.86002 7.47906 5.53002V5.58002H7.23906C5.16906 5.58002 3.75906 6.05002 2.90906 6.99002C1.91906 8.09002 1.94906 9.57002 2.04906 10.58L2.05906 10.65L2.15906 11.7C2.16906 11.71 2.18906 11.73 2.20906 11.74C2.53906 11.96 2.87906 12.18 3.23906 12.38C3.37906 12.47 3.52906 12.55 3.67906 12.63C5.38906 13.57 7.26906 14.2 9.17906 14.51C9.26906 15.45 9.67906 16.55 11.8691 16.55C14.0591 16.55 14.4891 15.46 14.5591 14.49C16.5991 14.16 18.5691 13.45 20.3491 12.41C20.4091 12.38 20.4491 12.35 20.4991 12.32C20.9591 12.06 21.3891 11.78 21.8091 11.47C21.8291 11.46 21.8491 11.44 21.8591 11.42L21.8991 11.06L21.9491 10.59C21.9591 10.53 21.9591 10.48 21.9691 10.41C22.0491 9.40002 22.0291 8.02002 21.0891 6.98002ZM13.0891 13.83C13.0891 14.89 13.0891 15.05 11.8591 15.05C10.6291 15.05 10.6291 14.86 10.6291 13.84V12.58H13.0891V13.83ZM8.90906 5.57002V5.53002C8.90906 3.83002 8.90906 3.20002 11.2391 3.20002H12.7591C15.0891 3.20002 15.0891 3.84002 15.0891 5.53002V5.58002H8.90906V5.57002Z" fill="#292D32"/>
                        <path opacity="0.4" d="M20.5002 12.2999C20.4502 12.3299 20.4002 12.3599 20.3502 12.3899C18.5702 13.4299 16.6002 14.1299 14.5602 14.4699C14.4802 15.4299 14.0602 16.5299 11.8702 16.5299C9.68016 16.5299 9.26016 15.4399 9.18016 14.4899C7.27016 14.1899 5.39016 13.5599 3.68016 12.6099C3.53016 12.5299 3.38016 12.4499 3.24016 12.3599C2.88016 12.1599 2.54016 11.9399 2.21016 11.7199C2.19016 11.7099 2.17016 11.6899 2.16016 11.6799L2.77016 18.1899C2.98016 20.1799 3.80016 22.2299 8.20016 22.2299H15.8202C20.2202 22.2299 21.0402 20.1799 21.2502 18.1799L21.8802 11.3999C21.8702 11.4199 21.8502 11.4399 21.8302 11.4499C21.4002 11.7599 20.9602 12.0499 20.5002 12.2999Z" fill="#292D32"/>
                        </svg>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">You're Hired!</h3>
                    <p class="text-slate-500 text-md">
                        Klien akan mengundang email Anda untuk berdiskusi pada Zoom Meeting.
                    </p>
                    </div>
                </div>
                <hr class="my-5">
                <h3 class="text-indigo-950 text-xl font-bold">Tired of Waiting? Contact Client Now</h3>
                <div class="flex flex-row gap-x-4 items-center border border-slate-200 w-fit px-5 py-3 rounded-2xl">
                    <svg width="38" height="38" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.58" d="M24 0H0V24H24V0Z" fill="white"/>
                        <path opacity="0.4" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="#292D32"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.25 9.67976V12.4798C6.25 14.0198 7.50001 15.2598 9.04001 15.2498L12.72 15.2198C13.23 15.2198 13.64 14.7998 13.64 14.2998V11.5298C13.64 9.99977 12.4 8.75977 10.87 8.75977H7.17999C6.65999 8.75977 6.25 9.16976 6.25 9.67976Z" fill="#292D32"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.75 10.0196V13.9996C17.75 14.4296 17.27 14.6896 16.91 14.4496L14.99 13.1696C14.84 13.0696 14.75 12.8996 14.75 12.7196V11.2996C14.75 11.1196 14.84 10.9496 14.99 10.8496L16.91 9.56964C17.27 9.32964 17.75 9.58963 17.75 10.0196Z" fill="#292D32"/>
                        </svg>
                <p class="text-indigo-950 text-lg font-bold">{{$projectApplicant->project->owner->email}}</p>

                </div>


                <hr class="my-5">
                <div class="flex flex-row gap-x-3 items-center">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.8" d="M12.8992 2.52009L12.8692 2.59009L9.96922 9.32009H7.11922C6.43922 9.32009 5.79922 9.45009 5.19922 9.71009L6.94922 5.53009L6.98922 5.44009L7.04922 5.28009C7.07922 5.21009 7.09922 5.15009 7.12922 5.10009C8.43922 2.07009 9.91922 1.38009 12.8992 2.52009Z" fill="#292D32"/>
                        <path d="M18.2907 9.52002C17.8407 9.39002 17.3707 9.32002 16.8807 9.32002H9.9707L12.8707 2.59002L12.9007 2.52002C13.0407 2.57002 13.1907 2.64002 13.3407 2.69002L15.5507 3.62002C16.7807 4.13002 17.6407 4.66002 18.1707 5.30002C18.2607 5.42002 18.3407 5.53002 18.4207 5.66002C18.5107 5.80002 18.5807 5.94002 18.6207 6.09002C18.6607 6.18002 18.6907 6.26002 18.7107 6.35002C18.9707 7.20002 18.8107 8.23002 18.2907 9.52002Z" fill="#292D32"/>
                        <path opacity="0.4" d="M21.7602 14.1998V16.1498C21.7602 16.3498 21.7502 16.5498 21.7402 16.7398C21.5502 20.2398 19.6002 21.9998 15.9002 21.9998H8.10023C7.85023 21.9998 7.62023 21.9798 7.39023 21.9498C4.21023 21.7398 2.51023 20.0398 2.29023 16.8598C2.26023 16.6198 2.24023 16.3898 2.24023 16.1498V14.1998C2.24023 12.1898 3.46023 10.4598 5.20023 9.70982C5.80023 9.44982 6.44023 9.31982 7.12023 9.31982H16.8802C17.3702 9.31982 17.8402 9.38982 18.2902 9.51982C20.2902 10.1298 21.7602 11.9898 21.7602 14.1998Z" fill="#292D32"/>
                        <path opacity="0.6" d="M6.95023 5.52979L5.20023 9.70978C3.46023 10.4598 2.24023 12.1898 2.24023 14.1998V11.2698C2.24023 8.42979 4.26023 6.05979 6.95023 5.52979Z" fill="#292D32"/>
                        <path opacity="0.6" d="M21.7591 11.2698V14.1998C21.7591 11.9898 20.2891 10.1298 18.2891 9.51984C18.8091 8.22984 18.9691 7.19984 18.7091 6.34984C18.6891 6.25984 18.6591 6.17984 18.6191 6.08984C20.4891 7.05984 21.7591 9.02984 21.7591 11.2698Z" fill="#292D32"/>
                        <path d="M14.5 14.69H12.75V13C12.75 12.59 12.41 12.25 12 12.25C11.59 12.25 11.25 12.59 11.25 13V14.69H9.5C9.09 14.69 8.75 15.03 8.75 15.44C8.75 15.85 9.09 16.19 9.5 16.19H11.25V18C11.25 18.41 11.59 18.75 12 18.75C12.41 18.75 12.75 18.41 12.75 18V16.19H14.5C14.91 16.19 15.25 15.85 15.25 15.44C15.25 15.03 14.91 14.69 14.5 14.69Z" fill="#292D32"/>
                        </svg>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">Income Rp {{number_format( $project->budget ,0,',','.')}}</h3>
                    <p class="text-slate-500 text-md">
                        Revenue akan ditambahkan kepada Wallet Anda apabila projek sudah selesai.
                    </p>
                    </div>
                </div>
                @endif

                @if($projectApplicant->status == 'Rejected')
                <hr class="my-5">
                <div class="flex flex-row gap-x-3 items-center">
                    <svg width="50" height="50" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.5991 14.5101L13.0691 13.9801L13.5691 13.4801C13.8591 13.1901 13.8591 12.7101 13.5691 12.4201C13.2791 12.1301 12.7991 12.1301 12.5091 12.4201L12.0091 12.9201L11.4791 12.3901C11.1891 12.1001 10.7091 12.1001 10.4191 12.3901C10.1291 12.6801 10.1291 13.1601 10.4191 13.4501L10.9491 13.9801L10.3991 14.5301C10.1091 14.8201 10.1091 15.3001 10.3991 15.5901C10.5491 15.7401 10.7391 15.8101 10.9291 15.8101C11.1191 15.8101 11.3091 15.7401 11.4591 15.5901L12.0091 15.0401L12.5391 15.5701C12.6891 15.7201 12.8791 15.7901 13.0691 15.7901C13.2591 15.7901 13.4491 15.7201 13.5991 15.5701C13.8891 15.2801 13.8891 14.8101 13.5991 14.5101Z" fill="#292D32"/>
                        <path opacity="0.4" d="M21.8504 11.4099L21.2304 18.1899C21.0204 20.1899 20.2004 22.2299 15.8004 22.2299H8.18039C3.78039 22.2299 2.96039 20.1899 2.76039 18.1999L2.15039 11.6899C2.16039 11.6999 2.17039 11.7099 2.19039 11.7199C2.53039 11.9399 2.86039 12.1599 3.22039 12.3599C3.36039 12.4499 3.51039 12.5299 3.66039 12.6099C4.79039 13.2299 6.00039 13.7199 7.25039 14.0599C7.75039 14.2099 8.26039 14.3199 8.78039 14.4099C8.98039 16.0099 10.3504 17.2499 12.0004 17.2499C13.6704 17.2499 15.0504 15.9799 15.2304 14.3499V14.3399C15.7404 14.2399 16.2504 14.1099 16.7504 13.9599C18.0004 13.5699 19.2104 13.0499 20.3404 12.3899C20.4004 12.3599 20.4504 12.3299 20.4904 12.2999C20.9504 12.0499 21.3904 11.7599 21.8104 11.4599C21.8304 11.4499 21.8404 11.4299 21.8504 11.4099Z" fill="#292D32"/>
                        <path d="M21.0891 6.98002C20.2391 6.04002 18.8291 5.57002 16.7591 5.57002H16.5191V5.53002C16.5191 3.85002 16.5191 1.77002 12.7591 1.77002H11.2391C7.47906 1.77002 7.47906 3.85002 7.47906 5.53002V5.57002H7.23906C5.16906 5.57002 3.74906 6.04002 2.90906 6.98002C1.91906 8.09002 1.94906 9.56002 2.04906 10.57L2.05906 10.64L2.14906 11.69C2.15906 11.7 2.17906 11.71 2.19906 11.72C2.53906 11.94 2.86906 12.16 3.22906 12.36C3.36906 12.45 3.51906 12.53 3.66906 12.61C4.79906 13.23 6.00906 13.72 7.24906 14.06C7.27906 16.65 9.39906 18.75 11.9991 18.75C14.6191 18.75 16.7491 16.62 16.7491 14V13.96C18.0091 13.58 19.2191 13.05 20.3491 12.39C20.4091 12.36 20.4491 12.33 20.4991 12.3C20.9591 12.05 21.3991 11.76 21.8191 11.46C21.8291 11.45 21.8491 11.43 21.8591 11.41L21.8991 11.05L21.9491 10.58C21.9591 10.52 21.9591 10.47 21.9691 10.4C22.0491 9.40002 22.0291 8.02002 21.0891 6.98002ZM8.90906 5.53002C8.90906 3.83002 8.90906 3.19002 11.2391 3.19002H12.7591C15.0891 3.19002 15.0891 3.83002 15.0891 5.53002V5.57002H8.90906V5.53002ZM11.9991 17.25C10.3491 17.25 8.97906 16.01 8.77906 14.41C8.75906 14.28 8.74906 14.14 8.74906 14C8.74906 12.21 10.2091 10.75 11.9991 10.75C13.7891 10.75 15.2491 12.21 15.2491 14C15.2491 14.12 15.2391 14.23 15.2291 14.34V14.35C15.0491 15.98 13.6691 17.25 11.9991 17.25Z" fill="#292D32"/>
                        </svg>

                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">Sorry, Client Rejected You.</h3>
                    <p class="text-slate-500 text-md">
                        Semoga Anda akan beruntung pada kesempatan selanjutnya!
                    </p>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
