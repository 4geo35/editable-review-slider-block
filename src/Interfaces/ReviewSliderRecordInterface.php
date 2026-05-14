<?php

namespace GIS\EditableReviewSliderBlock\Interfaces;

use ArrayAccess;
use JsonSerializable;
use Stringable;
use GIS\EditableBlocks\Interfaces\ShouldBlockItemInterface;
use GIS\Fileable\Interfaces\ShouldGalleryInterface;
use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\CanBeEscapedWhenCastToString;
use Illuminate\Contracts\Support\Jsonable;

interface ReviewSliderRecordInterface extends Arrayable, ArrayAccess, CanBeEscapedWhenCastToString,
    HasBroadcastChannel, Jsonable, JsonSerializable, QueueableEntity, Stringable, UrlRoutable,
    ShouldBlockItemInterface, ShouldGalleryInterface
{

}
