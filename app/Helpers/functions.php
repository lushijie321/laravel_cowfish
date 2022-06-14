<?php


//1、封装自定义函数，传入对象
function object_array($object)
{
    if(is_object($array))
    {
        $array = (array)$array;
    }
    if(is_array($array))
    {
        foreach($array as $key=>$value)
        {
        $array[$key] =$this->object_array($value);
        }
    }
    return $array;
}