<div class="p-indent-half bg-white rounded-base h-full flex flex-col">
    <div class="flex items-start justify-between space-x-indent-half h-[70px] 2xl:h-[75px]">
        <div class="border rounded-base p-indent">
            Место под изображения
        </div>
        @if ($item->recordable->date)
            <div class="hidden xs:flex md:hidden lg:flex items-center space-x-indent-xs ml-auto p-indent-xs border border-stroke rounded-base">
                <x-ersb::ico.calendar class="text-primary" />
                <span class="text-sm text-body/60">{{ $item->recordable->human_date }}</span>
            </div>
        @endif
    </div>
    <div class="my-8">
        @if ($item->recordable->date)
            <x-ersb::ico.quotes class="hidden xs:inline-block md:hidden lg:inline-block text-secondary" />
            <div class="flex xs:hidden md:flex lg:hidden items-center space-x-indent-xs">
                <x-ersb::ico.calendar class="text-secondary" />
                <span class="text-sm text-body/60">{{ $item->recordable->human_date }}</span>
            </div>
        @else
            <x-ersb::ico.quotes class="text-secondary" />
        @endif
    </div>
    @if ($item->recordable->description)
        <div class="flex-1 prose prose-lg leading-6 max-w-none">
            {!! $item->recordable->markdown !!}
        </div>
    @endif
    @if ($item->recordable->author_name)
        <div class="mt-8 text-lg font-semibold">
            {{ $item->recordable->author_name }}
        </div>
    @endif
</div>
