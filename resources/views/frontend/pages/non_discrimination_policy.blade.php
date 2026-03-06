@extends('frontend.partials.master')

@section('title', 'Non-Discrimination Policy')

@section('content')
    {{-- Hero Section --}}
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hero-img.png'),
        'title' => 'NON-DISCRIMINATION POLICY FOR STUDENT ENROLLMENT',
        'showButton' => false,
    ])

    {{-- Intro: Image left + Light blue text block right --}}
    <section class="ndp-intro-section">
        <div class="container">
            <div class="ndp-intro-grid">
                <div class="ndp-intro-image-wrap">
                    <img src="{{ asset('frontend/assets/home_page_images/edu-1.png') }}" alt="Student" class="ndp-intro-image" loading="lazy">
                </div>
                <div class="ndp-intro-text-box">
                    <p>The Sprout Academy is committed to providing an inclusive and welcoming environment for all students and families. We do not discriminate on the basis of race, color, national origin, religion, sex, gender identity, sexual orientation, disability, or any other protected characteristic in the administration of our educational policies, admissions, or programs.</p>
                    <p>This policy applies to all aspects of student enrollment, including recruitment, admissions, participation in programs and activities, and the provision of services. We are dedicated to ensuring equal access and opportunity for every child.</p>
                    <p>We believe that diversity strengthens our community and enriches the learning experience for all. Our staff is trained to support and respect the unique backgrounds and needs of every family we serve.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- THE SPROUT ACADEMY IS COMMITTED TO --}}
    <section class="ndp-section">
        <div class="container">
            <h2 class="ndp-pill-heading ndp-pill-heading--blue">THE SPROUT ACADEMY IS COMMITTED TO:</h2>
            <div class="ndp-content">
                <ul class="ndp-list">
                    <li>Providing a fair and equal opportunity to all students regardless of race, color, religion, national origin, sex, disability, or other protected status.</li>
                    <li>Ensuring that no student is discriminated against in admission, participation, or access to any program or activity.</li>
                    <li>Maintaining an environment free from harassment, bullying, and discrimination.</li>
                    <li>Complying with all applicable federal, state, and local laws regarding non-discrimination.</li>
                </ul>
                <p>We encourage any family who has questions or concerns about this policy to contact our administration. We are here to support you and ensure that every child has the opportunity to thrive at The Sprout Academy.</p>
            </div>
        </div>
    </section>

    {{-- NON-DISCRIMINATION POLICY FOR EMPLOYMENT --}}
    <section class="ndp-section">
        <div class="container">
            <h2 class="ndp-pill-heading ndp-pill-heading--blue">NON-DISCRIMINATION POLICY FOR EMPLOYMENT</h2>
            <h3 class="ndp-subheading">Equal Employment Opportunity</h3>
            <div class="ndp-content">
                <p>The Sprout Academy provides equal employment opportunities to all employees and applicants. We do not discriminate on the basis of race, color, religion, sex, national origin, age, disability, genetic information, or any other characteristic protected by law.</p>
                <p>Employment decisions are based on qualifications, merit, and business need. We are committed to providing a work environment that is free from discrimination and harassment, and where every team member is treated with respect and dignity.</p>
            </div>
        </div>
    </section>

    {{-- ANTI-HARASSMENT --}}
    <section class="ndp-section">
        <div class="container">
            <h2 class="ndp-pill-heading ndp-pill-heading--green">ANTI-HARASSMENT</h2>
            <h3 class="ndp-subheading">Policy Statement</h3>
            <div class="ndp-content">
                <p>The Sprout Academy prohibits harassment of any kind, including but not limited to harassment based on race, color, religion, sex, national origin, age, disability, or any other protected characteristic. We are committed to maintaining a safe and respectful environment for all students, families, and staff.</p>
                <h4 class="ndp-subheading-sm">Definition</h4>
                <p>Harassment is unwelcome conduct that is based on a protected characteristic and that is severe or pervasive enough to create a hostile environment or result in an adverse employment or educational decision.</p>
                <h4 class="ndp-subheading-sm">Examples of Harassment</h4>
                <ul class="ndp-list">
                    <li><strong>Verbal Harassment:</strong> Offensive comments, slurs, or jokes related to a protected characteristic.</li>
                    <li><strong>Physical Harassment:</strong> Unwanted physical contact or threatening behavior.</li>
                    <li><strong>Visual Harassment:</strong> Display of offensive materials or symbols.</li>
                </ul>
                <h4 class="ndp-subheading-sm">Procedures and Remedies</h4>
                <p>Any individual who believes they have been subjected to harassment should report the matter promptly. We will investigate all complaints thoroughly and take appropriate corrective action. Retaliation against individuals who report harassment is strictly prohibited.</p>
            </div>
        </div>
    </section>

    {{-- WORKPLACE BULLYING --}}
    <section class="ndp-section">
        <div class="container">
            <h2 class="ndp-pill-heading ndp-pill-heading--orange">WORKPLACE BULLYING</h2>
            <h3 class="ndp-subheading">Policy Statement</h3>
            <div class="ndp-content">
                <p>The Sprout Academy does not tolerate workplace bullying. We are committed to fostering a respectful and professional environment where all employees can perform their duties free from intimidation, humiliation, or abuse.</p>
                <h4 class="ndp-subheading-sm">Definition of Bullying</h4>
                <p>Workplace bullying is repeated, unreasonable behavior directed toward an employee or group of employees that creates a risk to health and safety. It may include verbal abuse, spreading rumors, exclusion, or undermining work performance.</p>
                <h4 class="ndp-subheading-sm">Examples of Bullying</h4>
                <ul class="ndp-list">
                    <li>Verbal abuse, shouting, or use of derogatory language</li>
                    <li>Spreading rumors or malicious gossip</li>
                    <li>Excluding or isolating someone from work-related activities</li>
                    <li>Undermining or deliberately impeding a person's work</li>
                </ul>
                <h4 class="ndp-subheading-sm">Procedures and Contact Person</h4>
                <p>Employees who experience or witness workplace bullying should report it to Human Resources or their supervisor. All reports will be handled confidentially and investigated promptly. Appropriate action will be taken to address confirmed violations.</p>
            </div>
        </div>
    </section>

    {{-- THE AMERICANS WITH DISABILITIES ACT (ADA) --}}
    <section class="ndp-section">
        <div class="container">
            <h2 class="ndp-pill-heading ndp-pill-heading--blue">THE AMERICANS WITH DISABILITIES ACT (ADA)</h2>
            <div class="ndp-content">
                <p>The Sprout Academy complies with the Americans with Disabilities Act (ADA) and applicable state laws. We do not discriminate against qualified individuals with disabilities in employment practices or in the provision of services and programs.</p>
                <p>We provide reasonable accommodations to employees and applicants with disabilities when such accommodations are necessary to enable them to perform essential job functions, unless doing so would impose an undue hardship.</p>
                <p>In our educational programs, we work with families to provide appropriate accommodations and support for students with disabilities, ensuring that every child has access to a high-quality education in an inclusive environment.</p>
            </div>
        </div>
    </section>
@endsection
