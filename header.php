<link rel="shortcut icon" href="bootstrap/favicon.ico">

<header id="header">







    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">E-tsena</a>
            </div>
            <ul class="nav navbar-nav">
                <a href="index.php">Home</a>
            </ul>
            <div class="nav navbar-nav">
                <div class="dropdown">
                    <a href="addCategorie.php" class="dropdown-toggle" data-toggle="dropdown">Categorie</a>
                    <ul class="dropdown-menu">
                        <li><a href="">Vetement</a></li>
                        <li><a href="#">Chaussures</a></li>
                        <li><a href="#">Accessoires</a></li>
                    </ul>
                </div>
            </div>




            <ul class="nav navbar-nav">
                <a href="categorie.php">Panier</a>
            </ul>

            <form class="navbar-form navbar-left" action="admin/search.php">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Recherche</button>
            </form>
            <div class="form-group">
                <ul class="nav navbar-nav">
                    <a href="utilisateur/deconnexion.php"><span class="icon-lock"></span>Se deconnecter</a>
                </ul>
            </div>
        </div>
    </nav>

</header>
