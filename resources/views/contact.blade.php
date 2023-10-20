<x-layout>
    <div class="contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h2>Our Office</h2>
                        <h3><i class="fa fa-map-marker"></i>123 Office, Los Angeles, CA, USA</h3>
                        <h3><i class="fa fa-envelope"></i>office@example.com</h3>
                        <h3><i class="fa fa-phone"></i>+123-456-7890</h3>
                        <div class="social">
                            <a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text"  name="name" class="form-control" placeholder="Your Name"/>
                                    <x-error-message name="name"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email"/>
                                    <x-error-message name="email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject"/>
                                <x-error-message name="subject"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                                <x-error-message name="message"/>
                            </div>
                            <div>
                                <button class="btn" type="submit">Send Message</button>
                                @if(session('message'))
                                    <x-success-message/>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                <x-contact-map/>
            </div>
        </div>
    </div>
</x-layout>
