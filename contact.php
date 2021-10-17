<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>mystore.pk</title>


    <?php include_once "./links.php" ?>
</head>

<body>
    <?php include_once "./header.php" ?>


    <!-- Page Title -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col my-5">
                    <h3 class="text-center secondary-color">CONTACT - US</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mt-5 mb-lg-5 p-5">
                    <h2 class="contact">Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nesciunt laboriosam pariatur neque ratione, itaque ullam iure cumque error quasi animi numquam vero doloremque.</p>
                    <!-- Address -->
                    <div class="border contact-item shadow p-3 my-3 mt-5">
                        <div class="row">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-map-marker contact-icon" aria-hidden="true"></i>
                            </div>
                            <div class="col-8">
                                <span>Address :</span>
                                <p class="mb-0 mt-1">Islamabad, Pakistan Lorem ipsum dolor sit.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="border contact-item shadow p-3 my-3">
                        <div class="row mt-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-phone contact-icon" aria-hidden="true"></i>
                            </div>
                            <div class="col-8">
                                <span>Phone :</span>
                                <p class="mb-0 mt-1">+92-300-1234567</p>
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="border contact-item shadow p-3 my-3">
                        <div class="row mt-3">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <i class="fa fa-envelope contact-icon" aria-hidden="true"></i>
                            </div>
                            <div class="col-8">
                                <span>Email :</span>
                                <p class="mb-0 mt-1">mystore@gmail.com</p>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-6 my-lg-5 p-5">
                    <h2>Give Us a Suggestion</h2>
                    <p>We will appreciate your suggestion and definitely work on it.<br>Help us to improve our services !</p>

                    <form action="saveSuggestion.php" class="form contact" onsubmit="return validateContact()" method="POST">
                        <div class="row pt-5 pb-lg-3 mt-5">
                            <div class="col-md-6 form-field">
                                <label for="contactFirst">First Name<span>*</span></label>
                                <input class="form-input" type="text" name="firstname" id="contactFirst">
                                <small>Error</small>
                            </div>
                            <div class="col-md-6 form-field">
                                <label for="contactLast">Last Name<span>*</span></label>
                                <input class="form-input" type="text" name="lastname" id="contactLast">
                                <small>Error</small>
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col-12 form-field">
                                <label for="contactMessage">Message</label>
                                <textarea name="message" id="contactMessage" class="form-control form-input" rows="6"></textarea>
                                <small>Error</small>
                            </div>
                        </div>

                        <div class="row py-3">
                            <div class="col-md-6">
                                <input type="submit" value="Send Message" id="sendMessage" class="btn secondary-bg-color deal-btn w-100">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" src="./form-validation.js"></script>

    <?php include_once "./footer.php" ?>
</body>

</html>