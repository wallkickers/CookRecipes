@extends('layouts.app')

@section('content')
<form id="contact" route="{{ route('recipe_create_update') }}" method="POST">
    @csrf
    <div>
        <h2 class="Page-Title">レシピ作成</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
          <p class="Form-Item-Label">レシピURL</p>
          <input type="text" class="Form-Item-Input" name="recipe_url" placeholder="例）https://cookrecipe.com/aaaaa" required>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">材料</p>
          <textarea class="Form-Item-Textarea" name="recipe_ingredients"
            placeholder="例）鶏もも肉1パック(2枚500g)
            ★醤油大さじ4
            ★みりん大さじ3
            ★料理酒大さじ3
            ★砂糖大さじ1
            ★しょうがチューブ5〜10cm位
            ★ニンニクチューブ5〜10cm位">
            </textarea>
        </div>
        <input type="submit" class="Form-Btn" value="保存する">
    </div>
</form>
@endsection
