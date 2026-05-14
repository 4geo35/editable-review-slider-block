<?php

namespace GIS\EditableReviewSliderBlock;

use GIS\EditableBlocks\Traits\ExpandBlocksTrait;
use GIS\EditableReviewSliderBlock\Helpers\ReviewSliderBlockRenderActionsManager;
use GIS\EditableReviewSliderBlock\Livewire\Admin\Types\ReviewsWire;
use GIS\EditableReviewSliderBlock\Models\ReviewSliderRecord;
use GIS\EditableReviewSliderBlock\Observers\ReviewSliderRecordObserver;
use GIS\Fileable\Traits\ExpandTemplatesTrait;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class EditableReviewSliderBlockServiceProvider extends ServiceProvider
{
    use ExpandTemplatesTrait, ExpandBlocksTrait;

    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . "/database/migrations");
        $this->mergeConfigFrom(__DIR__ . "/config/editable-review-slider-block.php", "editable-review-slider-block");
        $this->initFacades();
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . "/resources/views", "ersb");
        $this->addLivewireComponents();
        $this->expandConfiguration();
        $this->observeModels();
    }

    protected function addLivewireComponents(): void
    {
        $component = config("editable-review-slider-block.customReviewsComponent");
        Livewire::component(
            "ersb-reviews",
            $component ?? ReviewsWire::class
        );
    }

    protected function expandConfiguration(): void
    {
        $ersb = app()->config["editable-review-slider-block"];
        $this->expandTemplates($ersb);
        $this->expandBlocks($ersb);
        $this->expandBlockRender($ersb);
    }

    protected function initFacades(): void
    {
        $this->app->singleton("review-slider-block-render-actions", function () {
            $managerClass = config("editable-review-slider-block.customBlockRecordActionsManager") ?? ReviewSliderBlockRenderActionsManager::class;
            return new $managerClass();
        });
    }

    protected function observeModels(): void
    {
        $modelClass = config("editable-review-slider-block.customReviewSlideRecord") ?? ReviewSliderRecord::class;
        $observerClass = config("editable-review-slider-block.customReviewSlideRecordObserver") ?? ReviewSliderRecordObserver::class;
        $modelClass::observe($observerClass);
    }
}
