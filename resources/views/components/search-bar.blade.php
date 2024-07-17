<div class="flex flex-col sm:flex-row justify-end items-center gap-3 w-full sm:w-auto">
    <div class="p-2 pl-5 rounded-full bg-white flex items-center justify-between gap-2 w-full sm:w-[500px] focus-within:ring-2 focus-within:ring-[#6635F1] transition-all duration-300">
        <input type="text" class="appearance-none outline-none focus:ring-0 focus:outline-none font-semibold placeholder:font-normal border-none placeholder:text-[#545768] w-full" placeholder="{{ $placeholder ?? 'Do quick search job by name...' }}">
        <button class="w-9 h-9 flex shrink-0">
            <img src="{{ asset($searchIcon ?? 'assets/icons/search.svg') }}" alt="icon">
        </button>
    </div>
    <div class="h-[52px] w-0 border border-[#DCDAE3] hidden sm:block"></div>
    <button class="p-[14px_20px] bg-white rounded-full font-semibold">{{ $filterButtonText ?? 'Job Filters' }}</button>
</div>
