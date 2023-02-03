<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->load->view('home/index');
	}

	function image($folder, $size, $name) {
        ini_set('memory_limit', '-1');

        ///image folder
//        if ($folder != "images") {
            $filename = ROOT_PATH_UPLOAD . '/' . $folder . '/' . $name;
//        } else {
//            $filename = ROOT_PATH_IMAGE . '/' . $name;
//        }
        if (!file_exists($filename)) {
            $filename = $filename = ROOT_PATH_UPLOAD . '/' . $folder . '/' . 'default_2.jpg';
        }

        list($width_orig, $height_orig) = getimagesize($filename);
        $ratio_orig = $width_orig / $height_orig;


        switch ($size) {
            case "property_view":
                $new_width = 1263;
                $ratio = $width_orig / $height_orig;
                $def_height = $new_width / $ratio;
                $new_height = $def_height;
                
//                $new_height = 450;
//                $ratio = $height_orig / $width_orig;
//                $def_width = $new_height / $ratio;
//                $new_width = $def_width;
                
                break;
            case "feature_product":
                $width = 170;
                $ratio = $width_orig / $height_orig;
                $def_height = $width / $ratio;
                $height = $def_height;

                /* $height = 170;                   
                  $ratio = $height_orig / $width_orig;
                  $def_width = $height / $ratio;
                  $width = $def_width; */
                break;
            default:
                $width = 640;
                $height = 427;
                break;
        }
        
        // Resample
        $image_p = imagecreatetruecolor($new_width, $new_height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width_orig, $height_orig);
        // Output
        imagejpeg($image_p, null, 100);
    }

}
?>