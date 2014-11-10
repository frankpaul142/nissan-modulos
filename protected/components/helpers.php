<?php
     function time2str($date)
    {
//        $original_date = $date;
//        $param_date = new DateTime($date);
//        $dsadasd = date("j, n, Y", strtotime($date));
//        $date = getdate(strtotime($date));
//        return $date['mday'].'/'.$date['mon'].'/'.substr($date['year'], 2, 2).' a la(s): '.substr($original_date, -8,5);
        $dia="";
        $mes="";
          switch (date("l", strtotime($date))) {
            case "Monday":
                $dia="Lunes";
                break;
            case "Tuesday":
                $dia="Martes";
                break;
            case "Wednesday":
                $dia="Miércoles";
                break;
            case "Thursday":
                $dia="Jueves";
                break;
            case "Friday":
                $dia="Viernes";
                break;
            case "Saturday":
                $dia="Sábado";
                break;
            case "Sunday":
                $dia="Domingo";
                break;
        }
        switch (date("F", strtotime($date))) {
            case "January":
                $mes="Enero";
                break;
            case "February":
                $mes="Febrero";
                break;
            case "March":
                $mes="Marzo";
                break;
            case "April":
                $mes="Abril";
                break;
            case "May":
                $mes="Mayo";
                break;
            case "June":
                $mes="Junio";
                break;
            case "July":
                $mes="Julio";
                break;
            case "August":
                $mes="Agosto";
                break;
            case "September":
                $mes="Septiembre";
                break;
            case "October":
                $mes="Octubre";
                break;
            case "November":
                $mes="Noviembre";
                break;
            case "December":
                $mes="Diciembre";
                break;
        }
        return date("d", strtotime($date)).' de '.$mes.' del '.date("Y", strtotime($date));
    }
     function time2str2($date,$para)
    {
//        $original_date = $date;
//        $param_date = new DateTime($date);
//        $dsadasd = date("j, n, Y", strtotime($date));
//        $date = getdate(strtotime($date));
//        return $date['mday'].'/'.$date['mon'].'/'.substr($date['year'], 2, 2).' a la(s): '.substr($original_date, -8,5);
        $dia="";
        $mes="";
          switch (date("l", strtotime($date))) {
            case "Monday":
                $dia="Lunes";
                break;
            case "Tuesday":
                $dia="Martes";
                break;
            case "Wednesday":
                $dia="Miércoles";
                break;
            case "Thursday":
                $dia="Jueves";
                break;
            case "Friday":
                $dia="Viernes";
                break;
            case "Saturday":
                $dia="Sábado";
                break;
            case "Sunday":
                $dia="Domingo";
                break;
        }
        switch (date("F", strtotime($date))) {
            case "January":
                $mes="Enero";
                break;
            case "February":
                $mes="Febrero";
                break;
            case "March":
                $mes="Marzo";
                break;
            case "April":
                $mes="Abril";
                break;
            case "May":
                $mes="Mayo";
                break;
            case "June":
                $mes="Junio";
                break;
            case "July":
                $mes="Julio";
                break;
            case "August":
                $mes="Agosto";
                break;
            case "September":
                $mes="Septiembre";
                break;
            case "October":
                $mes="Octubre";
                break;
            case "November":
                $mes="Noviembre";
                break;
            case "December":
                $mes="Diciembre";
                break;
        }
        if($para==0)
        return date("d", strtotime($date)).'-'.$mes.'-'.date("Y", strtotime($date));
        else
        {
            if($para==1)
                return date("H", strtotime($date)).'h'.date("i", strtotime($date));
        }
    }
        
    function build_sorter($clave,$clave2) {
    return function ($a, $b) use ($clave,$clave2) {
       if($a[$clave]==$b[$clave]){
   
        return $a[$clave2] < $b[$clave2]?1:-1;   
           
       } 
    return $a[$clave] < $b[$clave]?1:-1;
    };
}
    
function str_min($text,$n){
    
    return (strlen($text) > $n) ? substr($text, 0, $n).'...'  : $text;
  
}

function img_facebook($img){
    
  $z=  substr($img,0,4);
  if($z=='http'){
      return '1';
  }
  else{
      return '0'; 
  }
    
}
    
?>
