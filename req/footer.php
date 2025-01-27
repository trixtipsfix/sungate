
    <footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-3 col-md-12 p-r-5">
                <p><img src="lib/img/logo.png" width="250" height="" data-retina="true" alt=""></p>
                <p>Ihr Experte für exklusive Reisen zu besten Preisen!</p>
                <div class="follow_us">
                    <ul>
                        <li>Folge uns auf:</li>
                        <li><a target="_blank" href="https://www.facebook.com/Sungate24com-338095943686699/?ref=br_rs"><i class="ti-facebook"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/sungate24/"><i class="ti-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-r-5">

            </div>
            <div class="col-lg-2 col-md-6 ml-lg-auto">
                <h5>Short Links</h5>
                <ul class="links">
                    <li><a href="login">Login</a></li>
                    <li><a href="register">Jetzt anmelden</a></li>
                    <li><a href="blog">Inspirationen</a></li>
                    <li><a href="contact">Kontakt</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>Kontakt Information</h5>
                <ul class="contacts">
                    <li><a href="tel:  0800 711 82 17 "><i class="ti-mobile"></i>   0800 711 82 17 </a></li>
                    <li><a href="mailto:info@sungate24.com"><i class="ti-email"></i> <span class="__cf_email__">info[@]sungate24.com</span></a></li>
                </ul>
                <div id="newsletter">
                    <h6>Jetzt Newsletter kostenlos abonnieren</h6>
                    <div id="message-newsletter"></div>


                    <form action="https://sungate24.us3.list-manage.com/subscribe/post?u=fb3167abbae7d17fd8dd24a7f&amp;id=2e6c1cf988" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div class="form-group">
                            <input type="email" name="EMAIL" id="mce-EMAIL" class="form-control required email" placeholder="Ihre Email">
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_fb3167abbae7d17fd8dd24a7f_2e6c1cf988" tabindex="-1" value=""></div>
                            <input type="submit" value="Abonnieren" id="mc-embedded-subscribe">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/row-->
        <hr>
        <div class="row">
            <div class="col-lg-3">
                <ul id="footer-selector">
                    <li><img src="lib/img/cards_all.svg" alt=""></li>
                </ul>
            </div>
            <div class="col-lg-9">
                <ul id="additional_links">
                    <?php
                        $pages = $db->get_results("SELECT * FROM the_page  ORDER BY  page_id ASC");
                        foreach ($pages as $page){
                    ?>
                    <li><a href="page/<?=$page->slug?>"><?=$page->name?></a></li>
                    <?php } ?>

                    <li>© <?=date('Y')?> Sungate24</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
    <!--/footer-->

</div>
<!-- page -->


<!-- Einloggen Popup -->
<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
    <div class="small-dialog-header">
        <h3>Einloggen</h3>
    </div>
    <form>
        <div class="sign-in-wrapper">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <i class="icon_mail_alt"></i>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" id="password" value="">
                <i class="icon_lock_alt"></i>
            </div>
            <div class="clearfix add_bottom_15">
                <div class="checkboxes float-left">
                    <label class="container_check">Remember me
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
                <div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
            </div>
            <div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
            <div class="text-center">
                Don’t have an account? <a href="register">Sign up</a>
            </div>
            <div id="forgot_pw">
                <div class="form-group">
                    <label>Please confirm login email below</label>
                    <input type="email" class="form-control" name="email_forgot" id="email_forgot">
                    <i class="icon_mail_alt"></i>
                </div>
                <p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
            </div>
        </div>
    </form>
    <!--form -->
</div>
<!-- /Einloggen Popup -->

<div id="toTop"></div><!-- Back to top button -->