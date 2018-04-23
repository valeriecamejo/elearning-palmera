<?php

namespace App\PalmLib;
use App\Brand;
use Illuminate\Support\Facades\Auth;
class SettingVariables {

  public static $settings = null;

  /**
   * @return object
   */
  static function retrieveSettingsDB() {
    if (self::$settings == null) {
      if (!Auth::guest()) {
        self::$settings = Brand::find(Auth::user()->brand_id);
      }
    }
  }

  /**
   * @param string $setting_required
   * @return string
   */
  public static function getSettings($setting_required) {
    self::retrieveSettingsDB();
    $return   = null;
    if (!Auth::guest()) {
      $return   = self::$settings->$setting_required;
    }
    return $return;
  }
}
//Forma de hacer uso de las variables de configuracion
//  {{ \App\PalmLib\SettingVariables::getSettings('navbar_color') }}
