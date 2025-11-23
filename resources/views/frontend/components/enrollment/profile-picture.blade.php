@php
    $imageUrl = $imageUrl ?? asset('frontend/assets/images/default-profile.png');
    $name = $name ?? '';
    $fieldName = $fieldName ?? 'profile_image';
    $showChangeButton = $showChangeButton ?? true;
    $nameParts = $name ? explode(' ', trim($name)) : [];
    $firstName = $nameParts[0] ?? '';
    $lastName = implode(' ', array_slice($nameParts, 1)) ?? '';
@endphp

<div class="profile-picture-wrapper">
    <div class="profile-picture-container">
        <img src="{{ $imageUrl }}" alt="{{ $name }}" class="profile-picture" id="profilePicturePreview">
        <input type="file" name="{{ $fieldName }}" id="{{ $fieldName }}" accept="image/*" class="profile-picture-input" style="display: none;">
    </div>
    @if ($name)
        <div class="profile-name">
            <div class="profile-first-name">{{ $firstName }}</div>
            <div class="profile-last-name">{{ $lastName }}</div>
        </div>
    @endif
    @if ($showChangeButton)
        <button type="button" class="btn-change-image" onclick="document.getElementById('{{ $fieldName }}').click()">
            Change Image
        </button>
    @endif
</div>

