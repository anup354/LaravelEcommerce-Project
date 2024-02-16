@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb flex space-x-1 text-sm">

        @foreach ($breadcrumbs as $key => $breadcrumb)
            @if ($breadcrumb->url ?? false && !$loop->last)
                <li class="breadcrumb-item font-normal"><a
                        href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                </li>
                @if (!$loop->last)
                    <span class="text-sm">
                        /
                    </span>
                @endif
            @else
                <li class="breadcrumb-item active font-bold text-sky-500">{{  $breadcrumb->title }}
                </li>
            @endif
        @endforeach

    </ol>
@endunless
