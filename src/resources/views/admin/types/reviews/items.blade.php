<div class="mx-auto w-11/12 mt-indent-half space-y-indent-half" x-collapse x-show="expanded">
    @foreach($items as $item)
        <div class="card" wire:key="review-slider-block-cover-{{ $item->id }}">
            <div class="card-header">
                <div class="flex items-center justify-between">
                    @include("eb::admin.types.includes.priority-buttons")
                    @include("eb::admin.types.includes.edit-delete-buttons")
                </div>
            </div>
            <div class="card-body">
                @include("ersb::admin.types.reviews.item")
                @include("eb::admin.types.includes.help-info")
            </div>
            <div class="border-b border-stroke"></div>
            <livewire:fa-images :model="$item->recordable"
                                postfix="ReviewSlideBlock{{ $item->id }}-{{ $item->recordable->id }}"
                                no-card-cover wire:key="{{ $item->id }}--{{ $item->recordable->id }}" />
        </div>
    @endforeach
</div>
