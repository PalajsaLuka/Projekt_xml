<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Glazba</title>
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
                background-color:#C4A7BB;
                padding-left:30px;
                padding-right:30px;
                display:flex;
                flex-wrap:nowrap;
                flex-direction: column;
                overflow: hidden;
                padding-top:30px;
                margin-left:50px;
                margin-right:50px;
                height:1000px;
                
            }
            table{
                border:1px solid;
                text-align:left;
                background-color: #F3CB96;
            }
            thead{
                height:30px;
                border:1px solid;
            }
            td{
                height:30px;
                border-bottom:1px solid;
            }
            a.move{
                margin-left:10px;
            }
            .moved{
                padding-left:10px;
            }

        </style>
    </head>

    <body>

        <?php 
            $glazba=json_decode(file_get_contents('popis.json'), true);
        ?>
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
        <div class="main">
            <table>
                <thead colspan="6">
                    <th class="moved" colspan="2">Ime</th>
                    <th class="moved" colspan="2">Autor</th>
                    <th class="moved" colspan="1">Godina</th>
                    <th class="moved" colspan="1"><a class="move"></a>Poslašajte</th>
                </thead>
                <tbody>
                    <?php foreach($glazba as $glazba){
                    ?>
                    <tr colspan="6">
                        <td class="moved" colspan="2"><?php echo $glazba['name']; ?></td>
                        <td class="moved" colspan="2"><?php echo $glazba['author']; ?></td>
                        <td class="moved" colspan="1"><?php echo $glazba['date']; ?></td>
                        <td class="moved" colspan="1"><input type="button" value="Play"> <a class="move"></a><input type="button" value="Download"></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </body>
</html> 