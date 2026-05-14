<?php

namespace GIS\EditableReviewSliderBlock\Models;

use GIS\EditableBlocks\Traits\ShouldBlockItem;
use GIS\EditableReviewSliderBlock\Interfaces\ReviewSliderRecordInterface;
use GIS\Fileable\Traits\ShouldGallery;
use GIS\TraitsHelpers\Traits\ShouldMarkdown;
use Illuminate\Database\Eloquent\Model;

class ReviewSliderRecord extends Model implements ReviewSliderRecordInterface
{
    use ShouldBlockItem, ShouldMarkdown, ShouldGallery;

    protected $fillable = [
        "description",
        "date",
        "author_name",
    ];

    public function getHumanDateAttribute(): ?string
    {
        $value = $this->date;
        if (empty($value)) { return $value; }
        return date_helper()->format($value, "d.m.Y");
    }
}
