<div class="subscribe-area">
    <div class="container">
        <div class="subscribe-box">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-8">
                            <div class="subscribe-text">
                                <h1>Subscribe</h1>
                                <span>Enter your email and get latest updates and offers subscribe us</span>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-4">
                            <div class="email-submit-form">
                                <div class="subscribe-form">
                                    <form action="{{ route('newsletter') }}" method="POST">
                                        @csrf
                                        <input placeholder="Enter your email" type="email" name="email">
                                        <i class="fas">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Subscribe"></i> </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- subscribe end -->
<!-- footer start -->
<footer id="Contact">
    <div class="footer-area primary-bg pt-150">
        <div class="container">
            <div class="footer-top pb-35">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-logo">
                                <img src="img/logo/logo_2.png" alt="">
                            </div>
                            <div class="footer-para">
                                <p>
                                    Welcome to our course enrollment platform, where learning knows no bounds! Browse through our extensive range of courses designed to ignite your passions, enhance your skills, and shape your future. Whether you're interested in technology, arts, business, or beyond, we have something for everyone. Enroll now to embark on a journey of discovery, growth, and endless possibilities!
                                </p>
                            </div>
                            <div class="footer-socila-icon">
                                <span>Follow Us</span>
                                <div class="footer-social-icon-list">
                                    <ul>
                                        <li><a href="https://www.facebook.com/SayzanaRim" target="_blank">
                                            <svg id='Facebook_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                                <g transform="matrix(1 0 0 1 12 12)" >
                                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(185, 183, 183); fill-rule: nonzero; opacity: 1;" transform=" translate(-12, -11.95)" d="M 12 2 C 6.477 2 2 6.477 2 12 C 2 17.012999999999998 5.693 21.153 10.505 21.875999999999998 L 10.505 14.65 L 8.031 14.65 L 8.031 12.021 L 10.505 12.021 L 10.505 10.272 C 10.505 7.376 11.916 6.105 14.323 6.105 C 15.476 6.105 16.085 6.19 16.374000000000002 6.229 L 16.374000000000002 8.523 L 14.732000000000003 8.523 C 13.710000000000003 8.523 13.353000000000003 9.491999999999999 13.353000000000003 10.584 L 13.353000000000003 12.020999999999999 L 16.348000000000003 12.020999999999999 L 15.942000000000002 14.649999999999999 L 13.354000000000003 14.649999999999999 L 13.354000000000003 21.897 C 18.235 21.236 22 17.062 22 12 C 22 6.477 17.523 2 12 2 z" stroke-linecap="round" />
                                                </g>
                                            </svg>
                                            </a>
                                        </li>
                                        <li><a href="https://youtube.com/@sayzanarim2437?si=ymq7fwICZjjhvzhD" target="_blank">
                                        <svg id='YouTube_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                                <g transform="matrix(0.84 0 0 0.84 12 12)" >
                                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(185, 183, 183); fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -14.95)" d="M 7.4140625 3 L 9.1894531 9.4121094 L 9.1894531 12.488281 L 10.726562 12.488281 L 10.726562 9.4121094 L 12.525391 3 L 10.976562 3 L 10.332031 5.9179688 C 10.151031 6.7699687 10.035422 7.3753281 9.9824219 7.7363281 L 9.9355469 7.7363281 C 9.8605469 7.2313281 9.7439375 6.62125 9.5859375 5.90625 L 8.9648438 3 L 7.4140625 3 z M 14.318359 5.4199219 C 13.797359 5.4199219 13.376641 5.5224687 13.056641 5.7304688 C 12.735641 5.9374688 12.500609 6.2687031 12.349609 6.7207031 C 12.199609 7.1737031 12.123047 7.7715781 12.123047 8.5175781 L 12.123047 9.5234375 C 12.123047 10.261437 12.190266 10.853828 12.322266 11.298828 C 12.454266 11.743828 12.675281 12.072203 12.988281 12.283203 C 13.301281 12.494203 13.733203 12.600562 14.283203 12.601562 C 14.818203 12.601562 15.244641 12.497063 15.556641 12.289062 C 15.868641 12.081063 16.095375 11.755641 16.234375 11.306641 C 16.373375 10.857641 16.443359 10.264391 16.443359 9.5253906 L 16.443359 8.5175781 C 16.443359 7.7715781 16.371516 7.1755625 16.228516 6.7265625 C 16.085516 6.2785625 15.860781 5.9473281 15.550781 5.7363281 C 15.241781 5.5253281 14.830359 5.4199219 14.318359 5.4199219 z M 17.251953 5.5566406 L 17.251953 10.734375 C 17.251953 11.375375 17.362078 11.847437 17.580078 12.148438 C 17.799078 12.449437 18.137656 12.599609 18.597656 12.599609 C 19.260656 12.599609 19.758844 12.279672 20.089844 11.638672 L 20.123047 11.638672 L 20.259766 12.486328 L 21.480469 12.486328 L 21.480469 5.5566406 L 19.921875 5.5566406 L 19.921875 11.060547 C 19.861875 11.189547 19.769531 11.295906 19.644531 11.378906 C 19.519531 11.462906 19.389906 11.503906 19.253906 11.503906 C 19.094906 11.503906 18.982063 11.436687 18.914062 11.304688 C 18.846063 11.172688 18.8125 10.954531 18.8125 10.644531 L 18.8125 5.5566406 L 17.251953 5.5566406 z M 14.283203 6.4941406 C 14.501203 6.4941406 14.656187 6.6098437 14.742188 6.8398438 C 14.829188 7.0688437 14.871094 7.4316875 14.871094 7.9296875 L 14.871094 10.089844 C 14.871094 10.602844 14.828188 10.971266 14.742188 11.197266 C 14.656188 11.423266 14.502156 11.536109 14.285156 11.537109 C 14.067156 11.537109 13.915031 11.423266 13.832031 11.197266 C 13.748031 10.971266 13.707031 10.601844 13.707031 10.089844 L 13.707031 7.9296875 C 13.707031 7.4326875 13.751891 7.0698438 13.837891 6.8398438 C 13.923891 6.6108438 14.072203 6.4941406 14.283203 6.4941406 z M 6.5 13.900391 C 5.119 13.900391 4 15.019391 4 16.400391 L 4 24.400391 C 4 25.781391 5.119 26.900391 6.5 26.900391 L 23.5 26.900391 C 24.881 26.900391 26 25.781391 26 24.400391 L 26 16.400391 C 26 15.019391 24.881 13.900391 23.5 13.900391 L 6.5 13.900391 z M 15.058594 16.199219 L 16.328125 16.199219 L 16.328125 19.283203 L 16.337891 19.283203 C 16.451891 19.060203 16.614219 18.881141 16.824219 18.744141 C 17.034219 18.607141 17.261906 18.539062 17.503906 18.539062 C 17.815906 18.539062 18.059328 18.622109 18.236328 18.787109 C 18.413328 18.952109 18.544047 19.220844 18.623047 19.589844 C 18.702047 19.959844 18.742188 20.471953 18.742188 21.126953 L 18.742188 22.050781 C 18.742188 22.922781 18.637734 23.563609 18.427734 23.974609 C 18.217734 24.385609 17.888359 24.591797 17.443359 24.591797 C 17.195359 24.591797 16.969625 24.533922 16.765625 24.419922 C 16.561625 24.305922 16.410594 24.149172 16.308594 23.951172 L 16.279297 23.951172 L 16.146484 24.503906 L 15.058594 24.503906 L 15.058594 16.199219 z M 7.1835938 16.496094 L 11.087891 16.496094 L 11.087891 17.556641 L 9.7792969 17.556641 L 9.7792969 24.503906 L 8.4902344 24.503906 L 8.4902344 17.556641 L 7.1835938 17.556641 L 7.1835938 16.496094 z M 21.117188 18.542969 C 21.568188 18.542969 21.916203 18.624062 22.158203 18.789062 C 22.399203 18.955063 22.570922 19.2135 22.669922 19.5625 C 22.767922 19.9125 22.816406 20.396672 22.816406 21.013672 L 22.816406 22.017578 L 20.613281 22.017578 L 20.613281 22.314453 C 20.613281 22.690453 20.623484 22.971203 20.646484 23.158203 C 20.669484 23.345203 20.715156 23.483359 20.785156 23.568359 C 20.855156 23.654359 20.963375 23.697266 21.109375 23.697266 C 21.306375 23.697266 21.441625 23.62075 21.515625 23.46875 C 21.588625 23.31675 21.628766 23.061078 21.634766 22.705078 L 22.769531 22.771484 C 22.775531 22.821484 22.779297 22.893422 22.779297 22.982422 C 22.779297 23.523422 22.631937 23.927359 22.335938 24.193359 C 22.039938 24.461359 21.621078 24.595703 21.080078 24.595703 C 20.431078 24.595703 19.976844 24.391375 19.714844 23.984375 C 19.452844 23.577375 19.324219 22.94675 19.324219 22.09375 L 19.324219 21.072266 C 19.324219 20.194266 19.460469 19.553438 19.730469 19.148438 C 20.000469 18.743437 20.462188 18.542969 21.117188 18.542969 z M 12.949219 18.650391 L 14.267578 18.650391 L 14.267578 24.501953 L 14.263672 24.501953 L 14.263672 24.503906 L 13.232422 24.503906 L 13.119141 23.787109 L 13.089844 23.787109 C 12.809844 24.329109 12.390078 24.599609 11.830078 24.599609 C 11.441078 24.599609 11.155703 24.47375 10.970703 24.21875 C 10.785703 23.96475 10.693359 23.565391 10.693359 23.025391 L 10.693359 18.652344 L 12.013672 18.652344 L 12.013672 22.949219 C 12.013672 23.209219 12.042609 23.397813 12.099609 23.507812 C 12.157609 23.619812 12.251719 23.673828 12.386719 23.673828 C 12.500719 23.673828 12.609844 23.639359 12.714844 23.568359 C 12.820844 23.498359 12.897219 23.408781 12.949219 23.300781 L 12.949219 18.650391 z M 21.089844 19.431641 C 20.949844 19.431641 20.844344 19.472687 20.777344 19.554688 C 20.710344 19.637687 20.665531 19.772938 20.644531 19.960938 C 20.621531 20.147938 20.611328 20.433453 20.611328 20.814453 L 20.611328 21.234375 L 21.574219 21.234375 L 21.574219 20.814453 C 21.574219 20.438453 21.562109 20.154937 21.537109 19.960938 C 21.512109 19.765937 21.467391 19.630781 21.400391 19.550781 C 21.333391 19.471781 21.230844 19.431641 21.089844 19.431641 z M 16.910156 19.474609 C 16.783156 19.474609 16.664641 19.524953 16.556641 19.626953 C 16.448641 19.728953 16.372125 19.859578 16.328125 20.017578 L 16.328125 23.339844 C 16.386125 23.441844 16.460734 23.517359 16.552734 23.568359 C 16.644734 23.618359 16.744516 23.646484 16.853516 23.646484 C 16.993516 23.646484 17.1045 23.596141 17.1875 23.494141 C 17.2705 23.392141 17.329281 23.220516 17.363281 22.978516 C 17.398281 22.737516 17.416016 22.402562 17.416016 21.976562 L 17.416016 21.222656 C 17.416016 20.764656 17.402047 20.411109 17.373047 20.162109 C 17.345047 19.914109 17.292703 19.736812 17.220703 19.632812 C 17.147703 19.528813 17.045156 19.474609 16.910156 19.474609 z" stroke-linecap="round" />
                                                </g>
                                         </svg>
                                        </a></li>
                                        <li><a href="https://www.linkedin.com/in/atsbeha-teklu-5294aaa1?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">
                                            <svg id='LinkedIn_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>


                                                <g transform="matrix(0.91 0 0 0.91 12 12)" >
                                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(185, 183, 183);; fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -15)" d="M 24 4 L 6 4 C 4.895 4 4 4.895 4 6 L 4 24 C 4 25.105 4.895 26 6 26 L 24 26 C 25.105 26 26 25.105 26 24 L 26 6 C 26 4.895 25.105 4 24 4 z M 10.954 22 L 8.004000000000001 22 L 8.004000000000001 12.508 L 10.954 12.508 L 10.954 22 z M 9.449 11.151 C 8.498 11.151 7.729 10.379999999999999 7.729 9.431 C 7.729 8.482 8.499 7.711999999999999 9.449 7.711999999999999 C 10.397 7.711999999999999 11.168 8.482999999999999 11.168 9.431 C 11.168 10.38 10.397 11.151 9.449 11.151 z M 22.004 22 L 19.056 22 L 19.056 17.384 C 19.056 16.283 19.036 14.867 17.523 14.867 C 15.988 14.867 15.751999999999999 16.066000000000003 15.751999999999999 17.304000000000002 L 15.751999999999999 22 L 12.803999999999998 22 L 12.803999999999998 12.508 L 15.633999999999999 12.508 L 15.633999999999999 13.805 L 15.673999999999998 13.805 C 16.067999999999998 13.059 17.029999999999998 12.272 18.464999999999996 12.272 C 21.451999999999998 12.272 22.003999999999998 14.238 22.003999999999998 16.794 L 22.003999999999998 22 z" stroke-linecap="round" />
                                                </g>
                                                </svg>
                                        </a></li>
                                        <li><a href="https://t.me/say_1act" target="_blank">
                                            <svg id='Telegram_App_24' width='20' height='20' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>
                                                <g transform="matrix(0.77 0 0 0.77 12 12)" >
                                                <path style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: rgb(185, 183, 183); fill-rule: nonzero; opacity: 1;" transform=" translate(-15, -15.67)" d="M 26.070313 3.996094 C 25.734375 4.011719 25.417969 4.109375 25.136719 4.21875 L 25.132813 4.21875 C 24.847656 4.332031 23.492188 4.902344 21.433594 5.765625 C 19.375 6.632813 16.703125 7.757813 14.050781 8.875 C 8.753906 11.105469 3.546875 13.300781 3.546875 13.300781 L 3.609375 13.277344 C 3.609375 13.277344 3.25 13.394531 2.875 13.652344 C 2.683594 13.777344 2.472656 13.949219 2.289063 14.21875 C 2.105469 14.488281 1.957031 14.902344 2.011719 15.328125 C 2.101563 16.050781 2.570313 16.484375 2.90625 16.722656 C 3.246094 16.964844 3.570313 17.078125 3.570313 17.078125 L 3.578125 17.078125 L 8.460938 18.722656 C 8.679688 19.425781 9.949219 23.597656 10.253906 24.558594 C 10.433594 25.132813 10.609375 25.492188 10.828125 25.765625 C 10.933594 25.90625 11.058594 26.023438 11.207031 26.117188 C 11.265625 26.152344 11.328125 26.179688 11.390625 26.203125 C 11.410156 26.214844 11.429688 26.21875 11.453125 26.222656 L 11.402344 26.210938 C 11.417969 26.214844 11.429688 26.226563 11.441406 26.230469 C 11.480469 26.242188 11.507813 26.246094 11.558594 26.253906 C 12.332031 26.488281 12.953125 26.007813 12.953125 26.007813 L 12.988281 25.980469 L 15.871094 23.355469 L 20.703125 27.0625 L 20.8125 27.109375 C 21.820313 27.550781 22.839844 27.304688 23.378906 26.871094 C 23.921875 26.433594 24.132813 25.875 24.132813 25.875 L 24.167969 25.785156 L 27.902344 6.65625 C 28.007813 6.183594 28.035156 5.742188 27.917969 5.3125 C 27.800781 4.882813 27.5 4.480469 27.136719 4.265625 C 26.769531 4.046875 26.40625 3.980469 26.070313 3.996094 Z M 25.96875 6.046875 C 25.964844 6.109375 25.976563 6.101563 25.949219 6.222656 L 25.949219 6.234375 L 22.25 25.164063 C 22.234375 25.191406 22.207031 25.25 22.132813 25.308594 C 22.054688 25.371094 21.992188 25.410156 21.667969 25.28125 L 15.757813 20.75 L 12.1875 24.003906 L 12.9375 19.214844 C 12.9375 19.214844 22.195313 10.585938 22.59375 10.214844 C 22.992188 9.84375 22.859375 9.765625 22.859375 9.765625 C 22.886719 9.3125 22.257813 9.632813 22.257813 9.632813 L 10.082031 17.175781 L 10.078125 17.15625 L 4.242188 15.191406 L 4.242188 15.1875 C 4.238281 15.1875 4.230469 15.183594 4.226563 15.183594 C 4.230469 15.183594 4.257813 15.171875 4.257813 15.171875 L 4.289063 15.15625 L 4.320313 15.144531 C 4.320313 15.144531 9.53125 12.949219 14.828125 10.71875 C 17.480469 9.601563 20.152344 8.476563 22.207031 7.609375 C 24.261719 6.746094 25.78125 6.113281 25.867188 6.078125 C 25.949219 6.046875 25.910156 6.046875 25.96875 6.046875 Z" stroke-linecap="round" />
                                                </g>
                                                </svg>
                                        </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-heading">
                                <h1>Quick Links</h1>
                            </div>
                            <div class="footer-menu clearfix">
                                <ul>
                                    <li><a href="{{ route('consltation') }}">Consultation</a></li>
                                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                    <li><a href="{{ route('blog') }}">Blogs</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ </a></li>
                                    <li><a href="{{ route('courses') }}">Course</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4  col-md-6">
                        <div class="footer-widget mb-30">
                            <div class="footer-heading">
                                <h1>Contact Us</h1>
                            </div>
                            <div class="footer-contact-list">
                                <div class="single-footer-contact-info">
                                    <span class="ti-headphone "></span>
                                    <span class="footer-contact-list-text">+251 91 126 2107</span>
                                </div>
                                <div class="single-footer-contact-info">
                                    <span class="ti-email "></span>
                                    <span class="footer-contact-list-text">atsbehateklu166@gmail.com</span>
                                </div>
                                <div class="single-footer-contact-info">
                                    <span class="ti-location-pin"></span>
                                    <span class="footer-contact-list-text">
                                        Address : Adiss Ababa, Ethiopia
                                        Bole Subcity, Around 22 Tsega Business Center.
                                        </span>
                                </div>
                            </div>
                            <div class="opening-time">
                                <span>Opening Hour</span>
                                <span class="opening-date">
                                    Sun - Sat : 24//7
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center;" class="py-3">
                <p>All rights reserved &copy; 2024 Sayzanarim &nbsp; Powered by <a href="https://afroel.com" target="_blank">afroel technologies</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->


<!-- JS here -->
<script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/one-page-nav-min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script src="{{asset('frontend/js/ajax-form.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.meanmenu.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.barfiller.js')}}"></script>
<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
</body>


</html>
