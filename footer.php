<?php 
ob_start();
//session_start();
include 'admin/netting/connect.php';
$ab1 = $db->prepare("SELECT * FROM se_about where a_id=:a_id");
$ab1->execute(array('a_id'=>"0"));
$ab0 = $ab1->fetch(PDO::FETCH_ASSOC);?>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-box">
                        <div class="logo-footer">
                            <img src="./resources/img/Group 77 (1).svg" alt="">
                        </div>
                        <div class="power-by">
                            <span> Powered by Deirvlon Technologies <br>
                             <a   href="https://<?php echo $ab0['sayt']?>"><?php echo $ab0['sayt']?></a>
                        </div>
                        <div class="contact-me">
                            <span>Bizimlə Əlaqə</span>
                            <span><i class="fab fa-whatsapp"></i> <?php echo $ab0['nomre']?></span>
                        </div>
                        <div class="copywriter">
                            <span>Copyright © 2021 Deirvlon Technologies. All rights are reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    <script src="admin/js/jbvalidator.js"></script>
    <script src="./resources/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>