@props(['link'])
<a class="d-flex align-items-center bg-white p-4 rounded my-3" href="{{ $link ?? '#' }}">
    <h1 class="mr-4">{{ $count ?? null }}</h1>
   <span>{{ $title ?? null }}</span>
</a>