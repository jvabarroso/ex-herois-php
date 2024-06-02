<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Heróis</title>
</head>
<body>
    <?php
    $marvelHeroes = array(
        "thor" => "imgs/Marvel/thor.jpg",
        "homem de ferro" => "imgs/Marvel/IronMan.jpg",
        "hulk" => "imgs/Marvel/hulk.jpg",
        "viuva negra" => "imgs/Marvel/viuva-negra.jpg",
        "doutor estranho" => "imgs/Marvel/doutor-estranho.jpg",
        "homem aranha" => "imgs/Marvel/SpiderMan.jpg",
        "spiderman" => "imgs/Marvel/SpiderMan.jpg",
        "fenix" => "imgs/Marvel/fenix.jpg",
        "feiticeira escarlate" => "imgs/Marvel/feiticeira-escarlate.jpg",
        "pantera negra" => "imgs/Marvel/pantera-negra.jpg"
    );

    $dcHeroes = array(
        "batman" => "imgs/DC/batman.jpg",
        "superman" => "imgs/DC/SuperMan.jpg",
        "arqueiro verde" => "imgs/DC/arqueiro-verde.jpg",
        "flash" => "imgs/DC/flash.jpg",
        "mulher maravilha" => "imgs/DC/mulher-maravilha.jpg",
        "aquaman" => "imgs/DC/aquaman.jpg",
        "lanterna verde" => "imgs/DC/lanterna-verde.jpg",
        "shazam" => "imgs/DC/shazam.jpg",
        "cyborg" => "imgs/DC/cyborg.jpg",
        "marciano" => "imgs/DC/martian.jpg"
    );
    ?>
    <div class="container">
        <h2>Gerador de Imagens de Heróis</h2>
        <form method="post">
            <label>Qual universo você deseja?</label><br>
            <input type="radio" name="universo" value="DC">DC
            <input type="radio" name="universo" value="Marvel">Marvel<br><br>

            <label>Qual herói você deseja ver as fotos?</label><br>
            <input type="text" name="heroi"><br><br>

            <label>Quantas imagens desse herói deseja ver?</label><br>
            <input type="number" name="qntImgs"><br><br>

            <button type="submit">Gerar imagens</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $universo = $_POST["universo"];
            $heroi = strtolower($_POST["heroi"]);
            $qntImgs = $_POST["qntImgs"];

            if ($universo == "Marvel") {
                $heroesArray = $marvelHeroes;
            } elseif ($universo == "DC") {
                $heroesArray = $dcHeroes;
            } else {
                $heroesArray = [];
            }

            if (array_key_exists($heroi, $heroesArray)) {
                echo '<div class="images">';
                $imgSrc = $heroesArray[$heroi];
                for ($i = 0; $i < $qntImgs; $i++) {
                    echo "<img src='$imgSrc' alt='$heroi'>";
                }
                echo '</div>';
            } else {
                echo "<p>Herói não encontrado no universo $universo.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
