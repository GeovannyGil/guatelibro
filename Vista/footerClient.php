  <?php
  echo '
  <!-- </div> -->
  <!-- jQuery -->
  <script src="http://localhost/guatelibro/assets/js/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="http://localhost/guatelibro/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $(".profile .icon_wrap").click(function() {
        $(this).parent().toggleClass("active");
        $(".notifications").removeClass("active");
      });

      $(".notifications .icon_wrap").click(function() {
        $(this).parent().toggleClass("active");
        $(".profile").removeClass("active");
      });

      $(".show_all .link").click(function() {
        $(".notifications").removeClass("active");
        $(".popup").show();
      });

      $(".close").click(function() {
        $(".popup").hide();
      });
    });
  </script>
  </body>
  </html>
  ';
  ?>
  