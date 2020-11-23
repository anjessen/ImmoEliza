<?php
//imports


//Classes

class Request{
    private $adress;
    private $property;

    /**
     * Expected parameters
     * @param Adress $adress object build with class Adress
     * @param Property $property object build with class Property
     */
    public function __construct(
        Adress $adress,
        Property $property
        ){
        try{
            $this->adress = $adress;
            $this->property = $property;
        }catch(Exception $err){
            throw $err;
        }   
    }
    public function get3dObject(){
        ;
    }
    public function getPrediction(){
        ;
    }
}

class Adress{
    private
    $num,
    $road,
    $pc,
    $locality;

    /**
     * Expected parameters
     * @param mixed $num of the house, is a int in int/string format
     * @param string $road is a string (road name only)
     * @param mixed $pc (postal code) is a int in int/string format
     * @param string $locality (city) is a string
     */
    public function __construct(
        $num,
        string $road,
        $pc,
        string $locality
        ){
        try{
            $this->num = intval($num);
            $this->road = trim(strtolower($road));
            $this->pc = intval($pc);
            $this->locality = trim(strtolower($locality));

        }catch(Exception $err){
            throw $err;
        }
    } 
}

class Property{
    private
    // enum
    $type_of_property = ["House","Appartement"],
    $type_of_state_of_building = ["to be done up" , "as new" , "good" , "to restore" , "just renovated"],

    // data
    $type,
    $number_of_rooms,
    $house_area,
    $garden_area,
    $terrace_area,
    $open_fire,
    $land_surface,
    $number_of_facades,
    $swimming_pool,
    $state_of_building,
    $construct_year,
    $fully_equiped_kitchen;


    /**
     * Expected parameters
     * @param string $type is string: "House" or "Appartement"
     * @param mixed $numberOfRooms is numerical in string/int format
     * @param mixed $houseArea is a float in string/int/float format
     * @param mixed $gardenArea (OPTIONAL) is a float in string/int/float format
     * @param mixed $terraceArea (OPTIONAL) is a float in string/int/float format
     * @param mixed $openFire (OPTIONAL) is a bool in string/int/bool format
     * @param mixed $landSurface (OPTIONAL) is a float in string/int/float format
     * @param mixed $numberOfFacades (OPTIONAL) is a int in string/int format
     * @param mixed $swimmingPool (OPTIONAL) is a bool in string/int/bool format
     * @param string $stateOfBuilding (OPTIONAL) is string: "to be done up" , "as new" , "good" , "to restore" , "just renovated"
     * @param mixed $constructionYear (OPTIONAL) is a int in string/int format
     * @param mixed $fullyEquipedKitchen (OPTIONAL) is a bool in string/int/bool format
     */
    public function __construct(
        string $type,
        $numberOfRooms,
        $houseArea,
        $gardenArea = null,
        $terraceArea = null,
        $openFire = null,
        $landSurface = null,
        $numberOfFacades = null,
        $swimmingPool = null,
        ?string $stateOfBuilding = null,
        $constructionYear = null,
        $fullyEquipedKitchen = null
        ){
            try{
                $type = trim(ucfirst(strtolower($type)));
                $stateOfBuilding = trim(strtolower($stateOfBuilding));

                $this->type = $this->type_of_property[array_search($type,$this->type_of_property)];
                $this->number_of_rooms = intval($numberOfRooms);
                $this->house_area = floatval($houseArea);
                $this->garden_area = floatval($gardenArea);
                $this->terrace_area = floatval($terraceArea);
                $this->open_fire = boolval($openFire);
                $this->land_surface = floatval($landSurface);
                $this->number_of_facades = intval($numberOfFacades);
                $this->swimming_pool = boolval($swimmingPool);
                $this->state_of_building = $this->type_of_state_of_building[array_search($stateOfBuilding,$this->type_of_state_of_building)];
                $this->construct_year = intval($constructionYear);
                $this->fully_equiped_kitchen = boolval($fullyEquipedKitchen);

        }catch(Exception $err){
            throw $err;
        }
    }
}


//Tests
try{
    $prop = new Property("house", 6, "120.5");
}catch(Exception $err){
    error_log($err, 0);
}

try{
    $adress = new Adress(10,'rue de louvain',1420,'Trou perdu');
}catch(Exception $err){
    error_log($err, 0);
}

try{
    $req = new Request($adress,$prop);
}catch(Exception $err){
    error_log($err, 0);
}


?>