    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <!-- Logo icon -->
                    <b><img src="images/softaox_blog.svg" alt="homepage" class="dark-logo" /></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span><img src="images/diazcompany.jpg" alt="homepage" class="text-logo dark-logo" /></span>
                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>

                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">

                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="http://0.gravatar.com/avatar/9ba3bdd422fbe82cb22127ddd0f07161?s=200&r=pg&d=mm" alt="user" class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="users.php"><i class="ti-user"></i> Profile</a></li>
                                <li><a href='logout.php'><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
</div>
<!-- End header header -->
<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">

            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class="has-arrow" href='./' aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a></li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-sticky-note"></i><span class="hide-menu">Posts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="posts.php">All Post</a></li>
                        <li><a href="new-post.php">Add Post</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-list-ul"></i><span class="hide-menu">Categories</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="categories.php">Categories</a></li>
                        <li><a href="add-category.php">Add New</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="users.php">Users</a></li>
                        <li><a href="new-user.php">Add User</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="../" aria-expanded="false" target="_blank"><i class="fa fa-eye"></i><span class="hide-menu">View Website </span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
