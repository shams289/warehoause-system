<?php
// You can add PHP logic here if needed
?>
<!-- Sidebar -->
<link rel="stylesheet" href="css/shared/sidebar.css">
<div class="sidebar">
    <div class="sidebar-wrapper">
        <!-- Sidebar Header -->
        <div class="sidebar-header">
                       
        <a href="index.php" class="">
                    <div class="icon-cont">
                        <img src="assets/icons/Dashboard.svg" alt="" class="dash-icon">
                    </div>
                    <span>داشبۆرد</span>
                </a>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!-- Dashboard -->
           

            <!-- Products -->
            <li class="menu-item">
                <a href="#productsSubmenu" class="item-link">
                <div class="icon-cont">
                        <img src="assets/icons/product.svg" alt="">
                    </div>                    <span>کاڵاکان</span>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </a>
                <ul class="submenu" id="productsSubmenu">
                    <li><a href="addProduct.php">زیادکردنی کاڵا</a></li>
                    <li><a href="products.php">لیستی کاڵاکان</a></li>
                    <li><a href="categories.php">جۆرەکان</a></li>
                </ul>
            </li>

            <!-- Staff -->
            <li class="menu-item">
                <a href="#staffSubmenu" class="item-link">
                <div class="icon-cont">
                        <img src="assets/icons/accounts.svg" alt="">
                    </div> 
                    <span>هەژمارەکان</span>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </a>
                <ul class="submenu" id="staffSubmenu">
                    <li><a href="addStaff.php">زیادکردنی هاوکار</a></li>
                    <li><a href="staff.php">لیستی هاوکارەکان</a></li>
                </ul>
            </li>

            <!-- Sales -->
            <li class="menu-item">
                <a href="#salesSubmenu" class="item-link">
                <div class="icon-cont">
                        <img src="assets/icons/owes.svg" alt="">
                    </div>                    <span>فرۆشتنەکان</span>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </a>
                <ul class="submenu" id="salesSubmenu">
                    <li><a href="addSale.php">فرۆشتنی نوێ</a></li>
                    <li><a href="sales.php">لیستی فرۆشتنەکان</a></li>
                </ul>
            </li>
            
            <!-- Expenses -->
            <li class="menu-item">
                <a href="#expensesSubmenu" class="item-link">
                <div class="icon-cont">
                        <img src="assets/icons/spending.svg" alt="">
                    </div>                    <span>مەسروفات</span>
                    <i class="fas fa-chevron-down dropdown-icon"></i>
                </a>
                <ul class="submenu" id="expensesSubmenu">
                    <li><a href="employeePayment.php">پارەدان بە کارمەند</a></li>
                    <li><a href="shippingCost.php">کرێی بار</a></li>
                    <li><a href="moneyWithdrawal.php">دەرکردنی پارە</a></li>
                </ul>
            </li>

            <!-- Reports -->
            <li class="menu-item">
                <a href="reports.php" class="item-link">
                <div class="icon-cont">
                        <img src="assets/icons/report.svg" alt="">
                    </div>                    <span>ڕاپۆرتەکان</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="menu-item">
                <a href="settings.php" class="item-link">
                <div class="icon-cont">
                        <img src="assets/icons/balance.svg" alt="">
                    </div>                    <span>باڵانسەکان</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Overlay for mobile -->
<div class="overlay"></div> 