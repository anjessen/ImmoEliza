<?php if(isset($_POST)) { 
    $adresse = $_POST['adresse'];
    $type_of_property = $_POST['property'];
    $number_of_rooms = $_POST['rooms'];
    $garden = $_POST['garden'];
    $garden_area = $_POST['garden-area'];
    $open_fire = $_POST['open-fire'];
    $surface = $_POST['surface'];
    $room = $_POST['rooms'];
    $terrace = $_POST['terrace'];
    $terrace_area = $_POST['terrace-area'];
    $state_of_building = $_POST['state'];
    $construction_year = $_POST['construction_year'];
    $swimming_pool = $_POST['swimming-pool'];
    $equiped_kitchen = $_POST['equiped-kitchen'];

    $data = array(
        'adresse' => [$adresse],
        'type-of-property' => [$type_of_property],
        'number-of-rooms' => [$number_of_rooms],
        'garden' => [$garden],
        'garden-area' => [$garden_area],
        'open-fire' => [$open_fire],
        'surface' => [$surface],
        'room' => [$room],
        'terrace' => [$terrace],
        'terrace-area' => [$terrace_area],
        'state-of-building' =>[$state_of_building],
        'construction_year' => [$construction_year],
        'swimming-pool' => [$swimming_pool],
        'equiped-kitchen' => [$equiped_kitchen],
    );
    if ($terrace == 'no')
    {
        unset($data['terrace-area']);
    }
    if ($garden == 'no')
    {
        unset($data['garden-area']);
    }
    echo '<pre>';
    print_r($data);
    echo'</pre>';
    //exit;
    } 
    ?>