@extends('layouts.login_app')

@section('content')
<div id="wrapper">
    <section class="gridWrapper">
        <div class="Form-Btn-Group">
            <p>サービスのご利用にはログインが必要です</p>
            <a href="{{ route('google_auth') }}" class="Form-Btn">
                Google Login
            </a>
        </div>
    </section>
</div>
@endsection
