<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;
use packages\Domain\Web\Recipe;

class RecipeInfo extends Component
{
    private $recipe;

    public function mount(Recipe $recipe)
    {
        $this->recipe = $recipe;
    }

    public function render()
    {
        $recipe = $this->recipe;
        return view('livewire.recipe-info', compact(['recipe']));
    }
}
