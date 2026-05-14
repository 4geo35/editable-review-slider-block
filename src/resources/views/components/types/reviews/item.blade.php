@props(["item"])
<div>
    @if ($item->recordable->author_name)
        <div>{{ $item->recordable->author_name }}</div>
    @endif
    @if ($item->recordable->date)
        <div>{{ $item->recordable->date }}</div>
    @endif
    @if ($item->recordable->description)
        <div>{!! $item->recordable->markdown !!}</div>
    @endif
</div>
