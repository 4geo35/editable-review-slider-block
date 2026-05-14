<?php

namespace GIS\EditableReviewSliderBlock\Observers;

use GIS\EditableReviewSliderBlock\Interfaces\ReviewSliderRecordInterface;

class ReviewSliderRecordObserver
{
    public function updated(ReviewSliderRecordInterface $record): void
    {
        $item = $record->item;
        if (! $item) { return; }
        $item->touch();
    }
}
