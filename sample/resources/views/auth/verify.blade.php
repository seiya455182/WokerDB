@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレスを確認してください') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新しい確認リンクがメールアドレスに送信されました') }}
                        </div>
                    @endif

                    {{ __('続行する前に、リンクのメールを確認してください.') }}
                    {{ __('メールが届かない場合') }}, <a href="{{ route('verification.resend') }}">{{ __('ここをクリックして別のリクエストをしてください') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
