<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LockedButton extends Component
{
    public string $tier;
    public ?string $contentType;

    /**
     * Create a new component instance.
     *
     * @param string $tier
     * @param string|null $contentType
     */
    public function __construct(string $tier, string $contentType = null)
    {
        $this->tier = $tier;
        $this->contentType = $contentType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.locked-button');
    }
}
