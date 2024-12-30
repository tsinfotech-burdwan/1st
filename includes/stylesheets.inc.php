

<?php if($folder === 'root') {  ?>
    <!-- CSS: All Vendors -->
    <link rel="stylesheet" href="<?php echo $base_url;?>css/vendors.css">  
    <link rel="stylesheet" href="<?php echo $base_url;?>css/slick-carousel.min.css">  
    <link rel="stylesheet" href="<?php echo $base_url;?>css/variables.css">  
    <!-- CSS: Html Designer -->
    <link rel="stylesheet" href="<?php echo $base_url;?>css/style.css">  
<?php } if($folder === 'blog') {  ?>
    <!-- CSS: All Vendors -->
    <link rel="stylesheet" href="<?php echo $base_url;?>css/vendors.css">  
    <link rel="stylesheet" href="<?php echo $base_url;?>css/variables.css"> 
    <!-- CSS: Html Designer -->
    <link rel="stylesheet" href="<?php echo $base_url;?>css/blog.css">  
<?php } ?>
    <script type="text/javascript">
        function getThePollDetails()
        {
            alert("Testing by ankush for poll onload.");
        }
    </script>
<style>
    :root {
        --check: url('<?php echo $base_url;?>assets/images/icons/check.svg');
    }
</style>