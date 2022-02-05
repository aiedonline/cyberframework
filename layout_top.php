<!-- start header -->
<header>
<div class="top">
<div class="container">
    <div class="row">
    <div class="span6">
        <p class="topcontact"><i class="icon-phone"></i> +55 11 99927-9682</p>
    </div>
    <div class="span6">

        <ul class="social-network">
        <li><a href="#" data-placement="bottom" title="XMPP"><i class="icon-xmpp icon-xmpp"></i></a></li>
        </ul>

    </div>
    </div>
</div>
</div>
<div class="container">


<div class="row nomargin">
    <div class="span4">
    <div class="logo">
        <a href="/cyber/index.php"><img src="img/logo.png" alt="" /></a>
    </div>
    </div>
    <div class="span8">
    <div class="navbar navbar-static-top">
        <div class="navigation">
        <nav>
            <ul class="nav topnav">
            <li >
                <a href="/cyber/index.php"><i class="icon-home"></i> Home </i></a>
            </li>
            
            <li class="dropdown">
                <a href="#">Projetos <i class="icon-angle-down"></i></a>
                <ul class="dropdown-menu">
                <li><a href="/cyber/projects.php">Lista de projetos</a></li>
                
                </ul>
            </li>
            <li  class="/cyber/dropdown">
                <a href="/cyber/blog.php">Blog</a>
            </li>
            <li  class="/cyber/dropdown">
                <a href="/cyber/forum.php">Forum</a>
            </li>
            <li class="dropdown">
                <a href="#">Sobre <i class="icon-angle-down"></i></a>
                <ul class="dropdown-menu">
                <li><a href="about.php">Sobre cyber</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="team.php">Equipe</a></li>
                </ul>
            </li>

            <?php
                if($USER == null) {
                    include __DIR__ . "/layout_top_no_session.php";
                } else {
                    include __DIR__ . "/layout_top_session.php";
                }



            ?>
            
            <li>
                <a href="/cyber/contact.php">Contato </a>
            </li>
            </ul>
        </nav>
        </div>
        <!-- end navigation -->
    </div>
    </div>
</div>
</div>
</header>
<!-- end header -->
