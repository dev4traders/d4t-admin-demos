<?php

namespace D4T\Admin\Demos\Http\Widgets;

use D4T\Core\Enums\StyleClassType;
use Dcat\Admin\Widgets\BadgeDot;
use Dcat\Admin\Widgets\Cards\MetricsCard;

class ProfitTargetChartCard extends MetricsCard
{
    public function __construct(
        string $title,
        string $badgeText,
        StyleClassType $badgeClass,
        string $valueText,
        string $description,
        $content
    )
    {
        parent::__construct($title, $content);
        $this->tool(
            (new BadgeDot($badgeClass, $badgeText))->render()
        );
        $this->value = $valueText;
        $this->description = $description;
    }
}
