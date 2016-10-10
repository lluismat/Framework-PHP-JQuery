<?php

function validate_products($value){
        $error = array();
        $valido = true;
        $filtro = array(

        'cod_prod' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[1-9]{2,10}$/')
        ),

        'name_prod' => array(

            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[A-Za-z0-9]{2,30}$/')
            ),

        'description' => array(

                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => array('regexp' => '/^[A-Za-zñÑ\s]{2,250}$/')
              ),

        'price' => array(

            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[0-9]+([,][0-9]+)?$/')
            ),
        'date' => array(

            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/')

            ),
        'date_c' => array(

            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/')

            ),
        );

    $resultado = filter_var_array($value, $filtro);

     //no filter
    $resultado['ciudad'] = $value['ciudad'];
    $resultado['pais'] = $value['pais'];
    $resultado['comunidad'] = $value['comunidad'];
    $resultado['categoria'] = $value['categoria'];
    $resultado['color'] = $value['color'];


    if ($resultado['date']) {
        //validate to user's over 16
        $dates = validateEnterDate($resultado['date']);

        if (!$dates) {
            $error['date'] = 'The Enter date must be have after than current day';
            $valido = false;
        }
    }

    if ($resultado['date'] && $resultado['date_c']) {


        $dates = validate_dates($resultado['date'],$resultado['date_c']);

        if (!$dates) {
            $error['date_c'] = 'Expiration date must be after that entry date';
            $valido = false;
        }
    }


    if ($resultado['ciudad'] === 'Select city') {
        $error['ciudad'] = "You haven't select any city.";
        $valido = false;
    }

    if ($resultado['pais'] === 'Select country') {
        $error['pais'] = "You haven't select any country.";
        $valido = false;
    }

    if ($resultado['comunidad'] === 'Select community') {
        $error['comunidad'] = "You haven't select any autonomus community.";
        $valido = false;
    }
    if ($resultado['color']==='') {
        $error['color'] = "You haven't select any color.";
        $valido = false;
    }
    if (count($resultado['categoria']) <= 0) {
        $error['categoria'] = "Select 1 or more.";
        $valido =  false;
    }

    if ($resultado != null && $resultado) {


        if (!$resultado['cod_prod']) {
            $error['cod_prod'] = 'Name must be 4 to 10 numbers';
            $valido = false;
        }

        if (!$resultado['name_prod']) {
            $error['name_prod'] = 'Name must be 2 to 30 characters';
            $valido = false;
        }

        if (!$resultado['description']) {
            $error['description'] = 'Name must be 2 to 250 letters';
            $valido = false;
        }

        if (!$resultado['price']) {
            $error['price'] = 'Price must be 1 or more numbers';
            $valido = false;
        }

        if (!$resultado['date']) {
            if ($resultado['date'] == "") {
                $error['date'] = "this camp can't empty";
                $valido = false;
            } else {
                $error['date'] = 'error format date (dd/mm/yyyy)';
                $valido = false;
            }
        }

        if (!$resultado['date_c']) {
            if ($resultado['date_c'] == "") {
                $error['date_c'] = "this camp can't empty";
                $valido = false;
            } else {
                $error['date_c'] = 'error format date (dd/mm/yyyy)';
                $valido = false;
            }
        }

    } else {
        $valido = false;
    };
    return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $resultado);

}

function validate_dates($enterDate, $expirationDate) {
  $day1=substr($enterDate,0,2);
  $month1=substr($enterDate,3,2);
  $year1=substr($enterDate,6,4);
  $day2=substr($expirationDate,0,2);
  $month2=substr($expirationDate,3,2);
  $year2=substr($expirationDate,6,4);

  if(strtotime($day1 . "-" . $month1 . "-" .$year1)<=strtotime($year2 . "-" . $month2 . "-" .$day2)){
    return true;
  }
return false;
}

function validateEnterDate($enterdate) {

$hoy=date("d/m/Y");

    if ($enterdate>$hoy) {
        return false;
    }

    return true;
}
