<?php

/**
 * Search in multi array by key and return a single result
 * @param int $searchFor
 * @param type $keyToSearch
 * @param type $inputArray
 * @return array
 */
function searchInMultiArray($searchFor, $keyToSearch, $inputArray, $returnArray = true, $returnKey = NULL) {
    $filteredArray = array_filter($inputArray, function($element) use($searchFor, $keyToSearch) {
        return isset($element[$keyToSearch]) && $element[$keyToSearch] == $searchFor;
    });
    if (empty($filteredArray))
        return [];
    if (empty($returnKey))
        $returnKey = $keyToSearch;
    return ($returnArray == true) ? array_values($filteredArray)[0] : array_values($filteredArray)[0][$returnKey];
}

/**
 * 
 * @param type $array
 * @param type $key
 * @param type $value
 * @return type
 */
function removeElementWithOutKey($array, $key) {
    foreach ($array as $subKey => $subArray) {
        if (!array_key_exists($key, $subArray)) {
            unset($array[$subKey]);
        }
    }
    return $array;
}

function debugArr($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
