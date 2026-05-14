<?php

namespace GIS\EditableReviewSliderBlock\Facades;

use GIS\EditableReviewSliderBlock\Helpers\ReviewSliderBlockRenderActionsManager;
use GIS\EditableReviewSliderBlock\Interfaces\ReviewSliderRecordInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void expandReviewSlideRecord(ReviewSliderRecordInterface $record)
 *
 * @see ReviewSliderBlockRenderActionsManager
 */
class ReviewSliderBlockRenderActions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'review-slider-block-render-actions';
    }
}
