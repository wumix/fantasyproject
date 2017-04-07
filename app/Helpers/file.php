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

function uploadInputs($inputName, $type = 'image', $visibility = 'private') {
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
        $uploadPath = Illuminate\Support\Facades\Storage::disk('uploads')->put($destinationPath, $files, $visibility);
    }
    return $uploadPath;
}

function deleteFile($disk, $file) {
    $path = Storage::disk($disk)->getDriver()->getAdapter()->getPathPrefix() . $file;
    File::delete($path);
}

function getUploadsPath($fileName = NULL) {
    $image = Illuminate\Support\Facades\URL::to('uploads/' . $fileName);
    if (filter_var($fileName, FILTER_VALIDATE_URL) === FALSE) {
        if (empty($fileName)) {
            return URL::to('assets-new/img/default-profile-pic.png');
        } else {
            return $image;
        }
    } else {
        return $fileName;
    }
}
