<?php
namespace ImmoEliza;

if(isset($_POST['inputAddress'],$_POST['inputAddress2'],$_POST['inputCityPC'],$_POST['inputCity'],$_POST['Type_of_property'],$_POST['rooms'],$_POST['House_area'])){
    $adress_road = $_POST['inputAddress'];
    $adress_number = $_POST['inputAddress2'];
    $adress_city_pc = $_POST['inputCityPC'];
    $adress_city = $_POST['inputCity'];
    $type_of_property = $_POST['Type_of_property'];
    $number_of_rooms = $_POST['rooms'];
    $garden = $_POST['garden'];
    $garden_area = $_POST['garden-area'];
    $open_fire = $_POST['open-fire'];
    $house_area = $_POST['House_area'];
    $land_area = $_POST['surface'];
    $facades = $_POST['facades'];
    $terrace = $_POST['terrace'];
    $terrace_area = $_POST['terrace-area'];
    $state_of_building = $_POST['State_of_building'];
    $construction_year = $_POST['construction_year'];
    $swimming_pool = $_POST['swimming-pool'];
    $equiped_kitchen = $_POST['equiped-kitchen'];

    /* $data = array(
        'adress_road' => $adress_road,
        'adress_number' => $adress_number,
        'adresse_city_pc' => $adress_city_pc,
        'adress_city' => $adress_city,
        'type_of_property' => $type_of_property,
        'number_of_rooms' => $number_of_rooms,
        'garden' => $garden,
        'garden_area' => $garden_area,
        'open_fire' => $open_fire,
        'house_area' => $house_area,
        'land_area' => $land_area,
        'facades' => $facades,
        'terrace' => $terrace,
        'terrace-area' => $terrace_area,
        'state-of-building' =>$state_of_building,
        'construction_year' => $construction_year,
        'swimming-pool' => $swimming_pool,
        'equiped-kitchen' => $equiped_kitchen,
    ); */

    $adress = new Adress($adress_number,$adress_road,$adress_city_pc,$adress_city);
    $property = new Property(
        $type_of_property,
        $number_of_rooms,
        $house_area,
        $garden_area,
        $terrace_area,
        $open_fire,
        $land_area,
        $facades,
        $swimming_pool,
        $state_of_building,
        $construction_year,
        $equiped_kitchen
    );
    $req = new Request($adress,$property);

    // test return
    echo '<pre>';
    print_r($adress);
    echo'</pre><br><br>';

    echo '<pre>';
    print_r($property);
    echo'</pre><br><br>';

    echo '<pre>';
    print_r($req);
    echo'</pre><br><br>';
}

    //exit;
    ?>