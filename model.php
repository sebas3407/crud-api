<?php
date_default_timezone_set('Europe/Madrid');
header("Content-Type: text/html;charset=ansi");
include_once("php/accesbd.php");

function obtenir_inicialitzacions_bd(&$servidor, &$usuari, &$contrasenya, &$bd)
{
    $servidor    = "localhost";
    $usuari      = "root";
    $contrasenya = "usbw";
    $bd          = "buyme";
}

function num_files($res)
{
  $quants = 0;
  if (isset($res) && $res != null)
    {
      $quants = mysqli_num_fields($res);
    }
  return ($quants);
}

function gamelist()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}


function game_switch()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE platform = 'Switch' limit 0 , 5";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php?name='.$fila[1].'" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'€</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}

function game_ps4()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE platform = 'playstation' limit 0 ,5";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php?name='.$fila[1].'" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'€</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}

function game_xbox1()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE platform = 'xbox' limit 0 , 5";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php?name='.$fila[1].'" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'€</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
  }


  //-----------------------------------

  function games_switch_all()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE platform = 'Switch'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php?name='.$fila[1].'" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'€</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}

  function ps4_switch_all()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE platform = 'playstation'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php?name='.$fila[1].'" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'€</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}

function xbox1_switch_all()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE platform = 'xbox'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<div class="col-md-3 filter TODOS NINTENDO shadowB">
                        <a href="game.php?name='.$fila[1].'" class="custom-card">
                        <div class="card" style="border: none;">
                        <img class="card-img-top" src="'.$fila[6].'" alt="Card image cap">
                        <p class="nameGame">'.$fila[1].'</p>
                        <p class="points">+'.$fila[4].' PUNTOS DE COMPRA</p>
                        <p class="precio">'.$fila[5].'€</p>
                        </div>
                        </a>
                      </div>';
                //echo "<p class='ofertas_esta'>OFERTAS EN TOTAL : ".$fila[0]."</p>";
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}

function game_info()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);
    $name = $_GET['name'];

    if ($connexio)
      {
        $instruccio = "SELECT * FROM game WHERE name = '".$name."'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '  <div class="col-md-6">
                          <img src="'.$fila[6].'" alt="Card image cap" width="50%;">
                        </div>
                        <div class="col-md-6">
                          <p class="nameGame_page">'.$fila[1].'</p>
                          <p class="desc_page">'.$fila[3].'</p>

                          <p class="precio_page">'.$fila[5].'€</p>
                          <p class="points_page">'.$fila[4].' PUNTOS DE COMPRA</p>
                          <input type="button" class="button" value="COMPRAR">
                        </div>';
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}
//------------------------------------------------------

function perfil_datos()
{
    $res = false;
    obtenir_inicialitzacions_bd($servidor, $usuari, $contrasenya, $bd);
    $connexio = connectar_BD($servidor, $usuari, $contrasenya, $bd);


    $mail = $_SESSION['email'];
    $dinero = 0;
    $euro = 1;
    if ($connexio)
      {
        $instruccio = "SELECT * FROM user where email ='".$mail."'";

        $consulta   = consulta_multiple($connexio, $instruccio);
        $fila = obtenir_fila($consulta);
        
        while ($fila)
              {
                echo '<p class="name_perfil">'.$fila[2].' '.$fila[3].'</p>
                      <p class="mail_perfil">'.$fila[0].'</p>
                      <p class="points_perfil">'.$fila[4].' PUNTOS DE COMPRA = '.$dinero.'€</p>';
                $fila = obtenir_fila($consulta);
              }
          
        
        tancar_consulta_multiple($consulta);
      }
    desconnectar_bd($connexio);
    return ($res);
}