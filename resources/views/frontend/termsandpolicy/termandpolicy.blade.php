@extends('frontend._layout._master')

@section('body')
<section class="container mx-auto max-w-screen-2xl px-4 border rounded-2xl sm:px-6 lg:px-10 overflow-hidden">
    <div class="py-14  px-4">
        <div class="text-center mb-10 text-xl font-semibold">
            {{ $termspolicy->title }}
        </div>
        {!! $termspolicy->description !!}
    </div>
</section>

@endsection
