@php
    $no=Session::get('rid')
@endphp
     @if($no=='')
      <script>
        window.location.href='/';
      </script>         
     @endif