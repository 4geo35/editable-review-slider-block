<?php

namespace GIS\EditableReviewSliderBlock\Livewire\Admin\Types;

use GIS\EditableBlocks\Traits\CheckBlockAuthTrait;
use GIS\EditableBlocks\Traits\EditBlockTrait;
use GIS\EditableBlocks\Traits\PlaceholderBlockTrait;
use GIS\EditableReviewSliderBlock\Models\ReviewSliderRecord;
use Illuminate\View\View;
use Livewire\Component;

class ReviewsWire extends Component
{
    use EditBlockTrait, CheckBlockAuthTrait, PlaceholderBlockTrait;

    public bool $displayData = false;
    public bool $displayDelete = false;

    public int|null $itemId = null;

    public string $description = "";
    public string $date = "";
    public string $authorName = "";

    public function rules(): array
    {
        return [
            "date" => ["nullable", "date"],
            "authorName" => ["nullable", "string", "max:250"],
        ];
    }

    public function validationAttributes(): array
    {
        return [
            "date" => "Дата",
            "authorName" => "Имя автора",
        ];
    }

    public function render(): View
    {
        $items = $this->block->items()->with("recordable")->orderBy("priority")->get();
        return view("ersb::livewire.admin.types.reviews-wire", compact("items"));
    }

    public function closeData(): void
    {
        $this->resetFields();
        $this->displayData = false;
    }

    public function showCreate(): void
    {
        $this->resetFields();
        if (! $this->checkAuth("create")) { return; }
        $this->displayData = true;
    }

    public function store(): void
    {
        if (! $this->checkAuth("create")) { return; }
        $this->validate();

        $modelClass = config("editable-review-slider-block.customReviewSlideRecord") ?? ReviewSliderRecord::class;
        $record = $modelClass::query()->create([
            "description" => $this->description,
            "date" => empty($this->date) ? null : $this->date,
            "author_name" => $this->authorName,
        ]);
        /**
         * @var ReviewSliderRecord $record
         */
        $record->item()->create([
            "block_id" => $this->block->id,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно добавлен");
    }

    public function showEdit(int $modelId): void
    {
        $this->resetFields();
        $this->itemId = $modelId;
        $model = $this->findModel();
        if (! $model) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $record = $model->recordable;

        $this->description = $record->description;
        $this->date = (string) $record->date;
        $this->authorName = $record->author_name;

        $this->displayData = true;
    }

    public function update(): void
    {
        $model = $this->findModel();
        if (! $model) { return; }
        if (! $this->checkAuth("update", true)) { return; }
        $this->validate();
        $record = $model->recordable;
        /**
         * @var ReviewSliderRecord $record
         */
        $record->update([
            "description" => $this->description,
            "date" => empty($this->date) ? null : $this->date,
            "author_name" => $this->authorName,
        ]);

        $this->closeData();
        session()->flash("item-{$this->block->id}-success", "Элемент успешно обновлен");
    }

    protected function resetFields(): void
    {
        $this->reset("date", "authorName", "description", "itemId");
    }

}
