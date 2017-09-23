<?php

namespace App\Model\Input;


class AutoCompleteType extends Type implements InputInterface
{
    public function render()
    {
        return [
            "name" => $this->getName(),
            "url" => $this->getUrl()
        ];
    }

    private $url;

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getUrl()
    {
        return $this->url;
    }
}