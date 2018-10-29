<nav>
    <ul>
        <li <?php if($current == 'home') {echo "class='active'";} ?>>
            <?php if($urole=="owner")
            {echo '<a href="adminhome.php">';}
            else if($urole=="employee")
            {echo '<a href="employeehome.php">';}
            ?>
                <span><i class="fa fa-home"></i></span>
                <span style="color:#ffffff;">Home</span>
            </a>
        </li>
        <li <?php if($urole=="employee"){echo 'id="hide"';} if($current == 'employeelist') {echo 'class="active"';} ?>>
            <a href="adminemployeelist.php">
                <span><i class="fa fa-user"></i></span>
                <span>Employees</span>
            </a>
        </li>
        <li <?php if($current == 'categories') {echo 'class="active"';} ?>>
            <a href="admincategories.php">

                <span><i class="fa fa-envelope"></i></span>
                <span>Categories</span>
            </a>
        </li>
        <li <?php if($current == 'subcategories') {echo 'class="active"';} ?>>
            <a href="adminsubcategories.php">
                <span><i class="fa fa-bar-chart"></i></span>
                <span>Subcategory</span>
            </a>
        </li>
        <li <?php if($current == 'products') {echo 'class="active"';} ?>>
            <a href="adminproducts.php">
                <span><i class="fa fa-credit-card-alt"></i></span>
                <span>Products</span>
            </a>
        </li>
        <li <?php if($current == 'suppliers') {echo 'class="active"';} ?>>
            <a href="adminsupplier.php">
                <span><i class="fa fa-amazon"></i></span>
                <span>Suppliers</span>
            </a>
        </li>
        <li <?php if($current == 'preorder') {echo 'class="active"';} ?>>
            <a href="adminpreorder.php">
                <span><i class="fa fa-dollar"></i></span>
                <span>Preorders</span>
            </a>
        </li>
        <li <?php if($current == 'supply') {echo 'class="active"';} ?>>
            <a href="adminsupplylist.php">
                <span><i class="fa fa-dollar"></i></span>
                <span>Supplylist</span>
            </a>
        </li>
        <li <?php if($current == 'transaction') {echo 'class="active"';} ?>>
            <a href="admintransactionlist.php">
                <span><i class="fa fa-dollar"></i></span>
                <span>Transactionlist</span>
            </a>
        </li>
        <li <?php if($current == '') {echo 'class="active"';} ?>>
            <a href="invoice/sell.php">
                <span><i class="fa fa-dollar"></i></span>
                <span>Create Invoice</span>
            </a>
        </li>
    </ul>
</nav>
