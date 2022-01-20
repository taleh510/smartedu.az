<?php include('header.php');

$muellimsorus = $db->prepare("SELECT * FROM se_m");
$muellimsorus->execute();

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
            <h6 class="m-0 font-weight-bold text-primary">Müəllimlərin siyahısı</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 5, "asc" ]]'>
                    <thead>
                        <tr>
                            <th>Ad Soyad</th>
                            <th>Telefon</th>
                            <th>Email</th>
                            <th>Təvəllüd</th>
                            <th>Fənn</th>
                            <th>Şifrə</th>
                            <th>Qeydiyyat vaxtı</th>
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($muellimcek = $muellimsorus->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo $muellimcek['m_ad'] . "  " . $muellimcek['m_soyad']; ?></td>
                                <td><?php echo $muellimcek['m_telefon']; ?></td>
                                <td><a href="mailto:<?php echo $muellimcek['mail']; ?>"><?php echo $muellimcek['mail']; ?></a></td>
                                <td><?php echo $muellimcek['m_yas']; ?></td>
                                <td><?php echo $muellimcek['m_fenn']; ?></td>
                                <td><?php echo $muellimcek['sifre']; ?></td>
                                <td><?php echo $muellimcek['m_qeydiyyat']; ?></td>
                                <td><a href="./muellimduzelis?muellim_id=<?php echo $muellimcek['m_id']; ?>&muellimduzelis=ok">
                                        <button type="submit" name="muellimduzelis" class="btn btn-primary btn-sm px-4">Düzəliş</button></a></td>
                                <td><a href="./netting/process?muellim_id=<?php echo $muellimcek['m_id']; ?>&muellimsil=ok">
                                        <button type="submit" name="muellimsil" class="btn btn-danger btn-sm px-4">Sil</button></a></td>

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