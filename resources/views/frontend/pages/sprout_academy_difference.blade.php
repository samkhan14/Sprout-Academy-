@extends('frontend.partials.master')
@section('title', 'The Sprout Academy Difference')

@section('content')
    {{-- Header Section --}}
    @include('frontend.partials.header_inner', [
        'bgImage' => asset('frontend/assets/home_page_images/hdr-img-sprout-aca-diff.png'),
        'title' => 'DIFFERENCE',
        'subtitle' => 'The Sprout Academy',
        'showButton' => false,
    ])

    {{-- Why Choose Section --}}
    <section class="why-choose-section">
        <div class="container">
            <div class="section-heading-wrapper">
                <img src="{{ asset('frontend/assets/home_page_images/lock.png') }}" alt="Icon" class="section-icon-left">
                <h2 class="section-title">WHY CHOOSE THE SPROUT ACADEMY?</h2>
                <img src="{{ asset('frontend/assets/home_page_images/star.png') }}" alt="Icon" class="section-icon-right">
            </div>

            {{-- Video Player --}}
            <div class="video-showcase-main">
                <video class="main-video-player" poster="{{ asset('frontend/assets/home_page_images/sprt-aca-img-1.png') }}"
                    controls preload="metadata">
                    <source src="{{ asset('frontend/assets/videos/sprout-academy-video.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <button class="video-play-btn-main" aria-label="Play video">
                    <span class="play-icon"></span>
                </button>
            </div>
        </div>
    </section>

    {{-- Timeline Sections --}}
    <section class="difference-timeline-wrapper">
        <div class="container">
            <div class="timeline-line"></div>

            {{-- Section 1: Text Left, Image Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper left-content">
                    <div class="timeline-text">
                        <div class="timeline-icon-inline">
                            <img src="{{ asset('frontend/assets/home_page_images/pencil_icon.png') }}" alt="Icon">
                        </div>
                        <h3 class="timeline-heading">WE CARE FOR YOUR CHILD THE SAME WAY YOU WOULD.</h3>
                        <p class="timeline-paragraph">
                            The Sprout Academy develops the whole child by meeting social, emotional, physical, and
                            intellectual needs through learning and growing every day.
                        </p>
                        <p class="timeline-paragraph">
                            Through a caring, stimulating atmosphere, your child will gain the tools to become confident and
                            self-aware in their world. Our passionate and engaging teachers provide endless opportunities to
                            grow, learn, and imagine—whether building a spaceship to blast off to Mars or inviting a friend
                            to
                            share a story during group time.
                        </p>
                    </div>
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/sprt-aca-img-2.png') }}"
                                alt="Children eating">
                        </div>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon1.png') }}" alt="Icon">
                </div>
            </div>

            {{-- Section 2: Image Left, Text Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper right-content">
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/sprt-aca-img-6.png') }}"
                                alt="Teacher with children">
                        </div>
                    </div>
                    <div class="timeline-text">

                        <h3 class="timeline-heading">LEARNING IS EVERYWHERE</h3>
                        <p class="timeline-paragraph">
                            While academics play a role in child development, there are other experiences that enhance the
                            whole
                            child.
                        </p>
                        <p class="timeline-paragraph">
                            Learning curriculums are more than books and teaching manipulatives. At The Sprout Academy, our
                            curriculums consists of everything your child experiences in the classroom, from interactions
                            and
                            meals to singing and playing. We never miss an opportunity to educate.
                        </p>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon3.png') }}" alt="Icon">
                </div>
            </div>

            {{-- Section 3: Text Left, Image Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper left-content">
                    <div class="timeline-text">
                        <h3 class="timeline-heading">TEACHING LIFE SKILLS</h3>
                        <p class="timeline-paragraph">
                            The Sprout Academy teaches children skills that go beyond reading, writing, and math. Playing,
                            singing, art, mealtime, and basic hygiene are all used as applications to greater life skills
                            that
                            build confidence. Each activity is designed with a specific lesson or outcome in mind. In fact,
                            our
                            activities are designed to align with 140 learning standards that progress sequentially across
                            six
                            developmental domains.
                        </p>
                        <p class="timeline-paragraph">
                            We also teach seasonally relevant lessons. For example, children learn about gardening in the
                            spring
                            and farming in the fall.
                        </p>
                    </div>
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/sprt-aca-img-3.png') }}"
                                alt="Child building with blocks">
                        </div>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon2.png') }}" alt="Icon">
                </div>
            </div>

            {{-- Section 4: Image Left, Text Right --}}
            <div class="timeline-section">
                <div class="timeline-content-wrapper right-content">
                    <div class="timeline-image">
                        <div class="timeline-image-spacing">
                            <img src="{{ asset('frontend/assets/home_page_images/sprt-aca-img-4.png') }}"
                                alt="Children doing art">
                        </div>
                    </div>
                    <div class="timeline-text">
                        <h3 class="timeline-heading">PREPARING FOR THE FUTURE</h3>
                        <p class="timeline-paragraph">
                            Common Core State Standards, as well as early learning standards from several states, help
                            inform
                            the scope and sequence of our learning standards. We provide a balance between choice and
                            structured
                            activities, between group and individual pursuits, and between teacher and child-directed
                            experiences.
                        </p>
                        <p class="timeline-paragraph">
                            We prepare children for success as they enter traditional schooling. In addition, we give
                            families
                            the tools to continue promoting learning in the home.
                        </p>
                    </div>
                </div>
                <div class="timeline-icon-center">
                    <img src="{{ asset('frontend/assets/home_page_images/timeline-icon4.png') }}" alt="Icon">
                </div>
            </div>
        </div>
    </section>

    {{-- The Benefits You'll Receive Section --}}
    <section class="benefits-receive-section">
        <div class="benifits-receive-wrapper">
            <div class="container">
                <div class="benefits-receive-header">
                    <img src="{{ asset('frontend/assets/home_page_images/123.png') }}" alt="Lightbulb Icon"
                        class="section-icon-left">
                    <h2 class="section-title">THE BENEFITS YOU'LL RECEIVE</h2>
                    <img src="{{ asset('frontend/assets/home_page_images/star.png') }}" alt="Star Icon"
                        class="section-icon-right">
                </div>

                <div class="benefits-cards-grid">
                    {{-- Row 1 --}}
                    <div class="benefit-card">
                        <div class="benefit-card-icon triangle-icon">△</div>
                        <p class="benefit-card-text">Trained Early Childhood Teachers</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon circle-icon">○</div>
                        <p class="benefit-card-text">Attention and Support</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon star-icon">☆</div>
                        <p class="benefit-card-text">Building Blocks For Your Child's Confidence</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon square-icon">□</div>
                        <p class="benefit-card-text">Approved Child Care Safety And Security</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon star-icon">☆</div>
                        <p class="benefit-card-text">A Clean And Healthy Environment</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon heart-icon">♡</div>
                        <p class="benefit-card-text">Nutritious Meals For Children</p>
                    </div>

                    {{-- Row 2 --}}
                    <div class="benefit-card">
                        <div class="benefit-card-icon triangle-icon">△</div>
                        <p class="benefit-card-text">Socialization with peers</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon circle-icon">○</div>
                        <p class="benefit-card-text">Social And Emotional Growth</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon star-icon">☆</div>
                        <p class="benefit-card-text">Early Education Programs</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon square-icon">□</div>
                        <p class="benefit-card-text">Curriculum Based On Scientific Research</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon star-icon">☆</div>
                        <p class="benefit-card-text">The Convenience Of Multiple Locations</p>
                    </div>
                    <div class="benefit-card">
                        <div class="benefit-card-icon heart-icon">♡</div>
                        <p class="benefit-card-text">Flexible Early And Late Hours Available</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Footer CTA --}}
    @include('frontend.components.footer-cta', [
        'bgImage' => asset('frontend/assets/home_page_images/cta-banner.png'),
        'fancytitle' => 'Inquire About Openings',
        'title' => 'FIND THE SPROUT ACADEMY LOCATION NEAREST YOU',
        'buttonText' => 'Enroll Now',
        'buttonLink' => route('frontend.locations'),
    ])
@endsection
