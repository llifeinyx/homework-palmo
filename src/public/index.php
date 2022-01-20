<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Palmo Helloe world</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
    <link rel="manifest" href="site.webmanifest">
    <meta name="theme-color" content="#fafafa">
</head>

<body style="margin: 0;">
<?php

//repository for array

//интерфейс для репозитория (интерфейс для каких то сущностей более большого хранилища)
interface ElementRepositoryInterface
{
    public function all();
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}

//интерфейс для хранилища (будь то массив, бд, списки хуиски так далее..)
interface StorageInterface
{
    public function findAll($part);
    public function create($part, $data);
    public function update($part, $id, $data);
    public function delete($part, $id);
}

// класс репозитория который хранит в себе хранилище
class ElementRepository implements ElementRepositoryInterface
{
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }
    public function all()
    {
        return $this->storage->findAll('element');
    }
    public function create($data)
    {
        return $this->storage->create('element', $data);
    }
    public function update($id, $data)
    {
        return $this->storage->update('element',$id, $data);
    }
    public function delete($id)
    {
        return $this->storage->delete('element', $id);
    }
}
// Класс для взаимодействия с нужным нам репозиторием
class ElementController
{
    private $repo;

    public function __construct(ElementRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }
    public function actionAll()
    {
        return $this->repo->all();
    }

    public function actionCreate($data)
    {
        return $this->repo->create($data);
    }

    public function actionUpdate($id, $data)
    {
        return $this->repo->update($id, $data);
    }
    public function actionDelete($id)
    {
        return $this->repo->delete($id);
    }
}
//класс который описывает взаимодействие с этим видом хранилища (в данном случае массив)
class ArrayStorage implements StorageInterface
{
    private $array = [];
    public function __construct($array)
    {
        $this->array = $array;
    }

    public function findAll($part)
    {
        return $this->array[$part];
    }
    public function create($part, $data)
    {
        $this->array[$part][] = $data;
    }
    public function update($part, $id, $data)
    {
       $this->array[$part][$id] = $data;
    }
    public function delete($part, $id)
    {
        unset($this->array[$part][$id]);
    }
}

//Проверим работоспособность этой багадельни:
$arrayObject = ['element' => ['1', '2', '3', '4'], 'id' => ['a', 'b', 'c'], 'name' => ['jhon', 'lol', 'kl']];
//Создали многомерный ассоциативный массив который симулирует какуюту бд (с разными данными будь то пользователя)
//или каких то товаров
$myStorage = new ArrayStorage($arrayObject);
//Создали наше хранилище которое имеет удобный интерфейс для обновления тех или иных свойств нашей бд
//(в этом конкретном примере - массива)
$myRepo = new ElementRepository($myStorage);
//Вот и добрались до репозитория. Он в свою очередь принимает в себя наш массив или бд, но его интерфейс позволяет
//нам изменять или добавлять конкретные сущности только в разделе 'Element'. То есть - это репозиторий элементов.
$myRepoController = new ElementController($myRepo);
//А это уже контроллер репозитория, по сути - удобный интерфейс для работы с нашим репозиторием. На первый взгляд
//бесполезная хрень, ибо функционал репозитория такой же, но если б это был более сложный проект, то контроллер
//мог бы выполнять множества полезных задач отталкиваясь от функций update delete create. Например искать элементы
//по какому то условию (такие функции были бы излишни для класса самого репозитория, который представляет базовые
//средства для взаимодействия с ним)
var_dump($myRepoController->actionAll());
echo "<br>";
//проверили шо у нас есть в репозитории
$myRepoController->actionCreate('4');
var_dump($myRepoController->actionAll());
echo "<br>";
//добавили элемент и проверили его наличие
$myRepoController->actionUpdate(0, '99');
var_dump($myRepoController->actionAll());
echo "<br>";
//Изменили один из элементов и проверили так ли это
$myRepoController->actionDelete(1);
var_dump($myRepoController->actionAll());
echo "<br>";
//Удалили элемент и проверили так ли это
?>
</body>

</html>