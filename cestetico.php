<?php
    require_once "module.php";
    $conexao = conectar();
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Centro Estético Penélope</title>
    </head>
    
    <body>
        <style>
                header{
                    background-image: url(Imagens/Barbearia/pexels-photo-529922.jpeg);
                    background-size: cover;
                    font-family: lobster;
                }
            </style>
        
        <script src="js/jquery.js"></script>
        
            <script>
            $(document).ready(function(){
                $(".categoria li").not($('.categoria li a')).click(function (e) {
                $('ul.subcategoria').not( $(this).children() ).slideUp();
                $(this).children("ul.subcategoria").slideToggle();
                e.stopPropagation()
                });
                
                $('.logo-mobile').click(function(){
                    $('.menu-mobile').fadeIn(1000);
                });
                
                $('.menu-mobile li').not($('.menu-mobile li a')).click(function(e){
                $('ul.submenu-mobile').not($(this).children()).slideUp();
                $(this).children('ul.submenu-mobile').slideToggle();
                e.stopPropagation()
                });
            })
        </script>
        
        <div class="back">
            <nav>
                <?php
                    include "menumobile.html";
                ?>
                
                <div class="logo">
                    <img src="Imagens/Home/hairdresser-chairwhite.png" alt="logo">
                </div>

                <div class="nav-left">
                    <ul class="menu">
                        <li><a class="sub-a" href="index.php">Home</a></li>
                        <li>Produtos
                            <ul class="submenu">
                                <li><a class="sub-a" href="produtomes.php">Produto do Mês</a></li>
                                <li><a class="sub-a" href="promocao.php">Promoções</a></li>
                            </ul>
                        </li>
                        <li>Sobre
                            <ul class="submenu">
                                <li><a class="sub-a" href="barbearia.php">Cachorro Loko</a></li>
                                <li><a class="sub-a" href="cestetico.php">Centro Estético</a></li>
                                <li><a class="sub-a" href="sobre.php">Projeto</a></li>
                                <li><a class="sub-a" href="lojas.php">Lojas</a></li>
                            </ul>
                        </li>
                        <li>Contato
                            <ul class="submenu">
                                <li><a class="sub-a" href="faleconosco.php">Fale Conosco</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="nav-right">
                    <article>
                        <p>Usuário: </p>
                        <p>Senha: </p>
                    </article>
                    
                    <form>
                        <input type="text" name="txtusuario">
                        <input type="password" name="txtpassword">
                    </form>
                </div>
            </nav>
        </div>
        
        <div class="front">
            <header>
                <div class="overlay">
                    <h1>Penélope</h1>
                    <div class="border"></div>
                </div>
            </header>
            
            <div class="content">
                <?php
                    $sql = 'select * from tbl_sobre_penelope where idSessao = 1 and status = 1';
                    $resultado = mysqli_query($conexao, $sql);

                    while($rsPenelope = mysqli_fetch_array($resultado)){
                ?>
                <section class="penelope-servicos">
                    <div class="penelope-servicos-item">
                        <div class="penelope-servicos-image">
                            <img src="cms/<?php echo($rsPenelope['imagem']) ?>" alt="unhas">
                        </div>
                        
                        <article>
                            <h1><?php echo(utf8_encode($rsPenelope['titulo'])) ?></h1>
                            
                            <p><?php echo(utf8_encode($rsPenelope['descricao']))?></p>
                        </article>
                    </div>
                <?php } ?>
                    
                </section>
                
                <section class="penelope-atracoes">
                    <h1 class="atr-title">ATRAÇÕES</h1>
                
                <?php
                    $sql = 'select * from tbl_sobre_penelope where idSessao = 2 and status = 1';
                    $resultado = mysqli_query($conexao, $sql);

                    while($rsPenelope = mysqli_fetch_array($resultado)){
                ?>
                    <div class="penelope-atracoes-item">
                        <div class="atracoes-col1">
                            <div class="atracoes-image">
                                <img src="cms/<?php echo(utf8_encode($rsPenelope['imagem']) ?>" alt="música">
                            </div>
                        </div>

                        <div class="atracoes-col2">
                            <article>
                                <h1><?php echo(utf8_encode($rsPenelope['titulo'])) ?></h1>
                                
                                <p><?php echo(utf8_encode($rsPenelope['descricao'])) ?></p>
                            </article>
                        </div>
                    </div>
                <?php } ?>
                </section>
            </div>
            
            <footer>
                <div class="footer-item">
                    <img src="Imagens/Home/hairdresser-chairwhite.png" alt="logo">
                </div>

                <div class="footer-item">
                    <article>
                        <a href="#">O Projeto</a><br>
                        <a href="#">Barbearia</a><br>
                        <a href="#">Centro Estético</a><br>
                    </article>
                </div>

                <div class="footer-item">
                    <article>
                        <a href="#">Produto do Mês</a><br>
                        <a href="#">Promoções</a><br>
                    </article>
                </div>

                <div class="footer-item">
                    <article>
                        <a href="#">Fale Conosco</a>
                    </article>
                </div>
                
                <div class="footer-redes">
                    <img src="Imagens/Home/instagram.png" alt="instagram">
                    <img src="Imagens/Home/facebook-logo-in-circular-button-outlined-social-symbol.png" alt="facebook">
                    <img src="Imagens/Home/twitter-circular-button.png" alt="twitter">
                    <img src="Imagens/Home/google-plus-circular-button.png" alt="google plus">
                    <img src="Imagens/Home/social-youtube-circular-button.png" alt="youtube">
                </div>
            </footer>
        </div>
    </body>
</html>