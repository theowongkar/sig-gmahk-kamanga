<x-slot name="scripts">
    @php
        $status_code = 419;
        $title = 'Page Expired';
        $message = 'Halaman telah kedaluwarsa. Silakan muat ulang atau coba lagi.';
        $bg_color = 'rose';
        $text_color = 'rose';
    @endphp
</x-slot>

@include('errors.base')
