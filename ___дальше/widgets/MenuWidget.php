<?php

namespace app\widgets;

use app\models\Category;
use yii\base\Widget;

class MenuWidget extends Widget
{
    public $data;

    public function run()
    {
        $this->data = new Category();
        $this->data = $this->data->getCategories();
        $this->data = $this->categoryToTemplate($this->data);        
        return $this->data;
    }


    public function categoryToTemplate($data)
    {
        ob_start();                             // функции связанные с буферизацией

        include __DIR__ .'/template/menu.php';  // подключаем наш шаблон меню

        return ob_get_clean();                  // функции связанные с буферизацией
    }
}