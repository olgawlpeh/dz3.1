<?php
/*
 * Программно создайте массив из 50 пользователей, у каждого пользователя есть поля id, name и age:
id - уникальный идентификатор, равен номеру эл-та в массиве
name - случайное имя из 5-ти возможных (сами придумайте каких)
age - случайное число от 18 до 45

Преобразуйте массив в json и сохраните в файл users.json
Откройте файл users.json и преобразуйте данные из него обратно ассоциативный массив РНР.
Посчитайте количество пользователей с каждым именем в массиве
Посчитайте средний возраст пользователей
 */

$users = [];
$names = ['Masha', 'Natasha', 'Irina', 'Polina', 'Sofia'];
for($i = 1; $i < 51; $i++) {
    $user = [
        'id' => $i,
        'name' => $names[array_rand($names)],
        'age' => mt_rand(18, 45)
    ];
    $users[] = $user;
}


echo '<pre>';
print_r($users);
echo '</pre>';

$json = json_encode($users);
echo $json;

file_put_contents("../users.json", $json);

$data = json_decode(file_get_contents('../users.json'), true);
/*var_dump($data);*/

echo '<br>';echo '<br>';
echo 'Пользователей с именем "Masha" - '. array_count_values(array_column($data, 'name'))['Masha'];
echo '<br>';
echo 'Пользователей с именем "Natasha" - '.array_count_values(array_column($data, 'name'))['Natasha'];
echo '<br>';
echo 'Пользователей с именем "Irina" - '.array_count_values(array_column($data, 'name'))['Irina'];
echo '<br>';
echo 'Пользователей с именем "Polina" - '.array_count_values(array_column($data, 'name'))['Polina'];
echo '<br>';
echo 'Пользователей с именем "Sofia" - '.array_count_values(array_column($data, 'name'))['Sofia'];
echo '<br>';
echo '<br>';

$users_age = array_column($data, 'age');
$x = 0;
foreach ($users_age as $value){
    $x += $value;
}

$y = (int)($x / 50);
echo 'Средний возарст пользователей: '.$y;
?>
