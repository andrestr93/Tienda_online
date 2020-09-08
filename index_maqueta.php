<!DOCTYPE HTML>

<html lang="es">

    <head>
        <meta charset="utf-8"/>
        <title>Tienda de Camisetas</title>
        <link rel="stylesheet" href="assets/css/style.css"/>
    </head>
    <body>
        <div id="container">

            <!--CABECERA-->


            <header id="header">

                <div id="logo">

                    <img src="assets/img/camiseta.png" alt="Camiseta Logo"/>

                    <a href="index.php">
                        Tienda de Camisetas
                    </a>
                </div>
            </header>





            <!--MENU-->

            <nav id="menu">

                <ul>

                    <li>
                        <a href="menu.php">Inicio </a>
                    </li>

                    <li>
                        <a href="menu.php">Categoria 1 </a>
                    </li>

                    <li>
                        <a href="menu.php">Categoria 2 </a>
                    </li>

                    <li>
                        <a href="menu.php">Categoria 3 </a>
                    </li>

                    <li>
                        <a href="menu.php">Categoria 4 </a>
                    </li>

                    <li>
                        <a href="menu.php">Categoria 5 </a>
                    </li>
                </ul>



            </nav>



            <div id="content">


                <!--BARRA LATERAL-->

                <aside id="lateral">

                    <div id="login" class="block_aside">

                        <h3>Identificate</h3>

                        <form action="·" method="post">


                            <label>Email</label>
                            <input type="email" name="email"/>

                            <label>Contraseña</label>
                            <input type="password" name="password"/>
                            <input type="submit" value="Enviar"/>
                        </form>

                        <ul>
                            <li> <a href="entrar.php">Mis pedidos</a></li>
                            <li><a href="entrar.php">Gestionar Pedidos</a></li>
                            <li> <a href="entrar.php">Gestionar Categorias</a></li>


                        </ul>

                    </div>

                </aside>
                <!--CONTENIDO CENTRAL -->

                <div id="central">


                </div>
            </div>

            <!-- PIE DE PAGINA-->
            <footer id="footer">


                <p>Desarrollado por andrestr93 &copy; <?= date('Y') ?></p>

            </footer>
        </div>
    </body>
</head>
</html>