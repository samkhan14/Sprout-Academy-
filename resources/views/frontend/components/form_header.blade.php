{{--
    Form Header Component - Full Width

    Usage:
    @include('frontend.components.form_header', [
        'title' => 'FORM TITLE',
        'text' => 'Instructions or description text here...'
    ])
--}}

<section class="form-header-section" aria-label="Form header">
    <div class="container">
        <div class="form-header-content">
            <h1 class="form-header-title">{{ $title ?? 'FORM TITLE' }}</h1>
            @if (isset($text) && $text)
                <p class="form-header-text">{{ $text }}</p>
            @endif
        </div>
    </div>
</section>
