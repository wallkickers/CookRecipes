@extends('layouts.login_app')

@section('content')
<form id="contact" action="{{ route('recipe_insert') }}" method="POST">
    @csrf
    <div>
        <h2 class="Page-Title">レシピ作成</h2>
    </div>
    <div class="Form">
        <div class="Form-Item">
            <p class="Form-Item-Label">レシピタイトル</p>
            <input type="text" class="Form-Item-Input" name="recipe_title" placeholder="例）親子丼" required>
          </div>
        <div class="Form-Item">
          <p class="Form-Item-Label">レシピURL</p>
          <input type="text" class="Form-Item-Input" name="recipe_url" placeholder="例）https://cookrecipe.com/aaaaa" required>
        </div>
        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">材料</p>
          <textarea
            class="Form-Item-Textarea"
            name="recipe_ingredients"
            placeholder="例）
鶏もも肉1パック(1枚200g)
醤油大さじ1
みりん大さじ1
しょうがチューブ5cm
ニンニクチューブ5cm"
            ></textarea>
        </div>
        <div class="Form-Btn-Group">
            <input type="submit" class="Form-Btn" value="保存する">
        </div>
    </div>
</form>
@endsection
