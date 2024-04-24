<?php

function getCSS()
{
    $jsonStr = file_get_contents("data/datas.json");
    $data = json_decode($jsonStr, true);
    $stranka = basename($_SERVER['REQUEST_URI']);
    echo $stranka;
    $stranka = explode(".", $stranka)[0];
    
    if (isset($data['stranky'][$stranka])) {
        $suboryCSS = $data['stranky'][$stranka];
        
        if (is_array($suboryCSS)) {
            foreach ($suboryCSS as $subor) {
                echo "<link rel='stylesheet' href='$subor'>";
            }
        } 
    }
}
function getMenuData(string $type): array{
    $menu = [];
    if(validateMenuType($type)) {
        if($type === "header") {
            $menu = [
                'home' => [
                    'name' => 'Domov',
                    'path' => 'index.php',
                ],
                'overwatch' => [
                    'name' => 'Overwatch',
                    'path' => 'overwatch.php',
                ],
                'wow' => [
                    'name' => 'World of Warcraft',
                    'path' => 'wow.php',
                ],
                'kontakt' => [
                    'name' => 'Kontakt',
                    'path' => 'kontakt.php',
                ]
            ];
        }
    }
    return $menu;
}
function printMenu(array $menu){
    foreach ($menu as $menuName => $menuData) {
        echo '<li><a href="'.$menuData['path'].'">'.$menuData['name'].'</a></li>';
    }
}
function validateMenuType(string $type): bool
{
    $menuTypes = [
        'header',
        'footer'
    ];
    if(in_array($type, $menuTypes)) {
        return true;
    } else {
        return false;
    }
}
?>