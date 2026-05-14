@props(["block", "isFullPage" => true])
@if ($block->items->count())
    @if ($block->render_title)
        <x-tt::h2 class="mb-indent-half">{{ $block->render_title }}</x-tt::h2>
    @endif
    <div id="swiperBlockReview-{{ $block->id }}">
        @foreach($block->items as $index => $item)
            <x-ersb::types.reviews.item :$item />
        @endforeach
    </div>
@endif
