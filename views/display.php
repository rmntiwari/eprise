<?php
    header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
    header("Content-type: text/html; charset=UTF-8") ;
    header("Cache-Control: no-cache");
?>

<?php $this->load->view('SSI/header'); ?>

    <div class="container">
        <?php
        $this->load->view($main_content);
        ?>
    </div>

<?php $this->load->view('SSI/footer'); ?>
