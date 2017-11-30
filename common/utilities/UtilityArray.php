<?php

/**
 * Some function for process url
 *
 * @author phongphamhong
 * @date 11/22/2013
 */

namespace common\utilities;

use Yii;
use yii\helpers\ArrayHelper;

class UtilityArray {

    /**
     * detect request from mobile or not
     *  
     * @var boolen 
     */
    public static $isMobile = null;

    /**
     * store object for singeleton design pattern
     * 
     * @var UtilityUrl 
     */
    private static $instance;

    /**
     * 
     * @return \ClaUrl
     */
    public static function instance() {
        if (!self::$instance) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public static function ArrayPC($arrayMenu, $fixe = '') {
        $arrayParent = array();
        if (count($arrayMenu) > 0) {
            foreach ($arrayMenu as $key => $item) {
                if (is_array($item)) {
                    $pid = $item['pid'];
                    $id = $item['id'];
                } else {
                    $pid = $item->pid;
                    $id = $item->id;
                }
                if ($fixe) {
                    $pid = $fixe . $pid;
                    $id = $fixe . $id;
                }
                $arrayParent[$pid][$id] = $item;
            }
        }
        return $arrayParent;
    }

    public static function arrayLevel(&$result, &$arrayMenu, $type = false, $key = 0, $conmma = '-', $level = 1) {
        $conmma1 = $conmma;
        if ($level > 1) {
            if ($level > 2) {
                $conmma1 .= $conmma . ' ';
            } else {
                $conmma1 .= ' ';
            }
        } else {
            $conmma1 = '';
        }
        if (isset($arrayMenu[$key])) {
            foreach ($arrayMenu[$key] as $item) {
                $id = $type ? $item['id'] : $item->id;
                $name = $type ? $item['name'] : $item->name;
                if ($type) {
                    $arrayMenu[$key][$id]['name'] = $conmma1 . $name;
                } else {
                    $item->name = $conmma1 . $name;
                }
                $result[$id] = $conmma1 . $name;
                if (isset($arrayMenu[$id])) {
                    self::arrayLevel($result, $arrayMenu, $type, $id, $conmma, $level + 1);
                }
            }
        }
    }

    /* convert string to array 
     * theo mảng dấu
     */

    public static function getArraySource($str, $commo = array('||', '|')) {
        $array = array();
        $array1 = explode($commo[0], $str);
        foreach ($array1 as $key => $value) {
            $v = explode($commo[1], $value);
            if (isset($v[1]))
                $array[$v[0]] = $v[1];
        }
        return $array;
    }

    public static function getNameInArrayTableNotAlias($tableName, $arrayDelete = array('id', 'modified_by')) {
        $list = app()->db->createCommand('DESCRIBE ' . $tableName)->queryAll();
        $listData = ArrayHelper::map($list, 'Field', 'Field');
        return self::ua($arrayDelete, $listData);
    }

    /**
     * delete array item in array
     * @param type $delete
     * @param type $array
     * @return $array
     */
    public static function ua($delete, $array) {
        if (is_array($delete) && count($delete) > 0) {
            foreach ($delete as $key => $value) {
                unset($array[$value]);
            }
        }
        return $array;
    }

    /**
     * list Class to array id,name
     * @param array $Class
     * @param string $k
     * @param string $v
     * @return array
     */
    public static function ClassToArray($Class, $k = 'id', $v = 'name') {
        $array = array();
        if (count($Class) > 0) {
            foreach ($Class as $key => $item) {
                $array[$item->$k] = $item->$v;
            }
        }
        return $array;
    }

    /**
     * getNameInArrayTable
     * @param string $tableName
     * @param array $arrayDelete
     * @param alias $alias
     * @return type
     */
    public static function getNameInArrayTable($tableName, $arrayDelete = array('id', 'modified_by')) {
        $arrayList = app()->db->createCommand('DESCRIBE ' . $tableName)->queryAll();
        foreach ($arrayList as $key => $item) {
            $arrayList[$key]['Field'] = "`$tableName`." . $item['Field'];
        }
        return self::ua($arrayDelete, ArrayHelper::map($arrayList, 'Field', 'Field'));
    }

    public static function getTable() {
        $dsn = app()->components['db']['dsn'];
        $array = explode('=', $dsn);
        $db_name = $array[count($array) - 1];
        $db_name = $array[count($array) - 1];
        $idStr = 'Tables_in_' . $db_name;
        return ArrayHelper::map(app()->db->createCommand('SHOW TABLES')->queryAll(), $idStr, $idStr);
    }

    /* replace mảng các key định dạng {key} với value và replace đường dẫn 
     * 2 biến, biến 1 là mảng biến 2 là xâu
     * mảng key replace thành mảng value
     */

    public static function replaceArray($array, $str) {
        $array1 = array();
        $array2 = array();
        $array1[] = '{url}';
        $array2[] = HOST_PUBLIC;
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array1[] = '{' . $key . '}';
                $array2[] = $value;
            }
        }
        return str_replace($array1, $array2, $str);
    }

    /* convert string to array 
     * theo dấu , là 1 và dấu || là 2
     */

    public static function convertStringToArrayByConmmaAndOr($str) {
        $array = explode('|', $str);
        if (count($array) > 0)
            foreach ($array as $key => $item)
                $array[$key] = explode(',', $item);
        return $array;
    }

    public static function callFunction($str,$params = '') {
        $function = $str;
        if($params) {
            $a = create_function('$value', $function);
            return $a($params);
        } else {
           $a = create_function('$value', $function);
            return $a('');
        }
    }

    public static function searchArray($array, $value) {
        foreach ($array as $key => $item) {
            if ($value == $item)
                return true;
        }
        return false;
    }

    public static function changeStatusLabel(&$arrayLabel) {
        foreach ($arrayLabel as $key => $value) {
            $arrayLabel[$key] = '<div class="lbl_check_radio"> ' . $value . ' </div>';
        }
    }

    /* convert string to array 
     * theo mảng dấu
     */

    public static function getArraySourceString($str, $commo = array('||', '|')) {
        $array = array();
        $array1 = explode($commo[0], $str);
        foreach ($array1 as $key => $value) {
            $v = explode($commo[1], $value);
            if (isset($v[1]))
                $array[$v[0]] = $v[1];
        }
        return self::printArray($array);
    }

    public static function printArray($array) {
        $string = '';
        if (count($array)) {
            $string .= "[\n";
            foreach ($array as $key => $value) {
                $string .= "\t" . (is_int($key) ? $key : "'{$key}'") . " => ";
                if (is_array($value)) {
                    self::printArray($value);
                } else if (is_int($value) || preg_match('/\$data|\$model/', $value)) {
                    $string .= $value;
                } else {
                    $string .= "'" . str_replace("'", "\\'", $value) . "'";
                }
                $string .= ",\n";
            }
            $string .= "]";
        }
        return $string;
    }

    public static function jsonEncodeValidateAngular($model) {
        $model->validate();
        $array = $model->getErrors();
        $result = [];
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $result[] = [
                    'field' => $key,
                    'message' => implode('<br>', $value),
                ];
            }
        }
        return $result;
    }

    public static function unsetNull($array) {
        $result = [];
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                if ($value !== null) {
                    $result[$key] = $value;
                }
            }
        } else {
            $result = [$array];
        }
        return $result;
    }

    public static function getAllFileByDirectory($dir = '/models', $name_fixed = 'common', $result = array()) {
        $list = UtilityDirectory::scandir(Yii::getAlias('@common') . $dir);
        foreach ($list as $value) {
            if (strpos($value, '.') === false) {
                $result[$value] = self::getAllFileByDirectory($dir . '/' . $value);
            } else {
                $name = str_replace('/', '\\', preg_replace('/\.(.*)$/', '', $name_fixed . $dir . '/' . $value));
                $result[$name] = $name;
            }
        }
        return $result;
    }

    public static function trim($array,$flagNotFalse = false) {
        $result = array();
        if (is_array($array) && count($array)) {
            foreach ($array as $key => $value) {
                $value = trim($value);
                if($flagNotFalse) {
                    if($value)
                        $result[$key] = $value;
                } else {
                    $result[$key] = $value;
                }
            }
        }
        return $result;
    }
    
    public static function addArray($array1,$array2) {
        foreach ($array2 as $key => $value) {
            $array1[] = $value;
        }
        return $array1;
    }
    
    public static function getDirectoryTemplate() {
        $listDir = scandir(APPLICATION_PATH.'/application');
        unset($listDir[0],$listDir[1]);
        $result = [];
        foreach($listDir as $value) {
            if($value != '.svn')
                $result[$value] = $value;
        }
        return $result;
    }

}
