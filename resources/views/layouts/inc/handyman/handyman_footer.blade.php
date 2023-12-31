<!-- Footer -->
<footer class="footer" id="footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <!-- Widget :: Contacts Info -->
                    <div class="contacts-widget widget widget__footer">
                        <h3 class="widget-title">Contact Us</h3>
                        <div class="widget-content">
                            <ul class="contacts-info-list">
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    <div class="info-item">
                                        HandyMan Co., Old Town Avenue, New York, USA 23000
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <div class="info-item">
                                        +1700 124-5678<br>
                                        +1700 124-5678
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- /Widget :: Contacts Info -->
                </div>
                <div class="col-sm-4 col-md-4">
                    <!-- Widget :: Latest Posts -->
                    <div class="latest-posts-widget widget widget__footer">
                        <h3 class="widget-title">Recent Posts</h3>
                        <div class="widget-content">
                            <ul class="latest-posts-list">
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <span class="info-item">
                                        <a href="mailto:info@dan-fisher.com">support@dan-fisher.com</a>
                                    </span>
                                </li>
                                <li>
                                    <i class="fa fa-clock-o"></i>
                                    <span class="info-item">
                                        Monday - Friday 9:00 - 21:00
                                    </span>

                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- /Widget :: Latest Posts -->
                </div>

                <div class="clearfix visible-sm"></div>

                <div class="col-sm-4 col-md-4">
                    <!-- Widget :: Newsletter -->
                    <div class="widget_newsletter widget widget__footer">
                        <h3 class="widget-title">Get Our Newsletter</h3>
                        <div class="widget-content">
                            <p>Get timely DIY projects for your home and yard delivered right to your inbox every week!</p>

                            <form action="php/newsletter-form.php" method="POST" id="newsletter-form">

                                <div class="alert alert-success hidden" id="newsletter-alert-success">
                                    <strong>Success!</strong> Thank you for subscribing.
                                </div>
                                <div class="alert alert-danger hidden" id="newsletter-alert-error">
                                    <strong>Error!</strong> Something went wrong.
                                </div>

                                <div class="form-group">
                                    <input type="email"
                                        value=""
                                        data-msg-required="Please enter email address."
                                        data-msg-email="Please enter a valid email address."
                                        class="form-control"
                                        placeholder="Enter your email here..."
                                        name="subscribe-email"
                                        id="subscribe-email">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" data-loading-text="Loading...">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <!-- /Widget :: Newsletter -->
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    Copyright &copy;  <script>
                        var CurrentYear = new Date().getFullYear()
                        document.write(CurrentYear)</script>   <a href="index.html">HandyMan</a> &nbsp;| &nbsp;All Rights Reserved
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer / End -->
