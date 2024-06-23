<div {{$attributes->merge(['class' => 'p-4 text-sm ' . $class]) }} role="alert">
    <span class="font-medium">{{ $title }}</span> {{ $slot }}.
</div>