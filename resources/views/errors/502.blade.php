@php
    $status_code = 502;
    $title = 'Bad Gateway';
    $message = 'Gateway menerima respons tidak valid dari server hilir.';
    $bg_color = 'cyan';
    $text_color = 'cyan';
@endphp
@include('errors.base')
