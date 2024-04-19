<?php

class News{
    //Этот метод возвращает одну новость по идентификатору

    public static function getNewsItemById($id)
    {

        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);  // Оставляет идентификатор в виде названий

            $newsItem = $result->fetch();

            return $newsItem;
            //Запрос к БД
        }
    }
    //Возвращает список новостей

    public static function getNewsList(){

    //Подключаемся к БД

            $db = Db::getConnection();

        //Объявляем пустой массив,делаем выборку данных

        $newsList = array();

        $result = $db->query('SELECT id ,title ,date ,short_content FROM news LIMIT 10');

        //В цикле проходимся по элементам из базы данных и возвращем их

        $i = 0;
        while($row = $result->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }
        return $newsList;

        //Запрос к БД
    }
}
