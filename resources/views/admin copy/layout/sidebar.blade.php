@php
    $user = Auth::guard('admin')->user();
@endphp
<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="clinicdropdown">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset($user->profile_image) }}" class="img-fluid" alt="Profile"
                            loading="lazy"onerror="this.src='{{ asset('assets/img/profiles/avatar-20.jpg') }}'">
                        <div class="user-names">
                            <h5>{{ $user->name ?? ''}}</h5>
                            <h6>Dashboard</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Route::is('get-question-type-list') ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Master</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('get-question-type-list') ? 'active' : '' }}"
                                        href="{{ route('get-question-type-list') }}">
                                        <span>Get Question Type</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Route::is('our-mission-edit',
                                                    'our-experties-edit','empowering-careers-edit','why-choose-edit',
                                                    'contact-explore-edit','global-careers-list','testimonials-list','home-banner-edit'
                                                    ) ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Home Management</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul><li>
                                    <a class="{{ Route::is('home-banner-edit') ? 'active' : '' }}"
                                        href="{{ route('home-banner-edit') }}">
                                        <span>Banner Page</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('our-mission-edit') ? 'active' : '' }}"
                                        href="{{ route('our-mission-edit') }}">
                                        <span>Our Mission</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('our-experties-edit') ? 'active' : '' }}"
                                        href="{{ route('our-experties-edit') }}">
                                            {{-- <i class="fa-brands fa-youtube"></i> --}}
                                        <span>Our Experties</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('empowering-careers-edit') ? 'active' : '' }}"
                                        href="{{ route('empowering-careers-edit') }}">
                                            {{-- <i class="fa-brands fa-youtube"></i> --}}
                                        <span>Empowering Global Careers</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('global-careers-list') ? 'active' : '' }}"
                                        href="{{ route('global-careers-list') }}">
                                            {{-- <i class="fa-brands fa-youtube"></i> --}}
                                        <span>Global Careers Aspirations</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('why-choose-edit') ? 'active' : '' }}"
                                        href="{{ route('why-choose-edit') }}">
                                            {{-- <i class="fa-brands fa-youtube"></i> --}}
                                        <span>Why Choose Us?</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('contact-explore-edit') ? 'active' : '' }}"
                                        href="{{ route('contact-explore-edit') }}">
                                            {{-- <i class="fa-brands fa-youtube"></i> --}}
                                        <span>Explore Opportunities</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('testimonials-list') ? 'active' : '' }}"
                                        href="{{ route('testimonials-list') }}">
                                            {{-- <i class="fa-solid fa-quote-left"></i> --}}
                                        <span>Testimonial</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Route::is('ourServices-list','our-services-header-edit','frro-optin-edit') ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Our Services</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('our-services-header-edit') ? 'active' : '' }}"
                                               href="{{ route('our-services-header-edit') }}">
                                                <span>Our Services Header</span>
                                            </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('ourServices-list') ? 'active' : '' }}"
                                               href="{{ route('ourServices-list') }}">
                                                <span>Our Services List</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('frro-optin-edit') ? 'active' : '' }}"
                                               href="{{ route('frro-optin-edit') }}">
                                                <span>Frro Optin</span>
                                            </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Route::is('blogs-list','blogs-header-edit') ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Blogs&News</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('blogs-header-edit') ? 'active' : '' }}"
                                        href="{{ route('blogs-header-edit') }}">
                                        <span>Blogs&News Header</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('blogs-list') ? 'active' : '' }}"
                                        href="{{ route('blogs-list') }}">
                                            {{-- <i class="fa-brands fa-youtube"></i> --}}
                                        <span>Blogs&News List</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('aboutus-edit') ? 'active' : '' }}" href="{{ route('aboutus-edit') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('frro-location-list') ? 'active' : '' }}" href="{{ route('frro-location-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>FRRO Location</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('destination-services-list') ? 'active' : '' }}" href="{{ route('destination-services-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Destination Services</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('expact-services-list') ? 'active' : '' }}" href="{{ route('expact-services-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Expact Services</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('abbreviation-list') ? 'active' : '' }}" href="{{ route('abbreviation-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Abbreviation</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('videolibrary-list') ? 'active' : '' }}" href="{{ route('videolibrary-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Video Library</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('faq-list') ? 'active' : '' }}" href="{{ route('faq-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>FAQ</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('contact-us') ? 'active' : '' }}" href="{{ route('contact-us') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Contact Us</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('get-enquiry') ? 'active' : '' }}" href="{{ route('get-enquiry') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Enquiry</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('get-comments') ? 'active' : '' }}" href="{{ route('get-comments') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Comments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('get-expact') ? 'active' : '' }}" href="{{ route('get-expact') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Expact Enquiry</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('report-consultation') ? 'active' : '' }}" href="{{ route('report-consultation') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Report&Consultation</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('cms') ? 'active' : '' }}" href="{{ route('cms') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>CMS Management</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Route::is('page-banner','setting-edit') ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Setting</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('setting-edit') ? 'active' : '' }}"
                                        href="{{ route('setting-edit') }}">
                                        <span>Setting Details</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('page-banner') ? 'active' : '' }}"
                                        href="{{ route('page-banner') }}">
                                        <span>Page Banner</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

