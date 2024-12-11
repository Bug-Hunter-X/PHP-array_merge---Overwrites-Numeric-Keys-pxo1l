function foo(array $arr): array {
    if (empty($arr)) {
        return [];
    }

    $result = [];
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, foo($value));
        } else {
            $result[] = $value; // Modified line
        }
    }

    return $result;
}

$arr = [1, 2, [3, 4, [5, 6]]];
echo json_encode(foo($arr)); // Output: [1,2,3,4,5,6] 