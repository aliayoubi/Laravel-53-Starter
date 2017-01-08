{{--
Usage:

@include('components.panel', [
    'type' => "primary",
    'heading' => "My Panel",
    'content' => "Some content that can also include HTML tags",
    'footer' => "This is footer",
])

--}}

<div class="panel panel-{{$type}}">
    <div class="panel-heading">{!! $heading !!}</div>
    <div class="panel-body">{!! $content !!}</div>
    <div class="panel-footer">{!! $footer !!}</div>
</div>

{{-- any styles of this component here --}}
@push('styles')
<style>

</style>
@endpush

{{-- any scripts of this component here --}}
@push('scripts')
<script>

</script>
@endpush