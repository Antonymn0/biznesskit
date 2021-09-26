<?php

namespace App\Helpers;

use App\Models\User;

class Utilities
{
    /**
    *Format phone numbers to country code first
    *@param number,string $phone $prefix
    *@return string $phone
    **/
    public static function cleanPhoneNumber( $phone, $prefix = '254' )
    {
      $phone = strval( $phone );
      $prefix = strval( $prefix );

      $phone = str_replace( '+', '', $phone );
      $firstDigit = substr( $phone, 0, 1 );
      if( $firstDigit !== '0' )
        return $phone;
        
      $clean_phone =preg_replace('/^0/','',$phone);
      return $prefix. $clean_phone;
    }

    public static function convertSlugToString( $slug )
    {
      return $slug ? ucfirst(str_replace("-"," ",$slug)) : null;
    }

    public static function createNamesFromFullName( $validated = [] )
    {
      $names = isset( $validated['full_name'] ) ? explode(" ",$validated['full_name']) : null;
      $validated['first_name'] = isset($names[0]) ? $names[0] : 'user';
      $validated['middle_name'] = isset($names[1]) ? $names[1] : null;
      $validated['last_name'] = isset($names[2]) ? $names[2] : null;
      return $validated;
    }

    public static function suggestUsername( $username )
    {
      $suggestions = [];

      while ( count($suggestions) < 3 )
      {
        $randomNum = rand(10,1000);
        $user = User::where('username',$username.$randomNum )->first();
        if( !$user )
          $suggestions [] = $username.$randomNum;
      }

      return $suggestions;

    }
}
