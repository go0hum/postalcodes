<?php
namespace App\Helper;

class Helper
{
    public static function import_csv($filename, $delimiter = ',')
    {
        if(!file_exists($filename) || !is_readable($filename))
        return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false){
          while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
            if(!$header)
              $header = array_map(function($rowData) {
                return preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $rowData);
              }, $row);
            else {
              if (!empty($row[0])) {
                $data[] = array_combine($header, $row);
              }
            }
           }
           fclose($handle);
        }
        return $data;
    }

    public static function mergeFile($file, $merge=false)
    {
      $folder = '/seeders/';
      $response = [];

      $file = public_path($folder.$file);
      $values = self::import_csv($file);

      if ($merge && !empty($merge)) {
        $response = array_merge($values, $merge);
      } else {
        $response = $values;
      }

      return $response;
    }

    public static function postalCode($number = false)
    {
        $records = [];

        if ($number == 1) {
          $aguascalientes = self::mergeFile("aguascalientes.csv");
          $bajacalifornia = self::mergeFile("bajacalifornia.csv", $aguascalientes);
          $bajacaliforniasur = self::mergeFile("bajacaliforniasur.csv", $bajacalifornia);
          $campeche = self::mergeFile("campeche.csv", $bajacaliforniasur);
          $coahuiladezaragoza = self::mergeFile("coahuiladezaragoza.csv", $campeche);
          $colima = self::mergeFile("colima.csv", $coahuiladezaragoza);
          $chiapas = self::mergeFile("chiapas.csv", $colima);
          $chihuahua = self::mergeFile("chihuahua.csv", $chiapas);
          $ciudaddemexico = self::mergeFile("ciudaddemexico.csv", $chihuahua);
          $records = self::mergeFile("durango.csv", $ciudaddemexico);
          return $records;
        }

        if ($number == 2) {
          $guanajuato = self::mergeFile("guanajuato.csv");
          $guerrero = self::mergeFile("guerrero.csv", $guanajuato);
          $hidalgo = self::mergeFile("hidalgo.csv", $guerrero);
          $records = self::mergeFile("jalisco.csv", $hidalgo);
          return $records;
        }

        if ($number == 3) {
          $mexico = self::mergeFile("mexico.csv");
          $michoacandeocampo = self::mergeFile("michoacandeocampo.csv", $mexico);
          $morelos = self::mergeFile("morelos.csv", $michoacandeocampo);
          $nayarit = self::mergeFile("nayarit.csv", $morelos);
          $nuevoleon = self::mergeFile("nuevoleon.csv", $nayarit);
          $records = self::mergeFile("oaxaca.csv", $nuevoleon);
          return $records;
        }

        if ($number == 4) {
          $puebla = self::mergeFile("puebla.csv");
          $queretaro = self::mergeFile("queretaro.csv", $puebla);
          $quintanaroo = self::mergeFile("quintanaroo.csv", $queretaro);
          $sanluispotosi = self::mergeFile("sanluispotosi.csv", $quintanaroo);
          $sinaloa = self::mergeFile("sinaloa.csv", $sanluispotosi);
          $records = self::mergeFile("sonora.csv", $sinaloa);
          return $records;
        }

        $tabasco = self::mergeFile("tabasco.csv");
        $tamaulipas = self::mergeFile("tamaulipas.csv", $tabasco);
        $veracruz = self::mergeFile("veracruz.csv", $tamaulipas);
        $yucatan = self::mergeFile("yucatan.csv", $veracruz);
        $records = self::mergeFile("zacatecas.csv", $yucatan);
        
        return $records;
    }
}