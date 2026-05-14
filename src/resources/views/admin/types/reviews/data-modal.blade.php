<x-tt::modal.dialog wire:model="displayData">
    <x-slot name="title">{{ $itemId ? "Редактировать" : "Добавить" }} элемент</x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="{{ $itemId ? 'update' : 'store' }}" class="space-y-indent-half"
              id="reviewSlideBlockDataForm-{{ $block->id }}">

            <div>
                <label for="reviewSlideBlockAuthor-{{ $block->id }}" class="inline-block mb-2">
                    Имя автора
                </label>
                <input type="text" id="reviewSlideBlockAuthor-{{ $block->id }}"
                       class="form-control {{ $errors->has("authorName") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="authorName">
                <x-tt::form.error name="authorName"/>
            </div>

            <div>
                <label for="reviewSlideBlockDate-{{ $block->id }}" class="inline-block mb-2">
                    Дата
                </label>
                <input type="date" id="reviewSlideBlockDate-{{ $block->id }}"
                       class="form-control {{ $errors->has("date") ? "border-danger" : "" }}"
                       wire:loading.attr="disabled"
                       wire:model="date">
                <x-tt::form.error name="date"/>
            </div>

            <div>
                <label for="reviewSlideBlockDescription-{{ $block->id }}" class="flex justify-start items-center mb-2">
                    Текст отзыва
                    @include("tt::admin.description-button", ["id" => "reviewSlideBlockDescriptionHidden-" . $block->id])
                </label>
                @include("tt::admin.description-info", ["id" => "reviewSlideBlockDescriptionHidden-" . $block->id])
                <textarea id="reviewSlideBlockDescription-{{ $block->id }}" class="form-control !min-h-52 {{ $errors->has('description') ? 'border-danger' : '' }}"
                          rows="10"
                          wire:model.live="description">
                        {{ $description }}
                    </textarea>
                <x-tt::form.error name="description" />

                <div class="prose prose-sm mt-indent-half">
                    {!! \Illuminate\Support\Str::markdown($description) !!}
                </div>
            </div>

            <div class="flex items-center space-x-indent-half">
                <button type="button" class="btn btn-outline-dark" wire:click="closeData">
                    Отмена
                </button>
                <button type="submit" form="reviewSlideBlockDataForm-{{ $block->id }}" class="btn btn-primary"
                        wire:loading.attr="disabled">
                    {{ $itemId ? "Обновить" : "Добавить" }}
                </button>
            </div>
        </form>
    </x-slot>
</x-tt::modal.dialog>
