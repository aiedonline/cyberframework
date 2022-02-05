<li class="dropdown">
    <a href="#"><?php 
        if(trim($USER->name) == "") {
            echo "Anônimo";  
        } else {
            echo $USER->name;  
        }
        
    ?><i class="icon-angle-down"></i></a>
    <ul class="dropdown-menu">
    <li><a href="/cyber/perfil.php">Perfil</a></li>
    <li><a href="/cyber/sigout.php">Sair</a></li>
    </ul>
</li>