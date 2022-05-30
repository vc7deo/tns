<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\helpers;

/**
 * Url provides a set of static methods for managing URLs.
 *
 * For more details and usage information on Url, see the [guide article on url helpers](guide:helper-url).
 *
 * @author Alexander Makarov <sam@rmcreative.ru>
 * @since 2.0
 */
class Cms extends \yii\helpers\BaseStringHelper
{
    public static function clean($string) {
       $string = str_replace(' ', '-', $string); 
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); 
    }
    public static function filter($string) {
      return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); 
   } 
	public static function timeago($timestamp) {
        
        $strTime = array("second", "minute", "hour", "day", "month", "year");
        $length = array("60","60","24","30","12","10");
 
        $currentTime = time();
        if($currentTime >= $timestamp) {
             $diff     = time()- $timestamp;
             for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
             $diff = $diff / $length[$i];
             }
 
             $diff = round($diff);
             return $diff . " " . $strTime[$i] . "(s) ago ";
        }
     }
     public static function range( $lower = 0, $upper = 24, $step = 60, $format = '' ) {
      $step = $step*60;
      $times = array();
  
      if ( empty( $format ) ) {
          $format = 'h:i A';
      }
  
      foreach ( range( $lower, $upper, $step ) as $increment ) {
          $increment = gmdate( 'H:i', $increment );
  
          list( $hour, $minutes ) = explode( ':', $increment );
  
          $date = new \DateTime( $hour . ':' . $minutes );
  
          $times[(string) $increment] = $date->format( $format );
      }
  
      return $times;
  }

  public static function db_date($date,$time) {
 
    list($day, $month, $year) = explode('-', $date);
    list($hour, $minute) = explode(':', $time);
    
    $timestamp = mktime($hour, $minute, 0, $month, $day, $year);
    
    return date('Y-m-d H:i:s',$timestamp);
   }
   public static function display_time($date,$time) {
 
    list($day, $month, $year) = explode('-', $date);
    list($hour, $minute) = explode(':', $time);
    
    $timestamp = mktime($hour, $minute, 0, $month, $day, $year);
    
    return date('h:i A',$timestamp);
   }
   public static function add_minutes($date,$minutes) {
 
    $dateTime = new \DateTime($date);
    $dateTime->modify("+{$minutes} minutes");

    return $dateTime->format('Y-m-d H:i:s');
   }
   public static function round_next($precision = 15) {
    $timestamp = time();
    $precision = 60 * $precision;
    $next = round($timestamp / $precision) * $precision;
    return date('Y-m-d H:i:s', $next);
  }
}
