<?php

/* * Make slug from name
 * @param string $text
 * @return string
 */

function slugify($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
    // trim
    $text = trim($text, '-');
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // lowercase
    $text = strtolower($text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

/**
 * Making directory
 * @param type $fileType
 * @return string
 */
function make_dir($fileType) {
    $uploadRootPath = $fileType . '/' . date('Y') . '/' . date('m');
    $uploadDir = $uploadRootPath;
    if (!is_dir($uploadDir)) {
        Illuminate\Support\Facades\File::makeDirectory($uploadDir, 0777, true, true);
    }
    return $uploadDir;
}

function uploadInputs($inputName, $type = 'video', $visibility = 'private') {
    $files = $inputName;
    $uploadPath = [];
    if (is_array($files)) {
        foreach ($files as $file) {
            $destinationPath = make_dir($type);
            $uploadPath[] = Illuminate\Support\Facades\Storage::disk('uploads')->put($destinationPath, $file, $visibility);
        }
    } else {
        //echo $type;die;
        $destinationPath = make_dir($type);
        //$uploadPath = $inputName->move(Illuminate\Support\Facades\Storage::disk('uploads')->getDriver()->getAdapter()->getPathPrefix(), 'MytstName.mp3');
        $uploadPath = Illuminate\Support\Facades\Storage::disk('uploads')->put($destinationPath, $files, $visibility);
    }
    return $uploadPath;
}
function deleteFile($path){
      File::delete($path);
}