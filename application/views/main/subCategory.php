<?php $this->load->view( 'main/inc/head.php'); ?>

<body class="header-fixed header-fixed-space-v2">
	<div class="wrapper">
		<?php 
            $this->load->view( 'main/inc/header.php');
            $this->load->view( 'main/inc/search.php');
            
            //$this->load->view( 'main/page/categoryPage.php' );
            $this->load->view( 'main/page/subCategoryPage.php'); 
            
            $this->load->view( 'main/inc/footer.php');
        ?>
        
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/projectTypeMenu.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/compare.js"></script>
        <script type="text/javascript" src="<?=base_url()?>mats/mainJs/category/subCategory.js"></script>
