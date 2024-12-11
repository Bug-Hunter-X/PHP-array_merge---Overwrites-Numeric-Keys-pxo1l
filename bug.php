function foo(array $arr): array {
    if (empty($arr)) {
        return [];
    }

    $result = [];
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, foo($value));
        } else {
            $result[$key] = $value;
        }
    }

    return $result;
}

$arr = [1, 2, [3, 4, [5, 6]]];
echo json_encode(foo($arr)); // Output:{"0":1,"1":2,"0":3,"1":4,"0":5,"1":6}