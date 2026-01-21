        <section class="consult-section">
            <div class="consult-wrapper">

                <!-- LEFT SIDE -->
                <div class="left-consult">
                    <p class="tag">
                        Partner with tech catalysts who transform ideas into impact.
                    </p>

                    <p class="sub-tag">Book your free consultation with us.</p>

                    <h1>Let’s Talk!</h1>

                    <div class="country-slider">
                        <div class="country-track">

                            <div class="country active">
                                <h3>UNITED ARAB EMIRATES</h3>
                                <p>One Central, The Offices 3, Level 3,</p>
                                <p>DWTC, Sheikh Zayed Road, Dubai</p>
                                <p>+971 50 782 1690</p>
                            </div>

                            <div class="country">
                                <h3>UNITED STATES</h3>
                                <p>42 Broadway, New York, NY 10004</p>
                                <p>+1 (512) 872 3364</p>
                            </div>

                            <div class="country">
                                <h3>UNITED KINGDOM</h3>
                                <p>Covent Garden, London WC2H 9JQ</p>
                                <p>+44 20 7183 9424</p>
                            </div>

                        </div>

                        <div class="nav">
                            <button class="prev">←</button>
                            <button class="next">→</button>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SIDE -->
                <div class="right-consult">
                    <div class="form-box">
                        <h2>Speak With Our Experts</h2>

                        <form action="{{ route('contact-us-form') }}" method="post"  class="formSubmit1" enctype="multipart/form-data">
                            @csrf
                            <input type="text" id="name" name="name" placeholder="Your Name" required>
                            <input type="phone" name="contact" id="phone" placeholder="Phone" required>
                            <input type="email" id="email" name="email" placeholder="Your Email" required>

                            <select name="launch" required>
                                <option value="">When do you want to launch a solution?</option>
                                <option value="Immediately">Immediately</option>
                                <option value="1–3 Months">1–3 Months</option>
                                <option value="3–6 Months">3–6 Months</option>
                            </select>

                            <textarea name="subject" placeholder="About Project"></textarea>
                            <button class="btn btn-primary  loderButton" style="justify-content: center;">
                                <span class="spinner-grow spinner-grow-sm loderIcon" role="status" aria-hidden="true" style="display: none;"></span>Send Message
                            </button>
                            {{-- <button type="submit">Submit</button> --}}
                        </form>
                    </div>
                </div>

            </div>
        </section>
