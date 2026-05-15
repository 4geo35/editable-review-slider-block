@props(["item"])
@php
    $imageCount = $item->recordable->orderedImages->count();
    $hasMore = $imageCount > 4;
    $hiddenCount = $imageCount - 3;
    $fullImageCollection = $item->recordable->orderedImages;
    $imageCollection = $imageCount <= 4 ? $fullImageCollection : $fullImageCollection->take(3);
    $hiddenCollection = $hasMore ? $fullImageCollection->slice(3) : collect([]);
@endphp
<div class="swiper-slide !h-auto flex">
    <div class="p-indent-half bg-white rounded-base h-full flex flex-col">
        <div class="flex items-start justify-between space-x-indent h-[75px]">
            @if ($imageCount)
                <div class="flex items-center justify-start">
                    @foreach($imageCollection as $image)
                        <a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $image->file_name]) }}"
                           data-fslightbox="lightbox-review-slider-block-{{ $item->id }}"
                           class="inline-block {{ $loop->first ? '' : '-ml-6' }} rounded-full hover:opacity-95">
                            <img
                                class="rounded-full border-2 border-white"
                                src="{{ route('thumb-img', ['template' => 'review-slider-image', 'filename' => $image->file_name]) }}"
                                alt="">
                        </a>
                    @endforeach
                    @if ($hasMore)
                        @foreach($hiddenCollection as $image)
                            <a href="{{ route('thumb-img', ['template' => 'original', 'filename' => $image->file_name]) }}"
                               data-fslightbox="lightbox-review-slider-block-{{ $item->id }}"
                               class="{{ $loop->first ? 'flex items-center justify-center w-[75px] h-[75px] -ml-6 bg-primary hover:bg-primary-hover rounded-full transition-colors' : 'hidden' }}">
                                @if ($loop->first) <span class="text-white font-semibold text-lg">+{{ $hiddenCount }}</span> @endif
                            </a>
                        @endforeach
                    @endif
                </div>
            @endif
            @if ($item->recordable->date)
                <div class="ml-auto flex items-center space-x-indent-xs p-indent-xs border border-stroke rounded-base">
                    <x-ersb::ico.calendar class="text-primary" />
                    <span class="text-sm text-body/60">{{ $item->recordable->human_date }}</span>
                </div>
            @endif
        </div>
        <div class="text-secondary my-8">
            <x-ersb::ico.quotes />
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
</div>
