@extends('front.layouts.app')

@section('content')
<body class="font-poppins text-[#030303] bg-[#F6F5FA] pb-[100px] px-4 sm:px-0">
<x-nav/>
<div class="empty-state flex flex-col flex-1 items-center justify-center mx-auto gap-[50px] sm:min-h-[calc(100vh-212px)] max-sm:mt-[132px]">
    <div class="w-[100px] h-[100px] flex shrink-0">
        <img src="{{asset('assets/icons/message-remove.svg')}}" alt="icon">
    </div>
    <div class="flex flex-col gap-[6px] text-center w-[345px]">
        <p class="font-bold text-xl leading-[30px]">Out Of Connect :(</p>
        <p class="text-sm leading-[28px]">Connect yang Anda miliki telah habis sehingga proses apply pekerjaan tidak berhasil.</p>
    </div>
    <div class="flex items-center w-[380px] gap-3 text-center">
        <a href="" class="p-[14px_20px] rounded-full bg-[#030303] font-semibold text-white w-full">Contact CS</a>
        <a href="" class="p-[14px_20px] rounded-full bg-[#6635F1] font-semibold text-white w-full">Topup Connect</a>
    </div>
  </div>
</body>
@endsection
