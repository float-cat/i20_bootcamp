<?php
/*******************************************
  Класс вычисляет стартовые индексы для
  перечисления страниц
*******************************************/

class PagesSelector
{
    private $pages = [];
    private $count;
    private $lastindex;
    private $sizeofpages;

    function __construct($countofall, $sizeofpage)
    {
        $this->count = ceil($countofall/$sizeofpage);
        $pageidx = 0;
        for($idx=0; $idx<$this->count; $idx++)
        {
            $this->pages[] = $pageidx;
            $pageidx += $sizeofpage;
        }
        $this->sizeofpages = $sizeofpage;
        $this->lastindex = $pageidx - $sizeofpage;
    }

    public function getAllIndex()
    {
        return $this->pages;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getCurrentPageByIndex($index)
    {
        $tmpindex = (int)$index;
        $idx = 1;
        if($this->count < 2)
            return 0;
        for(; $idx<$this->count; $idx++)
            if($this->pages[$idx]>$tmpindex)
                return $idx-1;
        return $this->count - 1;
    }

    /* Метод выдает необходимые индексы в районе
        заданного */
    public function getLineIndex($current)
    {
        $result = [];
        $page = $this->getCurrentPageByIndex($current);
        /* Если текущая страница в начале */
        if($page < 3)
        {
            /* Берем первые элементы */
            for($idx=0; $idx<5 and $idx<$this->count; $idx++)
                $result[$idx] = $this->pages[$idx];
        }
        /* Если текущая страница в конце */
        else if($page > $this->count - 4)
        {
            /* Определяем начало */
            $idx = $this->count - 5;
            if($idx < 0)
                $idx = 0;
            /* Берем последние элементы */
            for(; $idx<$this->count; $idx++)
                $result[$idx] = $this->pages[$idx];
        }
        else
        {
            /* Берем пять элементов с текущим в середине */
            for($idx=$page-2; $idx<$page+3; $idx++)
                $result[$idx] = $this->pages[$idx];
        }
        return $result;
    }

    public function getSizeOfPages()
    {
        return $this->sizeofpages;
    }

    public function getLastIndex()
    {
        return $this->lastindex;
    }
}
