<!--Footer-->
<footer class="page-footer text-center font-small wow fadeIn">
    <!--Copyright-->
    <div class="footer-copyright py-3">© 2023 Copyright:
        <a href="../index.html" target="_self"> RhythmMakers</a>
    </div>
</footer>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script  src=""></script>
    <!-- Initializations -->
    <script type="text/javascript" src="../js/addons/datatables.min.js"></script>
      
    </script>
    <script>
      new WOW().init();
      $(document).ready(function () {
        console.log("si")
        $('#dtHorizontalVerticalExample').DataTable({
        "scrollX": true,
        "scrollY": 200,
        });
        $('.dataTables_length').addClass('bs-select');
      });
    </script>
  </body>
</html>