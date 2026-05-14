<?php

namespace GIS\EditableReviewSliderBlock\Helpers;

use GIS\EditableReviewSliderBlock\Interfaces\ReviewSliderRecordInterface;

class ReviewSliderBlockRenderActionsManager
{
    public function expandReviewSlideRecord(ReviewSliderRecordInterface $record): void
    {
        $record->load("orderedImages");
    }
}
