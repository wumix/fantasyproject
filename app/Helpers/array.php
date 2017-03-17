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
    if (empty($returnKey))
        $returnKey = $keyToSearch;
    return ($returnArray == true && !empty($returnKey)) ? array_values($filteredArray)[0] : array_values($filteredArray)[0][$returnKey];
}
