@extends('layouts.app')

@section('content')
<form id="contact" route="{{ route('recipe_create_update') }}" method="POST">
    @csrf
    <div class="container">
        <div class="head">
            <h2>レシピ作成</h2>
        </div>
        <input type="text" name="recipe_url" placeholder="レシピURL" required/><br />
        <textarea type="text" name="recipe_ingredients" placeholder="レシピの材料(任意)"></textarea><br />
        <button id="submit" type="submit">Send!</button>
    </div>
</form>
@endsection
