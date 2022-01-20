<?php include 'header.php';
$esorus = $db->prepare("SELECT * FROM se_exam");
$esorus->execute();
$ecek = $esorus->fetch(PDO::FETCH_ASSOC);
?>

<link href="css/sb-admin-2.min.css" rel="stylesheet">

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card admin-card border-0 shadow-lg my-3 justify-content-center" style="width: 100%; text-align: center;margin: auto;">

      <div class="col-lg">
        <div class="p-5">
          <div class="form-top">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Imtahan əlavə et</h1>
            </div>
            <form action="">
              <div class="row form-top" style="display: flex; justify-content:space-between !important">
                <div class="col-sm-2 mb-3 mb-sm-0" style="margin-bottom:1rem !important">
                  <label style="margin-bottom:8px" for="">İmtahan qiyməti:</label> <br>
                  <input type="text" class="form-control form-control-user" name="ad" placeholder="">
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0" style="margin-bottom:1rem !important">
                  <label style="margin-bottom:8px" for="">İmtahan tarixi:</label> <br>
                  <input type="text" class="form-control form-control-user" name="ad" placeholder="">
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0" style="margin-bottom:1rem !important">
                  <label for="">İmtahan müddəti:</label>
                  <input type="text" class="form-control form-control-user" name="ad">
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0" style="margin-bottom:1rem !important">
                  <label for="">Bölmə:</label>
                  <input type="text" class="form-control form-control-user" name="ad">
                </div>
                <div class="col-sm-2 mb-3 mb-sm-0" style="margin-bottom:1rem !important">
                  <label for="">Nəşriyyatçı:</label>
                  <!-- <input type="text" class="form-control form-control-user" name="ad"> -->

                  <select name="" id="" class="form-control form-control-user" form="">
                    <option value="<?php echo $ecek['nesriyyatci']; ?>"><?php echo $ecek['nesriyyatci']; ?></option>
                  </select>

                </div>
                <div class="col-sm-2" style="display: flex ; flex-direction: column ; justify-content: flex-end ; align-items: flex-end; margin-bottom: 1rem">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Mövzu əlavə et
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <label style="display: flex;flex-direction: column;justify-content: flex-start;align-items: flex-start;" for="">Movzu</label>
                              <input type="text" class="form-control form-control-user" name="muellimad" placeholder="Ad">
                            </div>
                            <div class="col-sm-6">
                              <label style="display: flex;flex-direction: column;justify-content: flex-start;align-items: flex-start;" for="">Movzu</label>
                              <input type="text" class="form-control form-control-user" name="muellimsoyad" placeholder="Soyad">
                            </div>
                            <div class="col-sm-12" style="margin-top: 10px;">
                              <label style="display: flex;flex-direction: column;justify-content: flex-start;align-items: flex-start;" for="">Mövzu</label>
                              <textarea name="" id="" cols="30" rows="10" style=" height:100px; width:100%; resize:none; outline:none; border-radius:5px; border:1px solid #ccc"></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          </form>
          <button type="submit" name="add" class="btn btn-primary btn-user btn-block">
            Əlavə et
          </button>
          </form>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
<?php include 'footer.php'  ?>