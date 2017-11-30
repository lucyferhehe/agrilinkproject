<?php

namespace common\utilities;

class UtilityDirectory {
    public static function dmkdir($dir) {
        $flag = true;
        if (!is_dir($dir)) {
            $oldmask = umask(0);
            $flag = @mkdir($dir,775);
            @chown($dir, 'apache');
            @chmod($dir, 775);
            umask($oldmask);
        }
        return $flag;
    }

    public static function createDir($dir) {
        $arrayDirectory = explode("/",$dir);
        $count = count($arrayDirectory) -1 ;
        $array = array();
        for($i = $count; $i >= 0; $i--) {
            if(!preg_match("/\./",$arrayDirectory[$i])) {
                $value = implode("/", $arrayDirectory).'/';
                if(is_dir($value)) break;
                if(self::dmkdir($value)) {
                    if(count($array) > 0) {
                        foreach($array as $k => $v) {
                            self::dmkdir($v);
                        }
                    }
                    break;
                }
                $array[] = $value;
            }
            unset($arrayDirectory[$i]);
        }
    }
    
    public static function scandir($dir) {
        if(is_dir($dir)) {
            $array = scandir($dir);
            $result = array();
            foreach($array as $key => $value) {
                if($key > 1) {
                    $result[] = $value;
                }
            }
            if(count($result) > 0)
                return $result;
        }
        return false;
    }
    public static function caythumuc($link, &$thumuc , $dem = 0) {
        $bac1 = self::scandir($link);
        $dem++;
        if($bac1 && count($bac1) > 0) {
            $thumuc .= '<ul class="nutthumuc '.($dem == 1 ? 'active' : '').'">';
            foreach($bac1 as $tem) {
                $linkcon = $link . '/' . $tem;
                if(preg_match("/\./", $tem)) {
                    if(!preg_match("/\.(png|jpg|gif|PNG|JPG|GIF|ico|ICO)$/", $tem)) {
                        $thumuc .= '<li><span class="file" data-href="'.$linkcon.'">' . $tem . '</span></li>';
                    }
                } else {
                    $thumuc .= '<li><span class="thumuc" data-href="'.$linkcon.'">'.$tem.'</span>';
                    self::caythumuc($link.'/'.$tem, $thumuc, $dem);
                    $thumuc .= '</li>';
                }
            }
            $thumuc .= '</ul>';
        }
    }
    
    public static function deleteDiretory($arrayDir) {
        if(!is_array($arrayDir)) {
            $arrayDir = [$arrayDir];
        }
        if(count($arrayDir)) {
            foreach($arrayDir as $key => $dir) {
                $adir = self::scandir($dir);
                if(is_array($adir) && count($adir)) {
                    foreach($adir as $item) {
                        if(strpos($item, '.') === FALSE) {
                                self::deleteDiretory($dir.'/'.$item);
//                                rmdir($dir.'/'.$item);
                        } else {
                            self::deleteFile($dir.'/'.$item);
                        }
                    }
                }
            }
        }
    }
    
    public static function deleteFile($arrayFile) {
        if(!is_array($arrayFile)) {
            $arrayFile = [$arrayFile];
        }
        if(count($arrayFile)) {
            foreach($arrayFile as $key => $file) {
                if(is_file($file)) {
                    $old = umask(0);
                    @chmod(dirname($file), 0775);
                    @chown($filename, 'apache');
                    @chown($filename, 'apache');
                    @chmod($file,0775);
                    umask($old);
                    @unlink($file);
                }
            }
        }
    }
}