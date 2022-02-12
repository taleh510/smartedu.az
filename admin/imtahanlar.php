<?php include('header.php');
$elaveden= $_SESSION['loginmail'];
$ees = $db->prepare("SELECT * FROM se_exam where elaveden=:elaveden");
$ees->execute(array('elaveden'=>$elaveden));
date_default_timezone_set('Etc/GMT-4');
?>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Azerbaijan.json',
            },
            dom: 'Bfrtip',
            select: true,
        });
    });
</script>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Imtahanların siyahısı</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 5, "asc" ]]'>
                    <thead>
                        <tr>
                            <th>Imtahan</th>
                            <th>Düzəliş</th>
                            <th>Sual əlavə et</th>
                            <th>Status</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($eec = $ees->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $eec['basliq']; ?></td>
                                <td style="text-align:center;"><a href="imtahanduzelis?e_id=<?php echo $eec['e_id'] ?>" ><button  type="button" class="btn btn-primary">Düzəliş et</button></a></td>
                                <td style="text-align:center;"><a href="sualelave?e_id=<?php echo $eec['e_id'] ?>&s=0" ><button  type="button" class="btn btn-primary">Sual əlavə et</button></a></td>
                                <td style="text-align:center;">
                                  <?php  
                                  if($eec['stts']=="Aktiv"){
                                  echo  '<button  type="button" class="btn btn-success">Aktiv</button>';
                                  }
                                  if($eec['stts']=="Passiv"){
                                    echo  '<button  type="button" class="btn btn-danger">Passiv</button>';
                                    }
                                  ?>
                              </td>
                             <td style="text-align:center;"><?php if($eec['stts']=="Passiv"){ ?>
                                  <a style="text-decoration:none;" href="netting/process.php?e_id=<?php echo $eec['e_id'] ?>&ss=imtahaniaktivet">
                                  <form method="get" action="netting/process.php"> 
                                  <input hidden name="e_id" value="<?php echo $eec['e_id'] ?>">
                                  <button type="submit" name="imtahaniaktivet" class="btn btn-success btn-sm px-4">Aktiv et</button>
                                </form> 
                              <?php    }if($eec['stts']=="Aktiv"){ ?>
                                  <a style="text-decoration:none;" href="netting/process.php?e_id=<?php echo $eec['e_id'] ?>&ss=imtahanideaktivet">
                                  <form method="get" action="netting/process.php"> 
                                  <input hidden name="e_id" value="<?php echo $eec['e_id'] ?>">
                                  <button type="submit" name="imtahanideaktivet" class="btn btn-danger btn-sm px-4">De-aktiv et</button>
                              </form>
                                </td>
                            </tr>
                        <?php    }}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Deirvlon Technologies 2022</span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
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

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

</body>

</html>