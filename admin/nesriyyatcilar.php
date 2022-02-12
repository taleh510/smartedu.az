<?php include('header.php');

$nsorus = $db->prepare("SELECT * FROM se_nesriyyatcilar");
$nsorus->execute();

?>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Azerbaijan.json',
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'print', {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }],
            select: true,
        });
    });
</script>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="    display: flex; justify-content: space-between;">
            <h6 style="display: flex; align-items: center; font-size: 18px;" class="m-0 font-weight-bold text-primary">Nəşriyyatçıların siyahısı</h6>
            <div class="add-btn">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Əlavə et
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nəşriyyatçı əlavə et</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="netting/process"> <input type="text" class="form-control form-control-user" name="nadi" placeholder="Nəşriyyatçılar">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                            <button type="submit" name="nnew" class="btn btn-primary">Əlavə et</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-order='[[ 5, "asc" ]]'>
                    <thead>
                        <tr>
                            <th>Nəşriyyatçılar</th>
                            <th>Düzəliş</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($ncek = $nsorus->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <form method="post" action="netting/process?n_id=<?php echo $ncek['n_id']; ?>">
                                    <td><input type="text" class="form-control form-control-user" name="nad" placeholder="C" value="<?php echo $ncek['n_ad']; ?>"></td>
                                    <td>
                                        <div class="edit-btn" style="display: flex; align-items: center; justify-content: center;">
                                            <button type="submit" class="btn btn-primary btn-sm px-4" name="nedit">Düzəliş</button>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="edit-btn" style="display: flex; align-items: center; justify-content: center;">
                                            <button type="submit" class="btn btn-danger btn-sm px-4" name="nsil">Sil</button>
                                        </div>
                                    </td>
                                </form>
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