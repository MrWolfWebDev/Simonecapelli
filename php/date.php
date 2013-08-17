<?php

  function data_it($data)
{
  // Creo una array dividendo la data YYYY-MM-DD sulla base del trattino
  $array = explode("-", $data); 

  // Riorganizzo gli elementi in stile DD/MM/YYYY
  $data_it = $array[2].".".$array[1].".".$array[0]; 

  // Restituisco il valore della data in formato italiano
  return $data_it; 
}

?>