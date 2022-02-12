<?php include('header.php');

$us = $db->prepare("SELECT * FROM se_all_users where stts not like 'sa' ");
$us->execute();

?>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Azerbaijan.json',
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ],
            select: true,
        });
    });
</script>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">İstifadəçilərin siyahısı</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 5, "asc" ]]'>
                    <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Şifrə</th>
                            <th>Qeydiyyat vaxtı</th>
                            <th>Status</th>
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($uc = $us->fetch(PDO::FETCH_ASSOC)) {
                            $sfr = $uc['sifre'];
                            $ciphering = "AES-128-CTR";
                            $iv_length = openssl_cipher_iv_length($ciphering);
                            $options = 0;
                            $encryption_iv = '1234567891011121';
                            $encryption_key = "Deirvlon";
                            $sifre = openssl_decrypt($sfr, $ciphering, $encryption_key, $options, $encryption_iv);
                        ?>
                            <tr>
                                <td><?php echo $uc['ad'] . "  " . $uc['soyad']; ?></td>
                                <td><?php echo $uc['nomre']; ?></td>
                                <td><a href="mailto:<?php echo $uc['mail']; ?>"><?php echo $uc['mail']; ?></a></td>
                                <td><?php echo $sifre ?></td>
                                <td><?php echo $uc['qeydiyyat']; ?></td>
                                <td><?php echo $uc['stts']; ?></td>
                                <td>
                                    <a href="useredit?u_id=<?php echo $uc['u_id'] ?>"><button type="button" name="useredit" class="btn btn-primary btn-sm px-4" data-toggle="modal" data-target="#exampleModal">Düzəliş</button></a>
                                </td>
                                <td>
                                <form method="get" action="./netting/process">
                                <input hidden type="text" name="u_id" class="form-control" value="<?php echo $uc['u_id']; ?>" />
                                        <button type="submit" name="usersil" class="btn btn-danger btn-sm px-4">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
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
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Deirvlon Technologies 2022</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


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