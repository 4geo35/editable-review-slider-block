<?php

return [
    "availableTypes" => [
        "reviewSlides" => [
            "title" => env("EDITABLE_REVIEW_SLIDER_TITLE", "Отзывы"),
            "admin" => "ersb-reviews",
            "render" => "ersb::types.reviews",
        ],
    ],

    "expandRender" => [
        "expandReviewSlideRecord" => [
            "class" => \GIS\EditableReviewSliderBlock\Facades\ReviewSliderBlockRenderActions::class,
            "method" => "expandReviewSlideRecord",
        ],
    ],

    // Models
    "customReviewSlideRecord" => null,
    "customReviewSlideRecordObserver" => null,

    // Manager
    "customBlockRecordActionsManager" => null,

    // Components
    "customReviewsComponent" => null, // ersb-reviews

    // Templates
    "templates" => [],
];
