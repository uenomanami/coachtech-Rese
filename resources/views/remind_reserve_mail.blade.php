{{ $name }}様

本日が予約日となりました。
{{ $store_name }}
{{ $reserve_date }}&nbsp;{{ $reserve_time }}〜
遅れる場合や、ご都合が悪くなった際には
お店に直接ご連絡ください。

ご来店の際にQRコードをご提示ください
{!! QrCode::size(200)->generate(route('storemanager.find', ['reserve_id' => $reserve_id] )) !!}