   <!-- Sidebar -->
   <ul class="navbar-nav bg-secondary sidebar sidebar-dark accordion " id="accordionSidebar"  >

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: rgb(31, 31, 31);">
    <div class="sidebar-brand-icon rotate-n-15" >
        
    </div>
    <div class="sidebar-brand-text mx-3" style="color:#FFD700;">Kasir Resto</div>
</a>

<!-- Divider -->
<img src="<?= base_url('assets/img/component/MCD2.jpg'); ?>" style="margin: 1rem; " <span class="border border-warning "></span>>
<hr class="sidebar-divider">

<?php 
$role_id = $this->session->userdata('role_id');
   $queryMenu =  "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_access_menu`
                      ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                   WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` 
                    ";
   $menu = $this->db->query($queryMenu)->result_array();
  
?>



<!-- LOOPING MENU -->
<?php foreach ($menu as $m) : ?>
<div class="sidebar-heading bg-warning rounded-pill text-dark mb-2" >
        <?= $m['menu']; ?>
</div>

<!-- submenu -->
<?php
$menuId = $m['id'];
$querySubMenu = "SELECT *
                    FROM `user_sub_menu` JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                   WHERE `user_sub_menu`.`menu_id` = $menuId
                     AND `user_sub_menu`.`is_active` = 1
";
$subMenu = $this->db->query($querySubMenu)->result_array();
?>

<?php foreach ($subMenu as $sm) : ?>
    <?php if ($title == $sm['title']) : ?>
    <li class="nav-item active " >
        <?php else : ?>
    <li class="nav-item ">
        <?php endif ; ?>
        
    <a class="nav-link  bg-dark rounded-pill mb-2 p-2 " href="<?= base_url($sm['url']); ?>" >
        <i class="<?= base_url('icon'); ?>"></i>
        <span><?= $sm['title']; ?></span></a>
</li>
<?php endforeach; ?>

<hr class="sidebar-divider mt-3">

<?php endforeach; ?>




<li class="nav-item">
    <a class="nav-link  bg-dark text-light" href="<?= base_url('profile'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>My Profile</span></a>
</li>

<li class="nav-item active">
    <a class="nav-link bg-danger" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
</li>
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline mt-3">
    <button class="rounded-circle border-0" id="sidebarToggle" ></button>
</div>

</ul>
<!-- End of Sidebar -->


