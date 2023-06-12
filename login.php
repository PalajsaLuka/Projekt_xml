<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Login</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                margin:0px;
            }
            .header-flex{
                display:flex;
            }
            .shrink.no-shrink{
                flex-shrink: 0;
            }
            .header{

                overflow:hidden;
                margin:0px;
                padding:0px;
                height:36px;
                background-color:#F891A6;
                
            }
            .navbar{
                margin-left:50px;
                position:relative;
                top:25%;
                height:26px;
                float:left;
                text-align: center;
                
            }
            .navbar2{
                margin-right:100px;
                float:right;
                text-align: center;
                height:26px;
                position:relative;
                top:25%;
            }
            .header a{
                margin:0px; 
                text-decoration: none;
                color:black;
                font-size:18px;
            }
            .main{
                background-color: #C4A7BB;
                display:flex;
                flex-wrap:wrap;
                flex-direction: column;
                text-align:center;
                align-items: center;
                overflow: hidden;
                margin-left:50px;
                margin-right:50px;
                height:1000px;   
            }
            .forma{
                margin-top:50px;
            }
            input[type=text]{
                width:250px;
                margin-top:5px;
                margin-bottom:10px;
            }
            input[type=password]{
                width:250px;
                margin-top:5px;
            }
            input[type=submit]{
                margin-top:10px;
                width:100px;
                font-size:18px;
            }
            p.output{
                position:relative;
                margin:0px;
                height:0px;
                top:210px;
                width:100%;
                text-align:center;
            }

        </style>
    </head>

    <body>
        <div class="header">
                <div class="navbar"><a href="index.html">JoyMusic</a></div>
                <div class="navbar"> <a href="index.html">Home</a> <!--glavna stranica sa par reklama--></div>
                <div class="navbar"><a href="popularno.html">Popularno</a> <!--trenutna popularna glazba, po 4 u redu--></div>
                <div class="navbar"><a href="glazba.php">Popis glazba</a> <!--ucitana tablica sa json--></div>
                <div class="navbar"><a href="shop.html">Web-shop</a> <!--web shop--></div>
                <div class="navbar"><a href="nama.html">O nama</a> <!--popis za kontakt + karta --></div>
                <div class="navbar"><a href="kontakt.html">Kontakt</a> <!--popis za kontakt + karta --></div>
                <div class="navbar2"><a href="login.php">Login</a>  <!--provjera sa tablicom xml-a za korisnika--></div>
        </div>

        <?php
        $ime="";
        $og=0;
        $lozinka="";
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $ans=$_POST;
            if(empty($ans['ime'])){
                echo "<p class='output'>Ime nije uneseno.</p>";
            }
            else if (empty($ans["lozinka"])){
                echo "<p class='output'>Lozinka nije unesena.</p>";
            }
            else{
                $ime=$ans['ime'];
                $lozinka=$ans['lozinka'];
                provjera($ime, $lozinka);
            }
        }
        function provjera($ime, $lozinka){
            $xml=simplexml_load_file("korisnici.xml");

            foreach($xml->korisnik as $korisnik){
                $kusername=$korisnik->username;
                $klozinka=$korisnik->password;
                if($kusername==$ime){
                    if($klozinka==$lozinka){
                        echo "<p class='output'>Prijavljeni ste kao $kusername.</p>";
                        return;
                    }
                    else{
                        echo "<p class='output'>Kriva lozinka.</p>";
                        return;
                    }
            
                }
            }
            echo "<p class='output'>Korisnik ne postoji.</p>";
            return;
        }

        ?>

        <div class="main">
        <form method="post" action="login.php">
        <div class="forma">
            <label for="ime">Korisničko ime:</label><br>
            <input type="text" name="ime"><br>
            <label for="lozinka">Lozinka:</label><br>
            <input type="password" name="lozinka"><br>
        </div>
            <input type="submit" name="Login" value="Login">
        </form>
        </div>


    </body>
</html>