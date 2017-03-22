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

/**
 * Match in array
 * @param array $inputArray
 * @param array $searchCrieteria
 * @return array
 */
function tapArray($inputArray, array $searchCrieteria, $returnSingle = true) {
    $result = collect($inputArray);
    foreach ($searchCrieteria as $key => $val) {
        $result = $result->where($key, $val);
    }
    $result = $result->tap(function($collection) {
                return $collection;
            })->toArray();
    if(!empty($result)){
        $result = fix_keys($result);
        return ($returnSingle) ? $result[0] : $result;
    }
    return [];
}

function fix_keys($array) {
    $numberCheck = false;
    foreach ($array as $k => $val) {
        if (is_array($val)) $array[$k] = fix_keys($val); //recurse
        if (is_numeric($k)) $numberCheck = true;
    }
    if ($numberCheck === true) {
        return array_values($array);
    } else {
        return $array;
    }
}