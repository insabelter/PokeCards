<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SetExplorerCards extends Component
{
    public $cardArray;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardArray)
    {
        $this->cardArray = $cardArray;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.set-explorer-cards');
    }
}
