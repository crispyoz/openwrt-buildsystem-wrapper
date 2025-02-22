        <!-- Bootstrap core JavaScript-->
        <script src="./assets/js/jquery.min.js"></script>
        <script src="./assets/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="./assets/js/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="./assets/js/bootstrap.min.js"></script>

        <!-- Page level plugins -->
        <script src="./assets/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="./assets/js/datatables-demo.js"></script>

        <script src="./assets/js/popper.min.js"></script>

        <!-- used to hide the navigation bar -->
        <script>
            $(document).ready(function() {

                $("#btnToggleSideBar").on('click', function() {
                    if ($(".sidebar").hasClass("sidebar-hide")) {
                        $(".sidebar").removeClass("sidebar-hide");
                    } else {
                        $(".sidebar").addClass("sidebar-hide");
                    }
                });
            });

        </script>