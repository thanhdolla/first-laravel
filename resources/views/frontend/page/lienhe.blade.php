@extends("master")
@section("content")

    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Contacts</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a>/<span>Contacts</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="beta-map" style="width:90%;margin:auto;">

        <div class="abs-fullwidth beta-map wow flipInX" >
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.637751514068!2d105.84212491431308!3d21.00715318601015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac763e5cefbf%3A0x16e1dd841f58fb22!2zMSBUcuG6p24gxJDhuqFpIE5naMSpYSwgQsOhY2ggS2hvYSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1506481850405"></iframe>
        </div>
        <div class="container" style="width:100%;">
            <div id="content" class="space-top-none">

                <div class="space50">&nbsp;</div>
                <div class="row"  style="border: whitesmoke solid thin">
                    <div class="col-sm-8">
                        <h2>Contact Form</h2>
                        <div class="space20">&nbsp;</div>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                            culpa qui officia deserunt mollit ani m id est laborum.</p>
                        <div class="space20">&nbsp;</div>
                        <form action="#" method="post" class="contact-form">
                            <div class="form-block">
                                <input name="your-name" type="text" placeholder="Your Name (required)">
                            </div>
                            <div class="form-block">
                                <input name="your-email" type="email" placeholder="Your Email (required)">
                            </div>
                            <div class="form-block">
                                <input name="your-subject" type="text" placeholder="Subject">
                            </div>
                            <div class="form-block">
                                <textarea name="your-message" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-block">
                                <button type="submit" class="beta-btn primary">Send Message <i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4">
                        <h2>Contact Information</h2>
                        <div class="space20">&nbsp;</div>

                        <h6 class="contact-title">Address</h6>
                        <p>
                            Suite 127 / 267 – 277 Brussel St,<br>
                            62 Croydon, NYC <br>
                            Newyork
                        </p>
                        <div class="space20">&nbsp;</div>
                        <h6 class="contact-title">Business Enquiries</h6>
                        <p>
                            Doloremque laudantium, totam rem aperiam, <br>
                            inventore veritatio beatae. <br>
                            <a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
                        </p>
                        <div class="space20">&nbsp;</div>
                        <h6 class="contact-title">Employment</h6>
                        <p>
                            We’re always looking for talented persons to <br>
                            join our team. <br>
                            <a href="hr@betadesign.com">hr@betadesign.com</a>
                        </p>
                    </div>
                </div>
            </div> <!-- #content -->
        </div> <!-- .container -->
    </div>
        {{--<script type="text/javascript">--}}
            {{--$(function () {--}}
                {{--// this will get the full URL at the address bar--}}
                {{--var url = window.location.href;--}}

                {{--// passes on every "a" tag--}}
                {{--$(".main-menu a").each(function () {--}}
                    {{--// checks if its the same on the address bar--}}
                    {{--if (url == (this.href)) {--}}
                        {{--$(this).closest("li").addClass("active");--}}
                        {{--$(this).parents('li').addClass('parent-active');--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}


        {{--</script>--}}
        {{--<script>--}}
            {{--jQuery(document).ready(function ($) {--}}
                {{--'use strict';--}}

{{--// color box--}}

{{--//color--}}
                {{--jQuery('#style-selector').animate({--}}
                    {{--left: '-213px'--}}
                {{--});--}}

                {{--jQuery('#style-selector a.close').click(function (e) {--}}
                    {{--e.preventDefault();--}}
                    {{--var div = jQuery('#style-selector');--}}
                    {{--if (div.css('left') === '-213px') {--}}
                        {{--jQuery('#style-selector').animate({--}}
                            {{--left: '0'--}}
                        {{--});--}}
                        {{--jQuery(this).removeClass('icon-angle-left');--}}
                        {{--jQuery(this).addClass('icon-angle-right');--}}
                    {{--} else {--}}
                        {{--jQuery('#style-selector').animate({--}}
                            {{--left: '-213px'--}}
                        {{--});--}}
                        {{--jQuery(this).removeClass('icon-angle-right');--}}
                        {{--jQuery(this).addClass('icon-angle-left');--}}
                    {{--}--}}
                {{--});--}}
            {{--});--}}
        {{--</script>--}}
@endsection
