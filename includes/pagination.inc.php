 

<?php if($pageName === 'flat-roof-tile.php') { ?>
    <nav aria-label="Blog Page Navigation">
        <ul class="pagination mt-4 mt-md-5 justify-content-end justify-content-lg-start">
            <?php if( $prevBtn === 'true' ) { ?> 
                <li class="page-item">
                    <a class="page-link" href="<?php echo $prevPageUrl; ?>" aria-label="Previous">
                        <img src="blog/images/icon/arrow-left.svg" class="img-fluid" alt="Icon">
                    </a>
                </li>
            <?php } ?> 
            <li class="page-item">
                <a class="page-link <?php if($active==='1'){echo "active"; }else{ echo ''; }?>" href="flat-roof-tile.php">1</a>
            </li>
            <li class="page-item">
                <a class="page-link <?php if($active==='2'){echo "active"; }else{ echo ''; }?>" href="flat-roof-tile-2.php">2</a> 
            </li>   
            <?php if( $nextBtn === 'true' ) { ?> 
                <li class="page-item">
                    <a class="page-link" href="<?php echo $nextPageUrl; ?>" aria-label="Next">
                        <img src="blog/images/icon/arrow-right.svg" class="img-fluid" alt="Icon">
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
<?php } ?>