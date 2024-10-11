<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
</head>

<body>

<?php
    // Definição dos arrays de frutas
    $fruit = array("apple", "banana", "cherry", "tomate", "eggplant", "fig", "guava", "hackberry", "icacina");
    $fruitLetter = array(
        'a' => "apple", 
        'b' => "banana", 
        'c' => "cherry", 
        'd' => "tomate", 
        'e' => "eggplant", 
        'f' => "fig", 
        'g' => "guava", 
        'h' => "hackberry", 
        'i' => "icacina"
    );
?>

<!-- Formulário para inserção de dados -->
<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
    <p>How will you search?</p>
    <label>
        Number
        <input type="radio" name="search_type" value="number" required="required">
    </label>
    <label>
        Text
        <input type="radio" name="search_type" value="text" required="required">
    </label>
    <p>What is your keyword?</p>
    <label>
        Number: 1 to 9<br/>
        Text : a to i<br/>
        <input type="text" name="keyword" maxlength="1" required />
    </label>
    <br /><br />
    <input type="submit" name="submit" value="Submit" />
</form>

<?php
if (isset($_POST['submit'])) {
    $searchType = $_POST['search_type']; // Tipo de busca (número ou texto)
    $keyword = $_POST['keyword']; // Palavra-chave

    // Verifica se a busca é por número
    if ($searchType == 'number') {
        if (is_numeric($keyword) && $keyword >= 1 && $keyword <= 9) {
            $index = $keyword - 1; // Ajuste para índice zero-based
            $result = $fruit[$index];
            echo "<p>Fruit found using number: <strong>$result</strong></p>";
        } else {
            echo "<p>Invalid number. Please enter a number between 1 and 9.</p>";
        }
    }
    // Verifica se a busca é por letra
    elseif ($searchType == 'text') {
        $letter = strtolower($keyword); // Converte a palavra-chave para minúsculas
        if (array_key_exists($letter, $fruitLetter)) {
            $result = $fruitLetter[$letter];
            echo "<p>Fruit found using text: <strong>$result</strong></p>";
        } else {
            echo "<p>Invalid letter. Please enter a letter between 'a' and 'i'.</p>";
        }
    }
}
?>

</body>

</html>