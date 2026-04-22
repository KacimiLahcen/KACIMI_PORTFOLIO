@extends('layouts.app')

@section('content')

    <!-- Paint Splatter SVG ClipPath -->
    <svg width="0" height="0" style="position:absolute">
        <defs>
            <clipPath id="paintSplash" clipPathUnits="objectBoundingBox">
                <path d="
                    M0.5,0.02
                    C0.62,0.0 0.78,0.05 0.85,0.15
                    C0.95,0.12 1.0,0.22 0.97,0.32
                    C1.02,0.4 0.98,0.52 0.92,0.57
                    C0.99,0.65 0.96,0.78 0.87,0.82
                    C0.88,0.92 0.78,0.99 0.68,0.97
                    C0.62,1.02 0.5,1.0 0.42,0.96
                    C0.35,1.02 0.22,0.99 0.18,0.9
                    C0.08,0.92 0.01,0.8 0.05,0.7
                    C-0.02,0.62 0.0,0.48 0.08,0.42
                    C0.02,0.32 0.06,0.2 0.15,0.15
                    C0.14,0.05 0.25,-0.01 0.35,0.03
                    C0.4,-0.02 0.48,-0.01 0.5,0.02Z
                "/>
            </clipPath>
        </defs>
    </svg>

    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Header Start -->
    @php
        $hasIntroVideo = !empty($setting->video_url) && preg_match('/(youtube|youtu\.be|vimeo)/i', $setting->video_url);
    @endphp
    <section class="portfolio-hero" id="home">
        <div class="hero-split hero-split-dark"></div>
        <div class="hero-split hero-split-accent"></div>
        <div class="hero-plus hero-plus-one"></div>
        <div class="hero-plus hero-plus-two"></div>
        <div class="container-fluid hero-container">
            <div class="hero-layout">
                <div class="hero-copy-column">
                    <span class="hero-kicker">Portfolio / Developer</span>
                    <h1 class="hero-title">I'm {{ $user?->name }}</h1>
                    <div class="hero-role">
                        <span class="typed-text-output d-inline"></span>
                        <div class="typed-text d-none">{{ $user?->job }}</div>
                    </div>
                    <p class="hero-copy">
                        Full-stack developer focused on clean backends, responsive interfaces, and digital products that feel direct, fast, and sharp.
                    </p>
                    <div class="hero-actions">
                        <a href="#contact" class="btn btn-primary">Get in touch <i class="fa-solid fa-arrow-right ml-2"></i></a>
                        <a href="{{ asset('storage/' . $setting->cv_url) }}" class="btn btn-outline-light" download>Download CV</a>
                        @if(!empty($setting->github_url))
                        <a href="{{ $setting->github_url }}" class="btn btn-icon-link" target="_blank" aria-label="Open GitHub profile">
                            <i class="fab fa-github"></i>
                        </a>
                        @endif
                        @if($hasIntroVideo)
                        <button type="button" class="btn-play hero-play" data-toggle="modal"
                            data-src="{{$setting->video_url }}" data-target="#videoModal" aria-label="Play introduction video">
                            <span></span>
                        </button>
                        @endif
                    </div>
                    <div class="hero-stats">
                        <div><strong>{{ $projectCount }}+</strong><span>Projects</span></div>
                        <div><strong>{{ $user?->experience ?? '1' }}+</strong><span>Years Experience</span></div>
                        <div><strong>{{ $skills->count() }}+</strong><span>Skills</span></div>
                    </div>
                </div>
                <div class="hero-image-column">
                    <img src="{{ asset('import/assets/img/kacimi-hero-fifa.png') }}" alt="{{ $user?->name }}" class="hero-person">
                </div>
                <div class="hero-social">
                    <span>My Profiles</span>
                    <a href="{{ $setting->github_url }}" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                    <a href="{{ $setting->linkedin_url }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="mailto:{{ $setting->fb_url }}" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid section-pad about-section" id="about">
        <div class="container">
            <div class="row align-items-center about-mikon-row">
                <div class="col-lg-6 pb-5 pb-lg-0">
                    <div class="about-figure">
                        <div class="about-orbit"></div>
                        <div class="about-frame"></div>
                        <div class="about-code-card">
                            <span></span>
                            <code>full-stack</code>
                        </div>
                        <div class="about-portrait-effect">
                            <img class="about-cutout about-cutout-gemini" src="{{ asset('import/assets/img/kacimi-about-gemini-cropped.png') }}" alt="{{ $user?->name }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-panel about-copy">
                        <span class="eyebrow">About - {{ $user?->name }}</span>
                        <h3 class="mb-4">{{ $setting->about_title }}</h3>
                        <p>{{ $setting->about_description }}</p>
                        <div class="row about-facts mb-4">
                            <div class="col-sm-6"><h6>Name</h6><span>{{ $user?->name }}</span></div>
                            <div class="col-sm-6"><h6>Role</h6><span>{{ $user?->role }}</span></div>
                            <div class="col-sm-6"><h6>Experience</h6><span>{{ $user?->experience }} Years</span></div>
                            <div class="col-sm-6"><h6>Phone</h6><span>{{ $user?->phone }}</span></div>
                            <div class="col-sm-6"><h6>Email</h6><span>{{ $user?->email }}</span></div>
                            <div class="col-sm-6"><h6>Address</h6><span>{{ $user?->address }}</span></div>
                            <div class="col-sm-6"><h6>Freelance</h6><span>Available</span></div>
                        </div>
                        <div class="about-social">
                            <a href="{{ $setting->github_url }}" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                            <a href="{{ $setting->linkedin_url }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="mailto:{{ $setting->fb_url }}" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                            <a href="#contact" aria-label="Contact"><i class="fa-solid fa-paper-plane"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid section-pad alt-band" id="qualification">
        <div class="container">
            <div class="section-title">
                <span>Journey</span>
                <h2>Education & Experience</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="mb-4">My Education</h3>
                    <div class="timeline-list">
                        @foreach ($educations as $education)
                        <div class="timeline-item">
                            <i class="far fa-dot-circle text-primary"></i>
                            <h5 class="font-weight-bold mb-1">{{ $education->title }}</h5>
                            <p class="mb-2"><strong>{{ $education->association }}</strong> | <small>{{ $education->from }} - {{ $education->to }}</small></p>
                            <p>{{ $education->description }} </p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">My Experience</h3>
                    <div class="timeline-list">
                        @foreach ($experiences as $experience)
                        <div class="timeline-item">
                            <i class="far fa-dot-circle text-primary"></i>
                            <h5 class="font-weight-bold mb-1">{{ $experience->title }}</h5>
                            <p class="mb-2"><strong>{{ $experience->association }}</strong> | <small>{{ $experience->from }} - {{ $experience->to }}</small></p>
                            <p>{{ $experience->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid section-pad" id="skill">
        <div class="container">
            <div class="section-title">
                <span>Skills</span>
                <h2>My Skills</h2>
            </div>
            <div class="skill-showcase">
                <div class="skill-copy">
                    <span class="eyebrow">Stack energy</span>
                    <h3>Tools I use to build clean, sharp products.</h3>
                    <p>Each skill lives as a moving node, because the real value is how the stack works together in polished products.</p>
                </div>
                <div class="skill-galaxy" aria-label="Rotating skill globe">
                    @php
                        $skillIcons = [
                            'html' => 'fa-brands fa-html5',
                            'css' => 'fa-brands fa-css3-alt',
                            'javascript' => 'fa-brands fa-js',
                            'js' => 'fa-brands fa-js',
                            'react' => 'fa-brands fa-react',
                            'vue' => 'fa-brands fa-vuejs',
                            'angular' => 'fa-brands fa-angular',
                            'node' => 'fa-brands fa-node-js',
                            'php' => 'fa-brands fa-php',
                            'laravel' => 'fa-brands fa-laravel',
                            'python' => 'fa-brands fa-python',
                            'java' => 'fa-brands fa-java',
                            'bootstrap' => 'fa-brands fa-bootstrap',
                            'sass' => 'fa-brands fa-sass',
                            'git' => 'fa-brands fa-git-alt',
                            'github' => 'fa-brands fa-github',
                            'docker' => 'fa-brands fa-docker',
                            'linux' => 'fa-brands fa-linux',
                            'npm' => 'fa-brands fa-npm',
                            'figma' => 'fa-brands fa-figma',
                            'wordpress' => 'fa-brands fa-wordpress',
                            'aws' => 'fa-brands fa-aws',
                            'database' => 'fa-solid fa-database',
                            'mysql' => 'fa-solid fa-database',
                            'sql' => 'fa-solid fa-database',
                            'api' => 'fa-solid fa-code-branch',
                            'ui' => 'fa-solid fa-pen-nib',
                            'ux' => 'fa-solid fa-pen-nib',
                            'tailwind' => 'fa-solid fa-wind',
                        ];
                        $skillCount = max($skills->count(), 1);
                        $goldenAngle = 2.399963229728653;
                    @endphp
                    <div class="skill-sphere">
                        <div class="skill-glow-core">
                            <span>{{ $skills->count() }}+</span>
                            <small>skills</small>
                        </div>
                        @forelse($skills as $skill)
                            @php
                                $name = trim($skill->name);
                                $normalized = strtolower($name);
                                $icon = null;
                                foreach ($skillIcons as $keyword => $className) {
                                    if (str_contains($normalized, $keyword)) {
                                        $icon = $className;
                                        break;
                                    }
                                }
                                $initials = collect(explode(' ', preg_replace('/[^a-zA-Z0-9 ]/', ' ', $name)))
                                    ->filter()
                                    ->take(2)
                                    ->map(fn ($part) => strtoupper(substr($part, 0, 1)))
                                    ->implode('');
                                $index = $loop->index;
                                $y = $skillCount === 1 ? 0 : 1 - (($index / ($skillCount - 1)) * 2);
                                $radius = sqrt(max(0, 1 - ($y * $y)));
                                $theta = $goldenAngle * $index;
                                $x = cos($theta) * $radius;
                                $z = sin($theta) * $radius;
                                $scale = 0.72 + (($z + 1) * 0.18);
                                $opacity = 0.36 + (($z + 1) * 0.28);
                            @endphp
                            <div class="skill-planet"
                                style="--x: {{ round($x * 230, 2) }}px; --y: {{ round($y * 170, 2) }}px; --z: {{ round($z * 230, 2) }}px; --mx: {{ round($x * 132, 2) }}px; --my: {{ round($y * 122, 2) }}px; --mz: {{ round($z * 132, 2) }}px; --s: {{ round($scale, 2) }}; --o: {{ round($opacity, 2) }}; --skill-color: #ffffff;"
                                title="{{ $name }}">
                                @if($skill->logo)
                                    <img src="{{ asset('storage/' . $skill->logo) }}" alt="{{ $name }}">
                                @elseif($icon)
                                    <i class="{{ $icon }}"></i>
                                @else
                                    <strong>{{ $initials ?: strtoupper(substr($name, 0, 2)) }}</strong>
                                @endif
                                <span>{{ $name }}</span>
                            </div>
                        @empty
                            <div class="skill-planet" style="--x: 0px; --y: 0px; --z: 170px; --mx: 0px; --my: 0px; --mz: 120px; --s: 1; --o: 1; --skill-color: #ffffff;">
                                <i class="fa-brands fa-laravel"></i>
                                <span>Laravel</span>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="skill-marquee" aria-hidden="true">
                    <div>
                        @foreach($skills as $skill)
                            <span>{{ $skill->name }}</span>
                        @endforeach
                        @foreach($skills as $skill)
                            <span>{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid section-pad alt-band" id="service">
        <div class="container">
            <div class="section-title">
                <span>Services</span>
                <h2>My Services</h2>
            </div>
            <div class="owl-carousel service-carousel">
            @foreach ($services as $service)
                <div class="service-slide">
                    <div class="service-card">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="{{ $service->icon }} service-icon text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">{{ $service->name }}</h4>
                    </div>
                    <p>{{ $service->description }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid section-pad" id="portfolio">
        <div class="container">
            <div class="section-title">
                <span>Gallery</span>
                <h2>My Portfolio</h2>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline filter-pills mb-4" id="portfolio-flters">
                        <li>
                            <a class="btn btn-sm btn-outline-primary m-1 {{ empty($activeCategory) ? 'active' : '' }}" href="{{ route('home') }}#portfolio">All</a>
                        </li>
                        @foreach ($categories as $category)
                        <li>
                            <a class="btn btn-sm btn-outline-primary m-1 {{ $activeCategory === $category->id ? 'active' : '' }}" href="{{ route('home', ['category' => $category->id]) }}#portfolio">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @forelse ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item {{$portfolio->category->name }}">
                    <div class="portfolio-card position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="{{ asset("storage/$portfolio->image") }}" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                            <a href="{{ asset("storage/$portfolio->image") }}" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 50px;"></i>
                            </a>
                            <a href="{{ $portfolio->project_url }}" target="_blank">
                                <i class="fa-solid fa-link text-white" style="margin-left:20px; font-size: 50px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="portfolio-empty">No projects found in this category yet.</div>
                </div>
                @endforelse
            </div>
            @if($portfolios->hasPages())
            <nav class="portfolio-pagination" aria-label="Portfolio pagination">
                @if($portfolios->onFirstPage())
                    <span class="pagination-control is-disabled"><i class="fa-solid fa-arrow-left"></i></span>
                @else
                    <a class="pagination-control" href="{{ $portfolios->previousPageUrl() }}" aria-label="Previous portfolio page"><i class="fa-solid fa-arrow-left"></i></a>
                @endif

                @foreach($portfolios->getUrlRange(1, $portfolios->lastPage()) as $page => $url)
                    <a class="pagination-page {{ $page === $portfolios->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
                @endforeach

                @if($portfolios->hasMorePages())
                    <a class="pagination-control" href="{{ $portfolios->nextPageUrl() }}" aria-label="Next portfolio page"><i class="fa-solid fa-arrow-right"></i></a>
                @else
                    <span class="pagination-control is-disabled"><i class="fa-solid fa-arrow-right"></i></span>
                @endif
            </nav>
            @endif
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <div class="container-fluid section-pad alt-band" id="testimonial">
        <div class="container">
            <div class="section-title">
                <span>Review</span>
                <h2>Clients Say</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($reviewers as $review)
                        <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <h4 class="font-weight-light mb-4">{{ $review->description }}</h4>
                            <img class="testimonial-polaroid" src="{{ asset("storage/$review->image") }}" style="width: 80px; height: 80px;">
                            <h5 class="font-weight-bold m-0">{{ $review->name }} </h5>
                            <span>{{ $review->job }}</span>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Contact Start -->
    <div class="container-fluid section-pad" id="contact">
        <div class="container">
            <div class="section-title">
                <span>Contact</span>
                <h2>Contact Me</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form text-center">
                        @if (Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                          {{ Session::get('message') }}
                        </div>
                        <br>
                        @endif
                        <form id="contactForm" method="POST" action="{{ route('contact') }}">
                            @csrf
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <input type="text" class="form-control p-4" id="name" placeholder="Your Name"
                                        required name="name" value="{{old('name')}}"/>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <input type="email" class="form-control p-4" id="email" placeholder="Your Email" value="{{old('email')}}"
                                        required name="email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="subject" placeholder="Subject" value="{{old('subject_mail')}}"
                                    required name="subject_mail"/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="message" placeholder="Message" name="content"
                                    required>{{old('content')}}</textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-outline-primary" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                            @if ($errors->any())
                            <br>
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                             @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="container text-center py-5">
            <div class="footer-social d-flex justify-content-center mb-4">
                <a class="btn btn-light btn-social" href="{{ $setting->github_url }}" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <a class="btn btn-light btn-social" href="mailto:{{ $setting->fb_url }}" aria-label="Email"><i class="fa-solid fa-envelope"></i></a>
                <a class="btn btn-light btn-social" href="{{ $setting->linkedin_url }}" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a class="text-white" href="#">Privacy</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Terms</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">FAQs</a>
                <span class="px-3">|</span>
                <a class="text-white" href="#">Help</a>
            </div>
            <p class="m-0">&copy; <a class="text-white font-weight-bold" href="#">Kacimi Lahcen</a>. All Rights Reserved. Designed by <a class="text-white font-weight-bold" href="#">Kacimi Lahcen</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Scroll to Bottom -->
    <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i>

    <!-- Back to Top -->
    <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>

@endsection
