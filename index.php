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
    // Array dos heróis, quando um herói é digitado, o valor dele se transforma no caminho da imagem do mesmo
    $heroes = [
        "Marvel" => [
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
        ],
        "DC" => [
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
        ]
    ];

    // Caso não haja caminho, ou seja, não tenha o herói, nenhuma imagem é mostrada
    $imgSrc = "";
    $qntImgs = 0;

    // O método $_SERVER["REQUEST_METHOD"] == "POST" serve para conferir se o formulário já foi enviado usando o POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $universo = $_POST["universo"];
        $heroi = strtolower($_POST["heroi"]); // Deixando o nome dos heróis em minúsculo
        $qntImgs = $_POST["qntImgs"];

        // Caso um valor não tenha sido escrito, mostrará a mensagem de erro
        if (empty($universo) || empty($heroi) || empty($qntImgs) || $qntImgs <= 0) {
            $error = "Preencha todos os campos corretamente!";
        } elseif (!isset($heroes[$universo][$heroi])) {
            $error = "Herói não encontrado no universo $universo.";
        } else {
            $imgSrc = $heroes[$universo][$heroi]; //Atribui à variável o caminho da imagem, por meio do universo e do herói
        }
    }
    ?>
    <div class="container">
        <h2>Gerador de Imagens de Heróis</h2>

        <!-- Formulário -->
        <form method="post">
            <label>Universo:</label><br>
            <p>Marvel</p><input type="radio" name="universo" value="Marvel"><br>
            <p>DC</p><input type="radio" name="universo" value="DC"><br><br>

            <label>Herói:</label><br>
            <input type="text" name="heroi"><br><br>

            <label>Quantas imagens:</label><br>
            <input type="number" name="qntImgs"><br><br>

            <button type="submit">Gerar imagens</button> <!-- Botão utilizado para gerar as imagens -->

            <!-- window.location.href serve para definir o url da página atual, quando igualada a 'index.php', volta para a página inicial, onde nenhum valor foi colocado ainda, resetando-a -->
            <button type="reset" onclick="window.location.href='index.php'">Resetar</button>
        </form>

        <?php
        if (!empty($error)) {
            echo "<p>$error</p>";
        }

        //if com vetor para a geração das imagens e sua quantidade
        if (!empty($imgSrc) && $qntImgs > 0) {
            echo '<div class="images">';
            for ($i = 0; $i < $qntImgs; $i++) {
                echo "<img src='$imgSrc' alt='$heroi'>";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
