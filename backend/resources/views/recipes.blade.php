@extends('layouts.app')

@section('content')
<div id="wrapper">
    <section class="gridWrapper">
        @foreach($viewModel->getRecipeCollection() as $recipe)
            @livewire('recipe-info', ['recipe' => $recipe])
        @endforeach
      </section>
  </div>
@endsection
