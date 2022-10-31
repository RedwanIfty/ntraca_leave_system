<?php

namespace App\View\Components\auth;

use Illuminate\View\Component;

class Input extends Component
{
    public $id, $type, $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $type="text", $label)
    {
        $this->id = $id;
        $this->type = $type;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth.input');
    }
}