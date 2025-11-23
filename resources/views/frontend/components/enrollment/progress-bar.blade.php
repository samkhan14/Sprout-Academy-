@php
    $steps = [
        1 => 'ACCOUNT INFO',
        2 => 'CHILDREN INFO',
        3 => 'EMERGENCY CONTACTS',
        4 => 'REVIEW & SUBMIT',
    ];
    $currentStep = $currentStep ?? 1;
@endphp

<div class="enrollment-progress-bar">
    @foreach ($steps as $stepNum => $stepLabel)
        <div class="progress-step {{ $stepNum <= $currentStep ? 'active' : '' }} {{ $stepNum == $currentStep ? 'current' : '' }}">
            <div class="step-circle">
                <span class="step-number">{{ str_pad($stepNum, 2, '0', STR_PAD_LEFT) }}</span>
            </div>
            <div class="step-label">{{ $stepLabel }}</div>
            @if (!$loop->last)
                <div class="step-connector {{ $stepNum < $currentStep ? 'active' : '' }}"></div>
            @endif
        </div>
    @endforeach
</div>


