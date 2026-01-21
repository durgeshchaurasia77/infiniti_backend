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
                                class="{{ Route::is('testimonials-list','home-banner-edit','trustedby-list','trunkey-partner-edit','excelanace-counting-edit',
                                        'technologies-used-list','our-people-list','crafting-technology-list','fame-mobile-app-list'
                                                    ) ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Home Management</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('home-banner-edit') ? 'active' : '' }}"
                                        href="{{ route('home-banner-edit') }}">
                                        <span>Banner Page</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('testimonials-list') ? 'active' : '' }}"
                                        href="{{ route('testimonials-list') }}">
                                        <span>Testimonial</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('trustedby-list') ? 'active' : '' }}"
                                        href="{{ route('trustedby-list') }}">
                                        <span>Trusted By</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('trunkey-partner-edit') ? 'active' : '' }}"
                                        href="{{ route('trunkey-partner-edit') }}">
                                        <span>Trunkey Partner</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('excelanace-counting-edit') ? 'active' : '' }}"
                                        href="{{ route('excelanace-counting-edit') }}">
                                        <span>Excellance Counting</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('technologies-used-list') ? 'active' : '' }}"
                                        href="{{ route('technologies-used-list') }}">
                                        <span>Technology Used</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('our-people-list') ? 'active' : '' }}"
                                        href="{{ route('our-people-list') }}">
                                        <span>Our People</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('crafting-technology-list') ? 'active' : '' }}"
                                        href="{{ route('crafting-technology-list') }}">
                                        <span>Crafting Technology</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('your-journey-list') ? 'active' : '' }}"
                                        href="{{ route('your-journey-list') }}">
                                        <span>Our Journey</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('fame-mobile-app-list') ? 'active' : '' }}"
                                        href="{{ route('fame-mobile-app-list') }}">
                                        <span>Fame Mobile App</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                {{-- <li>
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
                </li> --}}
                <li>
                    <ul>
                        <li class="submenu">
                            <a href="javascript:void(0);"
                                class="{{ Route::is('blogs-list','blog-category-list') ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Blogs Management</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('blog-category-list') ? 'active' : '' }}"
                                        href="{{ route('blog-category-list') }}">
                                        <span>Blog  Category</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('blogs-list') ? 'active' : '' }}"
                                        href="{{ route('blog-list') }}">
                                        <span>Blogs List</span>
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
                                class="{{ Route::is('industry-list','features-edit','case-study-list','leverage-ai-list','advance-technologies-list','advance-technologies-create','advance-technologies-edit'
                                ,'power-packed-list',
                                'roadmap-list'
                                ) ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Industry Management</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('industry-list') ? 'active' : '' }}"
                                        href="{{ route('industry-list') }}">
                                        <span>Industry List</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('features-edit') ? 'active' : '' }}"
                                        href="{{ route('features-edit') }}">
                                        <span>Features</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('case-study-list') ? 'active' : '' }}"
                                        href="{{ route('case-study-list') }}">
                                        <span>Case Study</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('leverage-ai-list') ? 'active' : '' }}"
                                        href="{{ route('leverage-ai-list') }}">
                                        <span>Leverage AI</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('advance-technologies-list','advance-technologies-create','advance-technologies-edit') ? 'active' : '' }}"
                                        href="{{ route('advance-technologies-list') }}">
                                        <span>Advance Technology</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('power-packed-list') ? 'active' : '' }}"
                                        href="{{ route('power-packed-list') }}">
                                        <span>Power Packed</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('roadmap-list') ? 'active' : '' }}"
                                        href="{{ route('roadmap-list') }}">
                                        <span>Roadmap</span>
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
                                class="{{ Route::is('service-list','service-we-offer-list','client-satisfaction-list','our-proven-list','advance-ai-list','advance-ai-create','advance-ai-edit'
                                ,'we-deliver-list'
                                ) ? 'subdrop active' : '' }}">
                                <i class="ti ti-brand-airtable"></i><span>Service Management</span><span
                                    class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li>
                                    <a class="{{ Route::is('service-list') ? 'active' : '' }}"
                                        href="{{ route('service-list') }}">
                                        <span>Service List</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('service-we-offer-list') ? 'active' : '' }}"
                                        href="{{ route('service-we-offer-list') }}">
                                        <span>Service We Offer</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('client-satisfaction-list') ? 'active' : '' }}"
                                        href="{{ route('client-satisfaction-list') }}">
                                        <span>Customer Satisfaction</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('our-proven-list') ? 'active' : '' }}"
                                        href="{{ route('our-proven-list') }}">
                                        <span>Our Proven</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('advance-ai-list','advance-ai-create','advance-ai-edit') ? 'active' : '' }}"
                                        href="{{ route('advance-ai-list') }}">
                                        <span>Advance AI</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::is('we-deliver-list') ? 'active' : '' }}"
                                        href="{{ route('we-deliver-list') }}">
                                        <span>We Deliver</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('why-business-choose-edit') ? 'active' : '' }}" href="{{ route('why-business-choose-edit') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Why Business Choose</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('certificate-software-list') ? 'active' : '' }}" href="{{ route('certificate-software-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Certificate Software</span>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('aboutus-edit') ? 'active' : '' }}" href="{{ route('aboutus-edit') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('frro-location-list') ? 'active' : '' }}" href="{{ route('frro-location-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>FRRO Location</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('destination-services-list') ? 'active' : '' }}" href="{{ route('destination-services-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Destination Services</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('expact-services-list') ? 'active' : '' }}" href="{{ route('expact-services-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Expact Services</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('abbreviation-list') ? 'active' : '' }}" href="{{ route('abbreviation-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Abbreviation</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('videolibrary-list') ? 'active' : '' }}" href="{{ route('videolibrary-list') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Video Library</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
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
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('get-enquiry') ? 'active' : '' }}" href="{{ route('get-enquiry') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Enquiry</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('get-expact') ? 'active' : '' }}" href="{{ route('get-expact') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Expact Enquiry</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li>
                    <ul>
                        <li>
                            <a class="{{ Route::is('report-consultation') ? 'active' : '' }}" href="{{ route('report-consultation') }}">
                                    <i class="ti ti-brand-airtable"></i>
                                <span>Get Report&Consultation</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
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

