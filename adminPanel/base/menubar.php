    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="dashboard"> 
                        <h2 class="brand-text mb-0"><?php echo $rowOrganizationDetails['application_short_name'];?></h2> 
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>  
        <div class="shadow-bottom"></div>  
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="<?php if($mainPageName=="Dashboard"){echo "active";}?> nav-item"><a href="dashboard"><i class="fa fa-home"></i><span class="menu-title" data-i18n="Email">Dashboard</span></a></li>  
            <?php if(in_array(26, $userPermissionDetails) || in_array(27, $userPermissionDetails) || in_array(28, $userPermissionDetails) || in_array(29, $userPermissionDetails) || in_array(30, $userPermissionDetails) || in_array(31, $userPermissionDetails) || in_array(32, $userPermissionDetails) || in_array(33, $userPermissionDetails)){ ?> 
                <li class=" navigation-header"><span>Images</span></li>                 
                <?php  if(in_array(26, $userPermissionDetails) || in_array(27, $userPermissionDetails) || in_array(28, $userPermissionDetails) || in_array(29, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-image"></i><span class="menu-title" data-i18n="Ecommerce">Banner Management</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(26, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Banner"){echo "active";}?> nav-item"><a href="addBanner"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Banner</span></a></li>
                            <?php } ?>
                            <?php if(in_array(27, $userPermissionDetails) || in_array(28, $userPermissionDetails) || in_array(29, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="List Banner"){echo "active";}?> nav-item"><a href="listBanner"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Banner</span></a></li>
                            <?php } ?>                      
                        </ul>
                    </li> 
                <?php }?>
                <?php if(in_array(30, $userPermissionDetails) || in_array(31, $userPermissionDetails) || in_array(32, $userPermissionDetails) || in_array(33, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Manage Folder"){echo "active";}?> nav-item"><a href="manageFolder"><i class="fa fa-folder"></i><span class="menu-title" data-i18n="Email">Manage Folder</span></a></li>
                <?php }?>
                <?php  if(in_array(35, $userPermissionDetails) || in_array(36, $userPermissionDetails) || in_array(37, $userPermissionDetails) || in_array(38, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-file"></i><span class="menu-title" data-i18n="Ecommerce">Gallery Management</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(35, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Image"){echo "active";}?> nav-item"><a href="addImage"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Image</span></a></li>
                            <?php } ?>
                            <?php if(in_array(36, $userPermissionDetails) || in_array(37, $userPermissionDetails) || in_array(38, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="List Image"){echo "active";}?> nav-item"><a href="listImages"><i class="fa fa-plus"></i><span class="menu-item" data-i18n="Shop">List Image</span></a></li>
                            <?php } ?>                        
                        </ul>
                    </li> 
                <?php }?>
            <?php }?>
            <?php if(in_array(13, $userPermissionDetails) || in_array(14, $userPermissionDetails) || in_array(15, $userPermissionDetails) || in_array(16, $userPermissionDetails) || in_array(17, $userPermissionDetails) || in_array(19, $userPermissionDetails) || in_array(20, $userPermissionDetails) || in_array(21, $userPermissionDetails) || in_array(22, $userPermissionDetails) || in_array(23, $userPermissionDetails) || in_array(40, $userPermissionDetails) || in_array(54, $userPermissionDetails)  || in_array(55, $userPermissionDetails) || in_array(48, $userPermissionDetails) || in_array(49, $userPermissionDetails) || in_array(50, $userPermissionDetails) || in_array(51, $userPermissionDetails) || in_array(52, $userPermissionDetails) || in_array(42, $userPermissionDetails) || in_array(43, $userPermissionDetails) || in_array(44, $userPermissionDetails) || in_array(45, $userPermissionDetails) || in_array(46, $userPermissionDetails) || in_array(57, $userPermissionDetails)  || in_array(58, $userPermissionDetails) || in_array(60, $userPermissionDetails) || in_array(61, $userPermissionDetails) || in_array(62, $userPermissionDetails) || in_array(63, $userPermissionDetails) || in_array(64, $userPermissionDetails) || in_array(65, $userPermissionDetails) || in_array(66, $userPermissionDetails) || in_array(67, $userPermissionDetails) || in_array(68, $userPermissionDetails) || in_array(73, $userPermissionDetails) || in_array(74, $userPermissionDetails) || in_array(75, $userPermissionDetails) || in_array(77, $userPermissionDetails)){ ?> 
                <li class=" navigation-header"><span>Transaction</span></li>
                <?php if(in_array(77, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Contact Us"){echo "active";}?> nav-item"><a href="masterContactUs"><i class="fa fa-star-o"></i><span class="menu-title" data-i18n="Email">Contact Us</span></a></li>
                <?php }?>                               
                <?php if(in_array(40, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Chairman Name"){echo "active";}?> nav-item"><a href="masterChairmanName"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email">Chairman Name</span></a></li>
                <?php }?>
                <?php if(in_array(54, $userPermissionDetails)  || in_array(55, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Pop Up"){echo "active";}?> nav-item"><a href="masterPopUp"><i class="fa fa-camera"></i><span class="menu-title" data-i18n="Email">Pop Up</span></a></li>
                <?php }?>
                <?php if(in_array(57, $userPermissionDetails)  || in_array(58, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Calendar"){echo "active";}?> nav-item"><a href="masterCalendar"><i class="fa fa-calendar"></i><span class="menu-title" data-i18n="Email">Calendar</span></a></li>
                <?php }?> 
                <?php  if(in_array(60, $userPermissionDetails) || in_array(61, $userPermissionDetails) || in_array(62, $userPermissionDetails) || in_array(63, $userPermissionDetails) || in_array(64, $userPermissionDetails) || in_array(65, $userPermissionDetails) || in_array(66, $userPermissionDetails) || in_array(67, $userPermissionDetails) || in_array(68, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-sign-in"></i><span class="menu-title" data-i18n="Ecommerce">Administrative Management</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(60, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Chairman In Council"){echo "active";}?> nav-item"><a href="addChairmanInCouncil"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Chairman In Council</span></a></li>
                            <?php } ?>                            
                            <?php if(in_array(66, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Telephone Directory"){echo "active";}?> nav-item"><a href="addTelephoneDirectory"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Telephone Directory</span></a></li>
                            <?php } ?>
                            <?php if(in_array(61, $userPermissionDetails) || in_array(62, $userPermissionDetails) || in_array(65, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Chairman In Council"){ ?>class="active"<?php }?>><a href="listChairmanInCouncil"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Chairman In Council</span></a></li>
                            <?php } ?>
                            <?php if(in_array(63, $userPermissionDetails) || in_array(64, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Previous Board"){ ?>class="active"<?php }?>><a href="listPreviousBoard"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Previous Board</span></a></li>
                            <?php } ?>
                            <?php if(in_array(67, $userPermissionDetails) || in_array(68, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Telephone Directory"){ ?>class="active"<?php }?>><a href="listTelephoneDirectory"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Telephone Directory</span></a></li>
                            <?php } ?>                     
                        </ul>
                    </li> 
                <?php }?> 
                <?php  if(in_array(73, $userPermissionDetails) || in_array(74, $userPermissionDetails) || in_array(75, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-sign-in"></i><span class="menu-title" data-i18n="Ecommerce">Poll Management</span></a> 
                        <ul class="menu-content">
                            <?php if(in_array(73, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Poll"){echo "active";}?> nav-item"><a href="addPollManagement"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Poll</span></a></li>
                            <?php } ?>
                            <?php if(in_array(74, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="Active Or De-Active Poll Management"){ ?>class="active"<?php }?>><a href="activeOrDeActivePollManagement"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">Active/De-Active Poll Management</span></a></li>
                            <?php } ?> 
                             <?php if(in_array(75, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="Poll Report"){ ?>class="active"<?php }?>><a href="pollReport"><i class="fa fa-print"></i><span class="menu-item" data-i18n="Shop">Poll Report</span></a></li>
                            <?php } ?>                      
                        </ul>
                    </li> 
                <?php }?> 
                <?php  if(in_array(42, $userPermissionDetails) || in_array(43, $userPermissionDetails) || in_array(44, $userPermissionDetails) || in_array(45, $userPermissionDetails) || in_array(46, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-sign-in"></i><span class="menu-title" data-i18n="Ecommerce">Financial Statement</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(42, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Financial Statement"){echo "active";}?> nav-item"><a href="addFinancialStatement"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Financial Statement</span></a></li>
                            <?php } ?>
                            <?php if(in_array(43, $userPermissionDetails) || in_array(44, $userPermissionDetails) || in_array(45, $userPermissionDetails) || in_array(46, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Financial Statement"){ ?>class="active"<?php }?>><a href="listFinancialStatement"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Financial Statement</span></a></li>
                            <?php } ?>                      
                        </ul>
                    </li> 
                <?php }?> 
                <?php  if(in_array(48, $userPermissionDetails) || in_array(49, $userPermissionDetails) || in_array(50, $userPermissionDetails) || in_array(51, $userPermissionDetails) || in_array(52, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-sign-in"></i><span class="menu-title" data-i18n="Ecommerce">Department Manpower</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(48, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Department Manpower"){echo "active";}?> nav-item"><a href="addDepartmentManpower"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Department Manpower</span></a></li>
                            <?php } ?>
                            <?php if(in_array(49, $userPermissionDetails) || in_array(50, $userPermissionDetails) || in_array(51, $userPermissionDetails) || in_array(52, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Department Manpower"){ ?>class="active"<?php }?>><a href="listDepartmentManpower"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Department Manpower</span></a></li>
                            <?php } ?>                      
                        </ul>
                    </li> 
                <?php }?>                
                <?php  if(in_array(13, $userPermissionDetails) || in_array(14, $userPermissionDetails) || in_array(15, $userPermissionDetails) || in_array(16, $userPermissionDetails) || in_array(17, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-sign-in"></i><span class="menu-title" data-i18n="Ecommerce">Tender Management</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(13, $userPermissionDetails)){ ?>
                            <li class="<?php if($subPageName=="Add Tender"){echo "active";}?> nav-item"><a href="addTender"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Tender</span></a></li>
                            <?php } ?>
                            <?php if(in_array(14, $userPermissionDetails) || in_array(15, $userPermissionDetails) || in_array(16, $userPermissionDetails) || in_array(17, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Tender"){ ?>class="active"<?php }?>><a href="listTender"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Tender</span></a></li>
                            <?php } ?>                      
                        </ul>
                    </li> 
                <?php }?>
                <?php  if(in_array(19, $userPermissionDetails) || in_array(20, $userPermissionDetails) || in_array(21, $userPermissionDetails) || in_array(22, $userPermissionDetails) || in_array(23, $userPermissionDetails)){ ?>
                    <li class=" nav-item"><a href="#"><i class="fa fa-sign-in"></i><span class="menu-title" data-i18n="Ecommerce">Notice Management</span></a>
                        <ul class="menu-content">
                            <?php if(in_array(19, $userPermissionDetails)){ ?>
                            <li class="<?php if($mainPageName=="Add Notice"){echo "active";}?> nav-item"><a href="addNotice"><i class="fa fa-plus"></i><span class="menu-title" data-i18n="Email">Add Notice</span></a></li>
                            <?php } ?>
                            <?php if(in_array(20, $userPermissionDetails) || in_array(21, $userPermissionDetails) || in_array(22, $userPermissionDetails) || in_array(23, $userPermissionDetails)){ ?>
                            <li <?php if($subPageName=="List Notice"){ ?>class="active"<?php }?>><a href="listNotice"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List Notice</span></a></li>
                            <?php } ?>                        
                        </ul>
                    </li> 
                <?php }?>
            <?php }?>
            <?php if(in_array(2, $userPermissionDetails) || in_array(3, $userPermissionDetails) || in_array(5, $userPermissionDetails) || in_array(6, $userPermissionDetails) || in_array(9, $userPermissionDetails) || in_array(10, $userPermissionDetails) || in_array(11, $userPermissionDetails)){ ?> 
                <li class=" navigation-header"><span>Master</span></li> 
                <?php if(in_array(2, $userPermissionDetails) || in_array(3, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Department Master"){echo "active";}?> nav-item"><a href="masterDepartment"><i class="fa fa-sitemap"></i><span class="menu-title" data-i18n="Email">Department Master</span></a></li>
                <?php }?> 
                <?php if(in_array(5, $userPermissionDetails) || in_array(6, $userPermissionDetails) || in_array(7, $userPermissionDetails)){ ?>
                <li class="<?php if($mainPageName=="Designation Master"){echo "active";}?> nav-item"><a href="masterDesignation"><i class="fa fa-users"></i><span class="menu-title" data-i18n="Email">Designation Master</span></a></li>
                <?php }?>
                <?php  if(in_array(9, $userPermissionDetails) || in_array(10, $userPermissionDetails) || in_array(11, $userPermissionDetails)){ ?>
                <li class=" nav-item"><a href="#"><i class="fa fa-user-secret"></i><span class="menu-title" data-i18n="Ecommerce">User Master</span></a>
                    <ul class="menu-content">
                        <?php if(in_array(9, $userPermissionDetails)){ ?>
                        <li <?php if($subPageName=="Add User"){ ?>class="active"<?php }?>><a href="masterAddUser"><i class="fa fa-plus"></i><span class="menu-item" data-i18n="Shop">Add User</span></a></li>
                        <?php } ?>
                        <li <?php if($subPageName=="List User"){ ?>class="active"<?php }?>><a href="masterListUser"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">List User</span></a></li>
                    </ul>
                </li> 
                <?php }?>
            <?php }?> 
            <?php if($_SESSION[$counterSessionName]['designation_id']==1){?>
                <li class="<?php if($mainPageName=="Panel Setting"){echo "active";}?> nav-item"><a href="panelSettings"><i class="fa fa-wrench"></i><span class="menu-title" data-i18n="Email">Panel Setting</span></a></li>
                <!-- <li class=" nav-item"><a href="#"><i class="fa fa-newspaper-o"></i><span class="menu-title" data-i18n="Ecommerce">Menu Master</span></a>
                    <ul class="menu-content">
                        <li <?php if($subPageName=="Menu Category"){ ?>class="active"<?php }?>><a href="masterMenuCategory"><i class="fa fa-th-large"></i><span class="menu-item" data-i18n="Shop">Category</span></a></li>
                        <li <?php if($subPageName=="Main Menu"){ ?>class="active"<?php }?>><a href="masterMenuMain"><i class="fa fa-th-list"></i><span class="menu-item" data-i18n="Shop">Main Menu</span></a></li>
                        <li <?php if($subPageName=="Sub Menu"){ ?>class="active"<?php }?>><a href="masterMenuSub"><i class="fa fa-list"></i><span class="menu-item" data-i18n="Shop">Sub Menu</span></a></li>
                    </ul> 
                </li>-->
            <?php }?>
            </ul>
        </div>
    </div> 